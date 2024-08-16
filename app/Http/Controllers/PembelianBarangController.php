<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\DetailPembelianBarang;
use App\Models\JenisBarang;
use App\Models\PembelianBarang;
use App\Models\Supplier;
use App\Models\Toko;
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
        $suppliers = Supplier::all(); 
        $tokos = Toko::all();
        $jenisBarangs = JenisBarang::all();
        $brands = Brand::all();

        return view('transaksi.pembelianbarang.create', compact('suppliers', 'tokos', 'jenisBarangs', 'brands'));
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

            $supplierName = Supplier::findOrFail($request->id_supplier)->nama_supplier;
            $tokoName = Toko::findOrFail($request->id_toko)->nama_toko;

            $idUser = Auth::user();
            $currentDate = now()->format('Ymd');
            $pembelianCount = PembelianBarang::count() + 1;
            $noNota = $idUser->id . $currentDate . str_pad($pembelianCount, 5, '0', STR_PAD_LEFT);

            $pembelian = PembelianBarang::create([
                'id_users' => $idUser->id,
                'id_supplier' => $request->id_supplier,
                'nama_supplier' => $supplierName,
                'id_toko' => $request->id_toko,
                'nama_toko' => $tokoName,
                'nama_users' => $idUser->nama,
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

                if ($idJenisBarang) {
                    $jenisBarangName = JenisBarang::findOrFail($idJenisBarang)->nama_jenis_barang;
                }
                if ($idBrand) {
                    $brandName = Brand::findOrFail($idBrand)->nama_brand;
                }

                if ($nama_barang && $idJenisBarang && $idBrand && $hargaBarang && $qty) {
                    DetailPembelianBarang::create([
                        'id_pembelian_barang' => $pembelianId,
                        'id_jenis_barang' => $idJenisBarang,
                        'id_brand' => $idBrand,
                        'nama_barang' => $nama_barang,
                        'jenis_barang' => $jenisBarangName,
                        'brand_barang' => $brandName,
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

    public function edit($id)
    {
        $pembelian = PembelianBarang::with('detail')->findOrFail($id);
        $suppliers = Supplier::all();
        $tokos = Toko::all();
        $jenisBarang = JenisBarang::all();
        $brands = Brand::all();

        return view('transaksi.pembelianbarang.edit', compact('pembelian', 'suppliers', 'tokos', 'jenisBarang', 'brands'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->input('status_detail'));
        // Validate the request data
        $request->validate([
            'id_supplier' => 'required|exists:supplier,id',
            'id_toko' => 'required|exists:toko,id',
            'nama_barang.*' => 'required|string',
            'id_jenis_barang.*' => 'nullable|exists:jenis_barang,id',
            'id_brand.*' => 'nullable|exists:brand,id',
            'harga_barang.*' => 'required|numeric|min:1',
            'qty.*' => 'required|integer|min:1',
            'status' => 'required|string|in:progress,done,failed',
            'status_detail.*' => 'nullable|string|in:progress,done,failed,resend,refund',
        ]);

        DB::beginTransaction();

        try {
            // Find the existing PembelianBarang record
            $pembelian = PembelianBarang::findOrFail($id);

            // Update main PembelianBarang fields
            $pembelian->id_supplier = $request->input('id_supplier');
            $pembelian->id_toko = $request->input('id_toko');
            $pembelian->total_item = $request->input('total_item');
            $pembelian->total_harga = $request->input('total_harga');
            $pembelian->status = $request->input('status');
            $pembelian->save();

            // Get existing detail ids from the request
            $existingDetailIds = $request->input('detail_ids', []);

            // Delete details that were removed
            $pembelian->detail()->whereNotIn('id', $existingDetailIds)->delete();

            // dd($request->all());
            // Update or create new details
            foreach ($request->input('nama_barang') as $index => $namaBarang) {
                // Ambil detail ID jika ada
                $detailId = $existingDetailIds[$index] ?? null;
                
                // Siapkan data detail
                $detailData = [
                    'nama_barang' => $namaBarang,
                    'id_jenis_barang' => $request->input('id_jenis_barang')[$index] ?? null,
                    'id_brand' => $request->input('id_brand')[$index] ?? null,
                    'harga_barang' => $request->input('harga_barang')[$index],
                    'qty' => $request->input('qty')[$index],
                    'status' => $request->input('status_detail')[$index] ?? null, // Pastikan mengakses sesuai index
                ];
                
                // Periksa apakah detail ID ada, update jika ada, atau buat baru jika tidak ada
                if ($detailId) {
                    $detail = DetailPembelianBarang::findOrFail($detailId);
                    // dd($detailData);
                    $detail->update($detailData);
                } else {
                    $pembelian->detail()->create($detailData);
                }
            }            

            DB::commit();

            return redirect()->route('master.pembelianbarang.index')
                ->with('success', 'Pembelian barang updated successfully.');

        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->with('error', 'Failed to update pembelian barang. ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {
            // Find the PembelianBarang record
            $pembelian = PembelianBarang::findOrFail($id);

            // Delete all related detail records
            $pembelian->detail()->delete();

            // Delete the PembelianBarang record
            $pembelian->delete();

            DB::commit();

            return redirect()->route('master.pembelianbarang.index')
                ->with('success', 'Pembelian barang deleted successfully.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->with('error', 'Failed to delete pembelian barang. ' . $e->getMessage());
        }
    }

}
