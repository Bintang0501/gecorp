<?php

namespace App\Http\Controllers;

use App\Models\LevelHarga;
use App\Models\LevelUser;
use App\Models\Member;
use App\Models\Toko;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $member = Member::with('leveluser', 'toko')->get();
        return view('master.member.index', compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $toko = Toko::all();
        $leveluser = LevelUser::all();
        $levelharga = LevelHarga::all();
        return view('master.member.create', compact('toko', 'leveluser', 'levelharga'), [
            'levelharga' => LevelHarga::all()->pluck('nama_level_harga','id'),
            'leveluser' => LevelUser::all()->pluck('nama_level','id'),
            'toko' => Toko::query()->where('id', request()->get('toko'))
            ->first(),
        ]);
    }

    public function getWilayah(Request $request)
    {
        // Menggunakan id_toko sebagai parameter
        $toko = Toko::where('id', $request->id_toko)->first();

        if ($toko) {
            dd($toko);
            return response()->json([
                'success' => true,
                'wilayah' => $toko->wilayah, // Mengirimkan wilayah sebagai respons
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Wilayah tidak ditemukan',
        ]);
    }


    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
