<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BrandController extends Controller
{
    
    public function index()
    {
        $brands = Brand::all();
        return view('master.brand.index', compact('brands'));
    }


    public function create()
    {
        return view('master.brand.create');
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            
            $validatedData = $request->validate([
                'nama_brand' => 'required|string|max:255',
            ]);

            // if ($validatedData->fails()) {
            //     return redirect()->back()->withErrors('validatedData')->withInput();
            // }
            
            $data = Brand::create([
                'nama_brand' => $validatedData['nama_brand'],
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
        $brand = Brand::findOrFail($id);
        return view('master.brand.edit', compact('brand'));
    }

    
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_brand' => 'required|string|max:255',
        ]);
    
        $brand = Brand::findOrFail($id);
        $brand->nama_brand = $request->input('nama_brand');
        $brand->save();
    
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
