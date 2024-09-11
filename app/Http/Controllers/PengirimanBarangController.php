<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailPembelianBarang;
use App\Models\DetailPengirimanBarang;
use App\Models\DetailToko;
use App\Models\LevelUser;
use App\Models\PembelianBarang;
use App\Models\PengirimanBarang;
use App\Models\StockBarang;
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

    public function detail(string $id)
    {
        $detail_pengiriman = DetailPengirimanBarang::where('id_pengiriman_barang', $id)->get();  // Ambil data pengiriman dari database
        // $selectedTokoId = $detail_pengiriman->toko_pengirim;  // Asumsikan kamu menyimpan id toko pengirim di dalam pengiriman
        $pengiriman_barang = PengirimanBarang::findOrFail($id);
        // $pengiriman_barang = PengirimanBarang::all();

        return view('transaksi.pengirimanbarang.detail', compact('detail_pengiriman', 'pengiriman_barang'));
    }

    public function create()
    {
        $toko = Toko::all();
        $user = User::all();
        $detail_toko = DetailToko::all();
        $barang = Barang::all();
        $stock = StockBarang::all();
        // $pengiriman = PengirimanBarang::where('id', $id)->first();

        return view('transaksi.pengirimanbarang.create', compact('toko', 'user', 'detail_toko', 'barang', 'stock'));
    }

    public function store(Request $request)
    {

        try {
            DB::beginTransaction();
            // dd($request);

            // Simpan data dasar pengiriman
            $pengiriman_barang = PengirimanBarang::create([
                'no_resi' => $request->no_resi,
                'toko_pengirim' => $request->toko_pengirim,
                'nama_pengirim' => $request->nama_pengirim,
                'ekspedisi' => $request->ekspedisi,
                'toko_penerima' => $request->toko_penerima,
                'tgl_kirim' => $request->tgl_kirim
            ]);
            // dd($pengiriman_barang);

            DB::commit();

            // Redirect ke tab "detail pengiriman" dengan data pengiriman yang baru disimpan
            return redirect()->route('master.pengirimanbarang.create')
                                 ->with('tab', 'detail')
                                 ->with('pengiriman_barang', $pengiriman_barang);

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
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

    public function getBarangStock($id_toko)
    {
        // Mengambil barang yang tersedia berdasarkan id_toko dari tabel StockBarang
        if ($id_toko == 1){
            $barangs = StockBarang::all();
        }

        // Mengembalikan data dalam format JSON
        return response()->json($barangs);
    }

    public function getHargaBarang($id_barang)
    {
        // Ambil harga dari tabel stock_barang berdasarkan id_barang
        $stock = StockBarang::where('id', $id_barang)->first();

        if ($stock) {
            return response()->json(['harga' => $stock->hpp_baru]);
        } else {
            return response()->json(['error' => 'Barang tidak ditemukan'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $idBarangs = $request->input('id_barang', []);
        $qtys = $request->input('qty', []);
        $hargaBarangs = $request->input('harga', []);

        foreach ($idBarangs as $index => $id_barang) {
            $qty = $qtys[$index] ?? null;
            $harga = $hargaBarangs[$index] ?? null;

            if (is_null($qty) || is_null($harga)) {
                continue;
            }

            if ($qty <= 0 || $harga <= 0) {
                return redirect()->back()->with('error', 'Failed: Data harap diisi dengan benar.');
            }
        }

        try {
            DB::beginTransaction();

            $pengiriman_barang = PengirimanBarang::findOrFail($id);

            $totalItem = 0;
            $totalNilai = 0;

            $count = count($idBarangs);
            for ($i = 0; $i < $count; $i++) {
                $id_barang = $idBarangs[$i];
                $qty = $qtys[$i] ?? null;
                $harga = $hargaBarangs[$i] ?? null;

                if (is_null($qty) || is_null($harga)) {
                    continue;
                }

                if ($id_barang && $qty > 0 && $harga > 0) {
                    $barang = Barang::findOrFail($id_barang);

                    $detail = DetailPengirimanBarang::updateOrCreate(
                        [
                            'id_pengiriman_barang' => $pengiriman_barang->id,
                            'id_barang' => $id_barang,
                        ],
                        [
                            'nama_barang' => $barang->nama_barang,
                            'qty' => $qty,
                            'harga' => $harga,
                            'total_harga' => $qty * $harga,
                        ]
                    );

                    $totalItem += $detail->qty;
                    $totalNilai += $detail->total_harga;
                }
            }

            $pengiriman_barang->total_item = $totalItem;
            $pengiriman_barang->total_nilai = $totalNilai;
            $pengiriman_barang->save();

            DB::commit();

            return redirect()->route('master.pengirimanbarang.index')->with('success', 'Data Pengiriman Barang berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->with('error', 'Failed to update pengeriman barang. ' . $e->getMessage());
        }
    }


// Method untuk menyimpan detail barang
// public function update(Request $request, PengirimanBarang $pengiriman_barang)
// {
//     try {
//         DB::beginTransaction();

//         // Simpan detail barang yang dikirim
//         foreach ($request->id_barang as $key => $id_barang) {
//             $pengiriman_barang->barang()->create([
//                 'id_barang' => $id_barang,
//                 'qty' => $request->qty[$key],
//                 'harga' => $request->harga[$key],
//                 'total_harga' => $request->qty[$key] * $request->harga[$key],
//             ]);
//         }

//         DB::commit();

//         return redirect()->route('master.pengirimanbarang.index')->with('success', 'Detail pengiriman berhasil ditambahkan.');

//     } catch (\Throwable $th) {
//         DB::rollBack();
//         return redirect()->back()->with('error', $th->getMessage());
//     }
// }

public function edit($id)
{
    $pengiriman_barang = PengirimanBarang::with('detail')->findOrFail($id);

    return view('transaksi.pengirimanbarang.edit', compact('pengiriman_barang', ));
}

    public function updateStatus(Request $request, $id)
    {
        // Ambil data pengiriman_barang
        $pengiriman_barang = PengirimanBarang::findOrFail($id);

        $detail_ids = $request->input('detail_ids', []);
        $statuses = $request->input('status_detail', []);
        $level_nama = $request->input('level_nama', []);
        $level_hargas = $request->input('level_harga', []);

        foreach ($detail_ids as $key => $detail_id) {
            $detail = DetailPengirimanBarang::findOrFail($detail_id);

            if (isset($statuses[$key]) && $statuses[$key] == 'success') {

                // Update the status in detail pembelian
                $detail->status = 'success';
                $detail->save();

                // Process the level harga data
                // $levelHargaData = [];

                // if (isset($level_hargas[$key])) {
                //     foreach ($level_hargas[$key] as $index => $nilai) {
                //         $namaLevel = $level_nama[$index]; // Nama level dari array level_nama
                //         $levelHargaData[] = "{$namaLevel} : {$nilai}";
                //     }
                // }

                // // Convert level harga array to JSON format
                // $levelHargaJson = json_encode($levelHargaData);

                // // Check if stock already exists
                // $existingStock = StockBarang::where('id_barang', $detail->id_barang)->first();

                // if ($existingStock) {
                //     $successfulDetails = DetailPengirimanBarang::where('id_barang', $detail->id_barang)
                //                                                 ->where('status', 'success')
                //                                                 ->get();
                //     // dd($successfulDetails);
                //     // Hitung total harga dan qty dari pembelian yang sudah 'success'
                //     $totalHargaSebelumnya = $successfulDetails->sum('total_harga');
                //     $totalQtySebelumnya = $successfulDetails->sum('qty');

                //     $hppBaru = $totalHargaSebelumnya / $totalQtySebelumnya;

                //     $existingStock->stock += $detail->qty;
                //     $existingStock->hpp_baru = $detail->harga_barang;
                //     $existingStock->hpp_baru = $hppBaru;
                //     $existingStock->level_harga = $levelHargaJson;
                //     $existingStock->save();
                // } else {
                //     // Insert new stock record
                //     // $newStock = new StockBarang();
                //     // $newStock->id_barang = $detail->id_barang;
                //     // $newStock->nama_barang = $detail->barang->nama_barang;
                //     // $newStock->hpp_baru = $detail->harga_barang;
                //     // $newStock->hpp_awal = $detail->harga_barang;
                //     // $newStock->hpp_baru = $detail->total_harga / $detail->qty;
                //     // $newStock->stock = $detail->qty;
                //     // $newStock->nilai_total = $detail->qty;
                //     // $newStock->level_harga = $levelHargaJson;
                //     // $newStock->save();
                // }
            }
        }

        // Cek apakah semua barang dalam detail pembelian memiliki status 'success'
        $allSuccess = $pengiriman_barang->detail()->where('status', '!=', 'success')->count() === 0;

        if ($allSuccess) {
            // Jika semua barang sudah success, ubah status pembelian jadi success
            $pengiriman_barang->status = 'success';
            $pengiriman_barang->save();
        }

        return redirect()->route('master.pengirimanbarang.index')->with('success', 'Status Berhasil Diubah');
    }

    public function destroy(string $id)
    {
        //
    }
}

