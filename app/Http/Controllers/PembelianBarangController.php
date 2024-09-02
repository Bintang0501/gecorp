<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\DetailPembelianBarang;
use App\Models\LevelHarga;
use App\Models\PembelianBarang;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembelianBarangController extends Controller
{
    public function index()
    {
        $pembelian = PembelianBarang::all();
        return view('transaksi.pembelianbarang.index', compact('pembelian'));
    }

    public function create()
    {
        $barang = Barang::all();
        $suppliers = Supplier::all();
        $LevelHarga = LevelHarga::all();

        return view('transaksi.pembelianbarang.create', compact('suppliers', 'barang', 'LevelHarga'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'id_supplier' => 'required|exists:supplier,id',
            'tgl_nota' => 'required|date',
            'no_nota' => 'required|numeric',
        ]);

        try {
            DB::beginTransaction();

            $pembelian = PembelianBarang::create([
                'id_supplier' => $request->id_supplier,
                'no_nota' => $request->no_nota,
                'tgl_nota' => $request->tgl_nota,
            ]);

            DB::commit();

            return redirect()->route('master.pembelianbarang.create')
                             ->with('tab', 'detail')
                             ->with('pembelian', $pembelian);

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $pembelian = PembelianBarang::with('detail')->findOrFail($id);
        $LevelHarga = LevelHarga::all();

        return view('transaksi.pembelianbarang.edit', compact('pembelian', 'LevelHarga'));
    }

    public function update(Request $request, $id)
    {
        $idBarangs = $request->input('id_barang', []);
        $qtys = $request->input('qty', []);
        $hargaBarangs = $request->input('harga_barang', []);

        foreach ($idBarangs as $index => $id_barang) {
            $qty = $qtys[$index] ?? null;
            $harga_barang = $hargaBarangs[$index] ?? null;

            if (is_null($qty) || is_null($harga_barang)) {
                continue;
            }

            if ($qty <= 0 || $harga_barang <= 0) {
                return redirect()->back()->with('error', 'Failed: Data harap diisi dengan benar.');
            }
        }

        try {
            DB::beginTransaction();

            $pembelian = PembelianBarang::findOrFail($id);

            $totalItem = 0;
            $totalNilai = 0;

            $count = count($idBarangs);
            for ($i = 0; $i < $count; $i++) {
                $id_barang = $idBarangs[$i];
                $qty = $qtys[$i] ?? null;
                $harga_barang = $hargaBarangs[$i] ?? null;

                if (is_null($qty) || is_null($harga_barang)) {
                    continue;
                }

                if ($id_barang && $qty > 0 && $harga_barang > 0) {
                    $barang = Barang::findOrFail($id_barang);

                    $detail = DetailPembelianBarang::updateOrCreate(
                        [
                            'id_pembelian_barang' => $pembelian->id,
                            'id_barang' => $id_barang,
                        ],
                        [
                            'qty' => $qty,
                            'harga_barang' => $harga_barang,
                            'total_harga' => $qty * $harga_barang,
                        ]
                    );

                    $totalItem += $detail->qty;
                    $totalNilai += $detail->total_harga;
                }
            }

            $pembelian->total_item = $totalItem;
            $pembelian->total_nilai = $totalNilai;
            $pembelian->save();

            DB::commit();

            return redirect()->route('master.pembelianbarang.index')->with('success', 'Data Pembelian Barang berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->with('error', 'Failed to update pembelian barang. ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {
            $pembelian = PembelianBarang::findOrFail($id);

            $pembelian->detail()->delete();

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
