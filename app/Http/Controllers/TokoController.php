<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TokoController extends Controller
{

    public function index()
    {
        $toko = Toko::all();
        return view('master.toko.index', compact('toko'));
    }

    public function create()
    {
        return view('master.toko.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_toko' => 'required|max:255',
            'wilayah' => 'required|max:255',
            'alamat' => 'required|max:255',
        ],[
            'nama_toko.required' => 'Nama Toko tidak boleh kosong.',
            'wilayah.required' => 'Wilayah tidak boleh kosong.',
            'alamat.required' => 'Alamat tidak boleh kosong.',
        ]);
        try {
            Toko::create([
                'nama_toko' => $request->nama_toko,
                'wilayah' => $request->wilayah,
                'alamat' => $request->alamat,
            ]);
            return redirect()->route('master.toko.index')->with('success', 'Berhasil menambahkan Toko Baru');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }

    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $toko = Toko::findOrFail($id);
        return view('master.toko.edit', compact('toko'));
    }

    public function update(Request $request, string $id)
    {
        $toko = Toko::findOrFail($id);
        try {
            $toko->update([
                'nama_toko' => $request->nama_toko,
                'wilayah' => $request->wilayah,
                'alamat' => $request->alamat,
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
        return redirect()->route('master.toko.index')->with('success', 'Sukses Mengubah Data Toko');
    }

    public function delete(String $id)
    {
        DB::beginTransaction();
        $toko = Toko::findOrFail($id);
        try {
            $toko->delete();
        DB::commit();

        return redirect()->route('master.toko.index')->with('success', 'Berhasil menghapus Data Toko');
        } catch (\Throwable $th) {
        DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus Data Toko' . $th->getMessage());
        }
    }
}
