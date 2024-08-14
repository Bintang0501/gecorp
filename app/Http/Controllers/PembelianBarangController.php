<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetailPembelianBarang;
use App\Models\PembelianBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PembelianBarangController extends Controller
{
    public function index()
    {
        $pembelian = PembelianBarang::all();
        return view('transaksi.pembelianbarang.index', compact('pembelian'));
    }

    public function create()
    {
        return view('transaksi.pembelianbarang.create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validatedData = $request->validate([
                'id_supplier' => 'required',
                'id_toko' => 'required',
                'nama_barang.*' => 'required',
                'id_jenis_barang.*' => 'required',
                'id_brand.*' => 'required',
                'harga_barang.*' => 'required|numeric',
                'qty.*' => 'required|integer',
                'total_item' => 'required|integer',
                'total_harga' => 'required|numeric',
            ]);

            $idUser = Auth::user()->id;
            $currentDate = now()->format('Ymd');
            $pembelianCount = PembelianBarang::count() + 1;
            $noNota = $idUser . $currentDate . str_pad($pembelianCount, 5, '0', STR_PAD_LEFT);

            $pembelian = PembelianBarang::create([
                'id_users' => $idUser,
                'id_supplier' => $request->id_supplier,
                'id_toko' => $request->id_toko,
                'total_item' => $request->total_item,
                'total_harga' => $request->total_harga,
                'no_nota' => $noNota,
                'tgl_nota' => now(),
                'tgl_beli' => now(),
            ]);

            $pembelianId = $pembelian->id;

            foreach ($request->nama_barang as $index => $nama_barang) {
                $idJenisBarang = $request->id_jenis_barang[$index] ?? null;
                $idBrand = $request->id_brand[$index] ?? null;
                $hargaBarang = $request->harga_barang[$index] ?? null;
                $qty = $request->qty[$index] ?? null;

                if ($nama_barang && $idJenisBarang && $idBrand && $hargaBarang && $qty) {
                    DetailPembelianBarang::create([
                        'id_pembelian_barang' => $pembelianId,
                        'id_jenis_barang' => $idJenisBarang,
                        'id_brand' => $idBrand,
                        'nama_barang' => $nama_barang,
                        'jenis_barang' => $request->jenis_barang[$index] ?? null,
                        'brand_barang' => $request->brand[$index] ?? null,
                        'harga_barang' => $hargaBarang,
                        'qty' => $qty,
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('master.pembelianbarang.index')->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('master.pembelianbarang.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit(string $id)
    {
        $pembelian = PembelianBarang::with('detail')->findOrFail($id);

        return view('transaksi.pembelianbarang.edit', compact('pembelian'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            // Find the `PembelianBarang` record
            $pembelian = PembelianBarang::findOrFail($id);

            // Update the `PembelianBarang` data
            $pembelian->id_supplier = $request->id_supplier;
            $pembelian->id_toko = $request->id_toko;
            $pembelian->save();

            // Ensure the arrays are not null
            $detailIds = $request->detail_id ?? [];
            $namaBarang = $request->nama_barang ?? [];
            $jenisBarang = $request->id_jenis_barang ?? [];
            $brands = $request->id_brand ?? [];
            $hargaBarang = $request->harga_barang ?? [];
            $quantities = $request->qty ?? [];

            // Track the IDs that are being updated
            $updatedDetailIds = [];

            foreach ($namaBarang as $index => $nama_barang) {
                if (isset($detailIds[$index])) {
                    // Update existing detail record
                    $detailPembelian = DetailPembelianBarang::where('id_pembelian_barang', $pembelian->id)
                                        ->where('id', $detailIds[$index])
                                        ->first();

                    if ($detailPembelian) {
                        $detailPembelian->update([
                            'nama_barang' => $nama_barang,
                            'id_jenis_barang' => $jenisBarang[$index],
                            'id_brand' => $brands[$index],
                            'harga_barang' => $hargaBarang[$index],
                            'qty' => $quantities[$index],
                        ]);
                        $updatedDetailIds[] = $detailPembelian->id;
                    }
                } else {
                    // Create new detail record if it's not an update
                    $newDetail = DetailPembelianBarang::create([
                        'id_pembelian_barang' => $pembelian->id,
                        'nama_barang' => $nama_barang,
                        'id_jenis_barang' => $jenisBarang[$index],
                        'id_brand' => $brands[$index],
                        'harga_barang' => $hargaBarang[$index],
                        'qty' => $quantities[$index],
                    ]);
                    $updatedDetailIds[] = $newDetail->id;
                }
            }

            // Optionally delete records that were not updated
            DetailPembelianBarang::where('id_pembelian_barang', $pembelian->id)
                ->whereNotIn('id', $updatedDetailIds)
                ->delete();

            // Calculate and update the total item and total price
            $totalItem = array_sum($quantities);
            $totalHarga = array_sum(array_map(function($harga, $qty) {
                return $harga * $qty;
            }, $hargaBarang, $quantities));

            $pembelian->total_item = $totalItem;
            $pembelian->total_harga = $totalHarga;
            $pembelian->save();

            DB::commit();

            return redirect()->route('master.pembelianbarang.index')->with('success', 'Data pembelian berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('master.pembelianbarang.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();

            // Find the `PembelianBarang` record
            $pembelian = PembelianBarang::findOrFail($id);

            // Delete associated `DetailPembelianBarang` records
            DetailPembelianBarang::where('id_pembelian_barang', $pembelian->id)->delete();

            // Delete the `PembelianBarang` record
            $pembelian->delete();

            DB::commit();

            return redirect()->route('master.pembelianbarang.index')->with('success', 'Data pembelian berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('master.pembelianbarang.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
}

}
