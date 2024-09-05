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
                                        <input type="hidden" name="detail_ids[{{ $detail->id }}]" value="{{ $detail->id }}">
                                        <tr>
                                            <td>
                                                @if ($detail->status == 'success')
                                                <!-- Jika status sudah 'success', tampilkan badge -->
                                                <span class="badge badge-success">Success</span>
                                                @else
                                                <select name="status_detail[{{ $detail->id }}]" id="status_detail_{{ $detail->id }}" class="form-control status-select">
                                                    <option value="" disabled>Pilih Status</option>
                                                    @foreach($statuses as $status)
                                                        <option value="{{ $status }}" {{ $detail->status == $status ? 'selected' : '' }}>
                                                            {{ $status }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @endif
                                            </td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $detail->barang->nama_barang }}</td>
                                            <td>{{ $detail->qty }}</td>
                                            <td>Rp {{ number_format($detail->harga_barang, 0, ',', '.') }}</td>
                                            <td>Rp {{ number_format($detail->harga_barang * $detail->qty, 0, ',', '.') }}</td>
                                            <td>
                                                <button 
                                                    type="button" 
                                                    class="btn btn-primary mb-1 atur-harga-btn" 
                                                    data-toggle="modal" 
                                                    data-target="#mediumModal-{{ $detail->id }}" 
                                                    data-id_barang="{{ $detail->id_barang }}"
                                                    data-id="{{ $detail->id }}"
                                                    {{ $detail->status == 'success' ? 'disabled' : '' }}>
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
                                                                        <p class="card-text">Detail Stock<strong> (GSS)</strong></p>
                                                                        <p class="card-text">Stock :<strong class="stock">0</strong></p>
                                                                        <p class="card-text">Hpp Awal : <strong class="hpp-awal">Rp 0</strong></p>
                                                                        <p class="card-text">Hpp Baru : <strong class="hpp-baru">Rp 0</strong></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <!-- Harga Barang -->
                                                                <div>
                                                                    @foreach ($LevelHarga as $index => $level)
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon">{{ $level->nama_level_harga }}</div>
                                                                            <input type="hidden" name="level_nama[]" value="{{ $level->nama_level_harga }}">
                                                                            <input type="text" class="form-control" name="level_harga[{{ $detail->id }}][]" value="">
                                                                            <div class="input-group-addon">10%</div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Confirm</button>
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

<style>
    .atur-harga-btn {
        display: none; /* Sembunyikan tombol secara default */
    }
</style>

<script>

document.addEventListener('DOMContentLoaded', function() {
    const statusSelects = document.querySelectorAll('.status-select');

    statusSelects.forEach(select => {
        const row = select.closest('tr');
        const aturHargaBtn = row.querySelector('.atur-harga-btn');
        
        // Set tombol "Atur Harga" tidak muncul secara default
        aturHargaBtn.style.display = 'none';

        // Event listener untuk mengubah visibilitas tombol berdasarkan status
        select.addEventListener('change', function() {
            const status = this.value;

            if (status === 'success') {
                aturHargaBtn.style.display = 'inline-block'; // Tampilkan tombol jika status "success"
            } else {
                aturHargaBtn.style.display = 'none'; // Sembunyikan tombol jika status bukan "success"
            }
        });
    });

    const aturHargaButtons = document.querySelectorAll('.atur-harga-btn');

    aturHargaButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            const id_barang = button.getAttribute('data-id_barang');
            const id_modal = button.getAttribute('data-id'); // Ambil data-id yang benar dari tombol
            const modalId = `#mediumModal-${id_modal}`; // Gunakan id_modal untuk membuat ID modal

            fetch(`/admin/get-stock/${id_barang}`)
                .then(response => response.json())
                .then(data => {
                    const modal = document.querySelector(modalId);
                    if (modal) {
                        modal.querySelector('.stock').textContent = data.stock;
                        modal.querySelector('.hpp-awal').textContent = `Rp ${new Intl.NumberFormat('id-ID').format(data.hpp_awal)}`;
                        modal.querySelector('.hpp-baru').textContent = `Rp ${new Intl.NumberFormat('id-ID').format(data.hpp_baru)}`;
                        Object.keys(data.level_harga).forEach(function(level_name, index) {
                            const inputField = modal.querySelectorAll('input[name="level_harga[' + id_modal + '][]"]')[index];
                            if (inputField) {
                                inputField.value = data.level_harga[level_name];
                            }
                        });
                    } else {
                        console.error(`Modal dengan ID ${modalId} tidak ditemukan.`);
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        });
    });
});


</script>

@endsection
