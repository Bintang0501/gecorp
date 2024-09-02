@extends('layouts.main')

@section('content')
<!-- Breadcrumb and Header -->

<!-- Form -->
<div class="content">
    <x-adminlte-alerts />
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('master.pembelianbarang.index')}}" class="btn btn-danger">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('master.pembelianbarang.update_status', $pembelian->id) }}" method="POST">
                        @csrf
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h5><i class="fa fa-home"></i> Nomor Nota <span class="badge badge-secondary pull-right">{{ $pembelian->no_nota }}</span></h5>
                            </li>
                            <li class="list-group-item">
                                <h5><i class="fa fa-globe"></i> Nama Supplier <span class="badge badge-secondary pull-right">{{ $pembelian->supplier->nama_supplier }}</span></h5>
                            </li>
                            <li class="list-group-item">
                                <h5><i class="fa fa-map-marker"></i> &nbsp;Tanggal Nota <span class="badge badge-secondary pull-right">{{ $pembelian->tgl_nota }}</span></h5>
                            </li>
                        </ul>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Status</th>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Barang</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Total Harga</th>
                                            <th scope="col">Level Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $statuses = ['progress', 'success', 'failed'];
                                        @endphp
                                        @foreach ($pembelian->detail as $detail)
                                        <tr>
                                            <td>
                                                <select name="status_detail[]" id="status_detail_{{ $detail->id }}" class="form-control status-select">
                                                    <option value="" disabled>Pilih Status</option>
                                                    @foreach($statuses as $status)
                                                        <option value="{{ $status }}" {{ $detail->status == $status ? 'selected' : '' }}>
                                                            {{ $status }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $detail->barang->nama_barang }}</td>
                                            <td>{{ $detail->qty }}</td>
                                            <td>Rp {{ number_format($detail->harga_barang, 0, ',', '.') }}</td>
                                            <td>Rp {{ number_format($detail->harga_barang * $detail->qty, 0, ',', '.') }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary mb-1 atur-harga-btn" data-toggle="modal" data-target="#mediumModal-{{ $detail->id }}" style="display: {{ $detail->status == 'success' ? 'inline-block' : 'none' }};">
                                                    Atur Harga
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Modal for each item -->
                                        <div class="modal fade" id="mediumModal-{{ $detail->id }}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel-{{ $detail->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mediumModalLabel-{{ $detail->id }}">Atur Harga - {{ $detail->barang->nama_barang }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Form atau konten modal untuk mengatur harga -->
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <!-- Jumlah Item -->
                                                                <div class="card border border-primary">
                                                                    <div class="card-body">
                                                                        <p class="card-text">Detail Stock<strong>(GSS)</strong></p>
                                                                        <p class="card-text">Stock :<strong class="stock">0</strong></p>
                                                                        <p class="card-text">Hpp Awal : <strong class="hpp-awal">Rp 0</strong></p>
                                                                        <p class="card-text">Hpp Baru : <strong class="hpp-baru">Rp 0</strong></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <!-- Harga Barang -->
                                                                <div>
                                                                    @foreach ($LevelHarga as $level)
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon">{{ $level->nama_level_harga }}</div>
                                                                            <input type="text" class="form-control">
                                                                            <div class="input-group-addon">7.8%</div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-primary">Confirm</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th scope="col" colspan="5" style="text-align:right">SubTotal</th>
                                            <th scope="col">Rp {{ number_format($pembelian->detail->sum(function($detail) {
                                                return $detail->harga_barang * $detail->qty;
                                            }), 0, ',', '.') }}</th>
                                        </tr>
                                    </tfoot>                                    
                                </table>

                                <div class="form-group">
                                    <label for="status" class="form-control-label">Status Transaksi</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="" disabled>Pilih Status</option>
                                        @foreach($statuses as $status)
                                            <option value="{{ $status }}" {{ $pembelian->status == $status ? 'selected' : '' }}>
                                                {{ $status }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Submit Button -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-dot-circle-o"></i> Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Dapatkan semua elemen select dengan class status-select
    const statusSelects = document.querySelectorAll('.status-select');

    statusSelects.forEach(select => {
        // Event listener untuk setiap select option
        select.addEventListener('change', function() {
            const status = this.value; // Ambil nilai status yang dipilih
            const row = this.closest('tr'); // Ambil row (baris) dari select yang sedang diubah
            const aturHargaBtn = row.querySelector('.atur-harga-btn'); // Temukan tombol "Atur Harga" di dalam row

            // Tampilkan atau sembunyikan tombol berdasarkan status yang dipilih
            if (status === 'success') {
                aturHargaBtn.style.display = 'inline-block'; // Tampilkan tombol
            } else {
                aturHargaBtn.style.display = 'none'; // Sembunyikan tombol
            }
        });
    });
});

</script>

@endsection
