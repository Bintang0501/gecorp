<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Brand;
use App\Models\DetailPembelianBarang;
use App\Models\JenisBarang;
use App\Models\LevelHarga;
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
        $barang = Barang::all();
        $suppliers = Supplier::all();

        return view('transaksi.pembelianbarang.create', compact('suppliers', 'barang'));
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
                            //  ->with(['tab' => 'detail', 'pembelian' => $pembelian]);
                             ->with('tab', 'detail')
                             ->with('pembelian', $pembelian);
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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
    
        try {
            DB::beginTransaction();
            
            DB::beginTransaction();

            $pembelian = PembelianBarang::findOrFail($id);

            $totalItem = 0;
            $totalNilai = 0;

            foreach ($request->id_barang as $index => $id_barang) {
                // Temukan barang berdasarkan ID
                $barang = Barang::findOrFail($id_barang);

                // Perbarui atau buat detail pembelian
                $detail = DetailPembelianBarang::create([
                        'id_pembelian_barang' => $pembelian->id,
                        'id_barang' => $id_barang,
                        'qty' => $request->qty[$index],
                        'harga_barang' => $request->harga_barang[$index],
                        'total_harga' => $request->qty[$index] * $request->harga_barang[$index],
                    ]);

                $totalItem += $detail->qty;
                $totalNilai += $detail->total_harga;
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
