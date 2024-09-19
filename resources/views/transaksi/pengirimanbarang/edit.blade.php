<title>Edit Data Pengiriman Barang - Gecorp</title>

@extends('layouts.main')

@section('content')

    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header">
                        <div class="page-title">
                            <h1 class="card-title"><strong>Edit Data - Pengiriman Barang</strong></h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ route('master.index') }}">Dashboard</a></li>
                                <li><a href="{{ route('master.pengirimanbarang.index') }}">Data Pengiriman Barang</a></li>
                                <li class="active">Edit Data Pengiriman Barang</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="content">
    <x-adminlte-alerts />
    <!-- Animated -->
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('master.pengirimanbarang.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                    <div class="card-body">
                        {{-- Content --}}
                        <div class="card-body card-block">
                            <form action="{{ route('master.pengirimanbarang.update_status', $pengiriman_barang->id) }}" method="POST" class="">
                                @csrf
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <h4><i class="fa fa-home"></i> Nomor Resi <span class="badge badge-secondary pull-right">{{ $pengiriman_barang->no_resi }}</span></h4>
                                    </li>
                                    <li class="list-group-item">
                                        <h4><i class="fa fa-globe"></i> Toko Pengirim <span class="badge badge-secondary pull-right">{{ $pengiriman_barang->toko->nama_toko }}</span></h4>
                                    </li>
                                    <li class="list-group-item">
                                        <h4><i class="fa fa-globe"></i> Nama Pengirim <span class="badge badge-secondary pull-right">{{ $pengiriman_barang->user->nama }}</span></h4>
                                    </li>
                                    <li class="list-group-item">
                                        <h4><i class="fa fa-globe"></i> Ekspedisi <span class="badge badge-secondary pull-right">{{ $pengiriman_barang->ekspedisi }}</span></h4>
                                    </li>
                                    <li class="list-group-item">
                                        <h4><i class="fa fa-globe"></i> Toko Penerima <span class="badge badge-secondary pull-right">{{ $pengiriman_barang->tokos->nama_toko }}</span></h4>
                                    </li>
                                    <li class="list-group-item">
                                        <h4><i class="fa fa-map-marker"></i> &nbsp;Tanggal Kirim <span class="badge badge-secondary pull-right">{{ $pengiriman_barang->tgl_kirim }}</span></h4>
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $statuses = ['progress', 'success', 'failed'];
                                                @endphp
                                                @foreach ($pengiriman_barang->detail as $detail)
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
                                                    <td>Rp {{ number_format($detail->harga, 0, ',', '.') }}</td>
                                                    <td>Rp {{ number_format($detail->harga * $detail->qty, 0, ',', '.') }}</td>
                                                </tr>
                                                <!-- Modal for each item -->
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th scope="col" colspan="5" style="text-align:right">SubTotal</th>
                                                    <th scope="col">Rp {{ number_format($pengiriman_barang->detail->sum(function($detail) {
                                                        return $detail->harga * $detail->qty;
                                                    }), 0, ',', '.') }}</th>
                                                </tr>
                                            </tfoot>
                                        </table>

                                        <div class="form-group">
                                            <label for="status" class="form-control-label">Status Transaksi</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="" disabled>Pilih Status</option>
                                                @foreach($statuses as $status)
                                                    <option value="{{ $status }}" {{ $pengiriman_barang->status == $status ? 'selected' : '' }}>
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
                        {{-- end Content --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .animated -->
</div>
<!-- /.content -->


<script>
    $(document).ready(function() {
        $('#toko_pengirim').change(function() {
            var idToko = $(this).val();
            if (idToko) {
                $.ajax({
                    url: '/admin/get-users-by-toko/' + idToko,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log('Data received:', data); // Log data untuk debugging
                        $('#nama_pengirim').empty();
                        $('#nama_pengirim').append('<option value="">~Pilih Nama Pengirim~</option>');
                        $.each(data, function(key, value) {
                            $('#nama_pengirim').append('<option value="' + value.id + '">' + value.nama + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 404) {  // Jika tidak ditemukan user
                    $('#nama_pengirim').empty();
                    $('#nama_pengirim').append('<option value="">Toko Tidak ada Admin</option>');
                } else {
                    console.error(xhr.responseText); // Log error lainnya
                }
            }
        });
            } else {
                $('#nama_pengirim').empty();
                $('#nama_pengirim').append('<option value="">~Nama Pengirim Tidak Ditemukan~</option>');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#toko_pengirim').change(function() {
            var idToko = $(this).val();
            if (idToko) {
                $.ajax({
                    url: '/admin/get-barangs-by-toko/' + idToko,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log('Data received:', data); // Log data untuk debugging
                        $('#nama_barang').empty();
                        $('#nama_barang').append('<option value="">~Pilih Nama Barang~</option>');
                        $.each(data, function(key, value) {
                            $('#nama_barang').append('<option value="' + value.id + '">' + value.nama_barang +  '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 404) {  // Jika tidak ditemukan barang
                            $('#nama_barang').empty();
                            $('#nama_barang').append('<option value="">Tak ada Barang di Toko Tersebut</option>');
                        } else {
                            console.error(xhr.responseText); // Log error lainnya
                        }
                    }
                });
            } else {
                $('#nama_barang').empty();
                $('#nama_barang').append('<option value="">~Nama Barang Tidak Ditemukan~</option>');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        function loadHarga(idDetail, idToko) {
            if (idDetail && idToko) {
                $.ajax({
                    url: '/admin/get-harga-barang/' + idDetail + '/' + idToko,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        if (data.harga) {
                            var formattedHarga = new Intl.NumberFormat('id-ID').format(data.harga);
                            $('#harga').val(formattedHarga);
                            $('#harga').data('real-value', data.harga);
                        } else {
                            $('#harga').val('');
                        }
                    },
                    error: function(xhr) {
                        $('#harga').val('');
                    }
                });
            }
        }

        var initialNamaBarang = $('#nama_barang').val();
        var initialTokoPengirim = $('#toko_pengirim').val();
        loadHarga(initialNamaBarang, initialTokoPengirim);

        $('#nama_barang').change(function() {
            var idDetail = $(this).val();
            var idToko = $('#toko_pengirim').val();
            loadHarga(idDetail, idToko);
        });

        $('form').on('submit', function() {
            var hargaInput = $('#harga');
            var realValue = hargaInput.data('real-value');
            hargaInput.val(realValue);
        });
    });
    </script>

@endsection
