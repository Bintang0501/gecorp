<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailToko;
use App\Models\LevelUser;
use App\Models\PengirimanBarang;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PengirimanBarangController extends Controller
{
    public function index()
    {
        $toko = Toko::all();
        $barang =  Barang::all();
        $user = User::all();
        $pengiriman_barang = PengirimanBarang::all();
        return view('transaksi.pengirimanbarang.index', compact('toko', 'barang', 'user', 'pengiriman_barang'));
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
                ->get(['barang.id', 'barang.nama_barang']); // Mengambil id dari DetailToko dan nama_barang dari Barang
        if ($barangs->isEmpty()) {
            return response()->json(['error' => 'No barangs found'], 404);
        }
        return response()->json($barangs);
    }

    public function getHargaBarang($id_barang, $id_toko)
    {
        $detailToko = DetailToko::where('id_barang', $id_barang)
                                ->where('id_toko', $id_toko)
                                ->first(['id', 'harga']); // Ambil 'id' dari DetailToko sebagai id_detail

        if (!$detailToko) {
            return response()->json(['error' => 'No price found for id_barang: ' . $id_barang . ' and id_toko: ' . $id_toko], 404);
        }

        return response()->json([
            'id_detail' => $detailToko->id,
            'harga' => $detailToko->harga
        ]);
    }

    public function create()
    {
        $toko = Toko::all();
        $user = User::all();
        $detail_toko = DetailToko::all();
        return view('transaksi.pengirimanbarang.create', compact('toko', 'user', 'detail_toko'));
    }

    public function store(Request $request)
    {
        try {
        DB::beginTransaction();

        // dd($request->harga);
        $totalHarga = $request->harga * $request->qty;
        // dd($totalHarga);
        PengirimanBarang::create([
            'no_resi' => $request->no_resi,
            'toko_pengirim' => $request->toko_pengirim,
            'nama_pengirim' => $request->nama_pengirim,
            'nama_barang' => $request->nama_barang,
            'ekspedisi' => $request->ekspedisi,
            'qty' => $request->qty,
            'total_harga' => $totalHarga,
            'toko_penerima' => $request->toko_penerima,
            'tgl_kirim' => $request->tgl_kirim
        ]);

        DB::commit();

        return redirect()->route('master.pengirimanbarang.index')->with('success', 'Pengiriman Barang berhasil Ditambahkan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Data Harus Diisi !');
        }
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

