<?php

namespace App\Http\Controllers;

use App\Models\DetailPembelianBarang;
use App\Models\PembelianBarang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        return view('master.barang.index');
    }

    public function create()
    {
        $detail = DetailPembelianBarang::all();
        $pembelian = PembelianBarang::all();

        // Mengirim data ke view
        return view('master.barang.create', compact('detail', 'pembelian'));
    }
    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
