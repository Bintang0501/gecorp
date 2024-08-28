<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailToko;
use App\Models\LevelUser;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;

class PengirimanBarangController extends Controller
{
    public function index()
    {
        return view('transaksi.pengirimanbarang.index');
    }

    public function getUsersByToko($id_toko)
    {
        $users = User::where('id_toko', $id_toko)
                    ->where('id_level', 2) // Tambahkan kondisi ini untuk filter admin
                    ->get();
        if ($users->isEmpty()) {
            return response()->json(['error' => 'No users found'], 404);
        }
        return response()->json($users);
    }

    public function getBarangsByToko($id_toko,)
    {
        $barangs = DetailToko::where('id_toko', $id_toko)
                ->join('barang', 'detail_toko.id_barang', '=', 'barang.id')
                ->get(['detail_toko.id', 'barang.nama_barang']); // Mengambil id dari DetailToko dan nama_barang dari Barang
        if ($barangs->isEmpty()) {
            return response()->json(['error' => 'No barangs found'], 404);
        }
        return response()->json($barangs);
    }

    public function getHargaBarang($id_detail, $id_toko)
        {
            $detailToko = DetailToko::where('id', $id_detail)
                                    ->where('id_toko', $id_toko)
                                    ->first(['id_barang' ,'harga']);

            if (!$detailToko) {
                return response()->json(['error' => 'No price found'], 404);
            }
            return response()->json([
                'id_barang' => $detailToko->id_barang,
                'harga' => $detailToko->harga
            ]);
        }


    // Pada TokoController

    public function create()
    {
        $toko = Toko::all();
        $user = User::all();
        $detail_toko = DetailToko::all();
        return view('transaksi.pengirimanbarang.create', compact('toko', 'user', 'detail_toko'));
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
