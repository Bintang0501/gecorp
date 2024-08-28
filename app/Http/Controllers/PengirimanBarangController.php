<?php

namespace App\Http\Controllers;

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

    public function create()
    {
        $toko = Toko::all();
        $user = User::all();
        return view('transaksi.pengirimanbarang.create', compact('toko', 'user'));
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
