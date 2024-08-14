<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisBarangController extends Controller
{
<<<<<<< HEAD
    
=======

>>>>>>> c19ede8d5ddbc5db02ba6e610464257766e497b9
    public function index()
    {
        $jenisbarang = JenisBarang::all();
        return view('master.jenisbarang.index', compact('jenisbarang'));
    }

<<<<<<< HEAD

=======
>>>>>>> c19ede8d5ddbc5db02ba6e610464257766e497b9
    public function create()
    {
        return view('master.jenisbarang.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_jenis_barang' => 'required|max:255',
        ],[
            'nama_jenis_barang.required' => 'Jenis Barang tidak boleh kosong.',
        ]);
        try {

            JenisBarang::create([
                'nama_jenis_barang' => $request->nama_jenis_barang,
            ]);

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
        return redirect()->route('master.jenisbarang.index')->with('success', 'Sukses menambahkan Jenis Barang Baru');
    }

<<<<<<< HEAD

=======
>>>>>>> c19ede8d5ddbc5db02ba6e610464257766e497b9
    public function show(string $id)
    {
        //
    }

<<<<<<< HEAD

    public function edit(string $id)
=======
    public function edit(string $id )
>>>>>>> c19ede8d5ddbc5db02ba6e610464257766e497b9
    {
        $jenisbarang = JenisBarang::findOrFail($id);
        return view('master.jenisbarang.edit', compact('jenisbarang'));
    }

    public function update(Request $request, string $id)
    {
        $jenisbarang = JenisBarang::findOrFail($id);
        try {
           $jenisbarang->update([
            'nama_jenis_barang'=> $request->nama_jenis_barang,
           ]);
     } catch (\Throwable $th) {
        return redirect()->back()->with('error', $th->getMessage())->withInput();
    }
    return redirect()->route('master.jenisbarang.index')->with('success', 'Sukses Mengubah Data Jenis Barang');
    }

<<<<<<< HEAD
    
    public function destroy(string $id)
=======
    public function delete(string $id)
>>>>>>> c19ede8d5ddbc5db02ba6e610464257766e497b9
    {
        DB::beginTransaction();
        $jenisbarang = JenisBarang::findOrFail($id);
        try {
            $jenisbarang->delete();
        DB::commit();

        return redirect()->route('master.jenisbarang.index')->with('success', 'Sukses menghapus Data Jenis Barang');
        } catch (\Throwable $th) {
        DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus Data Jenis Barang ' . $th->getMessage());
        }
    }
}
