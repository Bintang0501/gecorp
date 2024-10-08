<?php

namespace App\Http\Controllers;

use App\Models\DetailPembelianBarang;
use App\Models\StockBarang;
use Illuminate\Http\Request;

class StockBarangController extends Controller
{
    public function index()
    {
        $stock = StockBarang::all();

    return view('master.stockbarang.index', compact('stock'));
    }

    public function create()
    {
        return view('master.stockbarang.create');
    }

    public function getStockDetails($id_barang)
    {
        // Ambil data stock barang yang sesuai
        $stockBarang = StockBarang::where('id_barang', $id_barang)->first();

        // Ambil semua detail pembelian dengan status 'success' untuk barang tersebut
        $successfulDetails = DetailPembelianBarang::where('id_barang', $id_barang)
                                                ->where('status', 'success')
                                                ->get();

        // Hitung total harga dan total qty dari pembelian yang sudah 'success'
        $totalHargaSuccess = $successfulDetails->sum('total_harga');
        $totalQtySuccess = $successfulDetails->sum('qty');

        if ($stockBarang) {
            return response()->json([
                'stock' => $stockBarang->stock,
                'hpp_awal' => $stockBarang->hpp_awal,
                'hpp_baru' => $stockBarang->hpp_baru,
                'total_harga_success' => $totalHargaSuccess,
                'total_qty_success' => $totalQtySuccess,
            ]);
        } else {
            return response()->json([
                'stock' => 0,
                'hpp_awal' => 0,
                'hpp_baru' => 0,
                'total_harga_success' => $totalHargaSuccess,
                'total_qty_success' => $totalQtySuccess,
            ]);
        }
    }



}
