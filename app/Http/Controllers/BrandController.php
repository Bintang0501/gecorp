<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\JenisBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BrandController extends Controller
{
    public function index()
    {
        $brand = Brand::with('jenis')->get();
        // $jenis = JenisBarang::all();
        return view('master.brand.index', compact('brand'));
    }

    public function create()
    {
        $jenis = JenisBarang::all();
        return view('master.brand.create', compact('jenis'),[
            'jenis' => JenisBarang::all()->pluck('id', 'nama_jenis_barang'),
        ]);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        try{
            $validatedData = $request->validate([
                'id_jenis_barang' => 'required|string|max:255',
                'nama_brand' => 'required|string|max:255',
            ],[
                'id_jenis_barang.required' => 'Jenis Barang tidak boleh kosong.',
                'nama_brand.required' => 'Nama Brand tidak boleh kosong.',
            ]);

            Brand::create([
                'id_jenis_barang' => $request->id_jenis_barang,
                'nama_brand' => $request->nama_brand,
            ]);

            DB::commit();

            return redirect()->route('master.brand.index')->with('success', 'Data berhasil ditambahkan!');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()])->withInput();
        }
    }

    public function edit(string $id)
    {

        $brand = Brand::with('jenis')->findOrFail($id);

        $jenis = JenisBarang::all();
        return view('master.brand.edit', compact('brand', 'jenis'));
    }

    public function update(Request $request, string $id)
    {
        DB::beginTransaction();
        $validatedData = $request->validate([
            'id_jenis_barang' => 'required|string|max:255',
            'nama_brand' => 'required|string|max:255',
        ],[
            'id_jenis_barang.required' => 'Jenis Barang tidak boleh kosong.',
            'nama_brand.required' => 'Nama Brand tidak boleh kosong.',
        ]);

        $brand = Brand::findOrFail($id);

        $brand->update([
            'id_jenis_barang' => $request->id_jenis_barang,
            'nama_brand' => $request->nama_brand,
        ]);

        DB::commit();

        return redirect()->route('master.brand.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function delete(string $id)
    {
        DB::beginTransaction();
        try {
            $brand = Brand::findOrFail($id);
            $brand->delete();

            DB::commit();

            return redirect()->route('master.brand.index')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('master.brand.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

}
