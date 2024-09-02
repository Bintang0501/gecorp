<?php

namespace App\Http\Controllers;

use App\Models\StockBarang;
use Illuminate\Http\Request;

class StockBarangController extends Controller
{
    public function index()
    {
    return view('master.stockbarang.index');
    }

    public function create()
    {
        return view('master.stockbarang.create');
    }

    public function getStockDetails($id_barang)
    {
        $stockBarang = StockBarang::where('id_barang', $id_barang)->first();

        if ($stockBarang) {
            return response()->json([
                'stock' => $stockBarang->stock,
                'hpp_awal' => $stockBarang->hpp_awal,
                'hpp_baru' => $stockBarang->hpp_baru,
            ]);
        } else {
            return response()->json([
                'stock' => 0,
                'hpp_awal' => 0,
                'hpp_baru' => 0,
            ]);
        }
    }


}
