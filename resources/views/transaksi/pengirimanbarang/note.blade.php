<title>Tambah Data Pengiriman Barang - Gecorp</title>

@extends('layouts.main')

@section('content')

    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header">
                        <div class="page-title">
                            <h1 class="card-title"><strong>Tambah Data - Pengiriman Barang</strong></h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ route('master.index') }}">Dashboard</a></li>
                                <li><a href="{{ route('master.pengirimanbarang.index') }}">Data Pengiriman Barang</a></li>
                                <li class="active">Tambah Data Pengiriman Barang</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <x-adminlte-alerts />
        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('master.pengirimanbarang.index') }}" class="btn btn-danger"></i> Kembali</a>
                        </div>
                        <div class="card-body">
                            {{-- Content --}}
                            <div class="card-body card-block">
                                <form action="{{ route('master.pengirimanbarang.store')}}" method="POST" class="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="no_resi" class=" form-control-label">Nomor Resi<span
                                                style="color: red">*</span></label>
                                        <input type="number" id="no_resi" name="no_resi"
                                            placeholder="Contoh : 101002849121" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Toko Pengirim<span
                                                style="color: red">*</span></label>
                                        <select class="standardSelect" name="toko_pengirim" id="toko_pengirim" style="display: block;">
                                            <option class="" required>~Pilih Nama Toko~</option>
                                            @foreach ($toko as $tk)
                                                <option value="{{ $tk->id }}">{{ $tk->nama_toko }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_pengirim" class=" form-control-label">Nama Pengirim (Admin Toko)<span style="color: red">*</span></label>
                                        <select name="nama_pengirim" class="form-control" id="nama_pengirim" data-placeholder="Choose a Country..." tabindex="1">
                                            <option class="" required>~Pilih Toko Terlebih Dahulu~</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Nama Barang<span
                                                style="color: red">*</span></label>
                                        <select class="form-control" name="nama_barang" id="nama_barang" style="display: block;">
                                            <option class="" required>~Pilih Toko Terlebih Dahulu~</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga" class=" form-control-label">Harga perBarang<span
                                                style="color: red">*</span></label>
                                        <input type="text" id="harga" name="harga" readonly placeholder="0"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="qty" class=" form-control-label">Jumlah Item<span
                                                style="color: red">*</span></label>
                                        <input type="number" id="qty" name="qty" placeholder="Contoh : 20"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="ekspedisi" class=" form-control-label">Ekspedisi<span
                                                style="color: red">*</span></label>
                                        <input type="text" id="ekspedisi" name="ekspedisi" placeholder="Contoh : Sicepat"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Toko Penerima<span
                                                style="color: red">*</span></label>
                                        <select class="standardSelect" name="toko_penerima" id="toko_penerima" style="display: block;">
                                            <option class="" required>~Pilih Nama Toko~</option>
                                            @foreach ($toko as $tk)
                                                <option value="{{ $tk->id }}">{{ $tk->nama_toko }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_kirim" class=" form-control-label">Tanggal Kirim<span
                                                style="color: red">*</span></label>
                                        <input type="date" id="tgl_kirim" name="tgl_kirim" placeholder="DD/MM/YYYY"
                                            class="form-control">
                                    </div>
                                    {{-- <div class="form-group" hidden>
                                        <label for="tgl_terima" class=" form-control-label">Tanggal Terima<span
                                                style="color: red">*</span></label>
                                        <input type="date" id="tgl_terima" name="tgl_terima" placeholder="DD/MM/YYYY"
                                            class="form-control">
                                    </div> --}}
                                    {{-- <div class="form-group">
                                            <label for="status" class=" form-control-label">Status</label>
                                                <select name="status" id="select" class="form-control">
                                                    <option value="Progress">Progress</option>
                                                    <option value="Done">Done</option>
                                                    <option value="Failed">Failed   </option>
                                                </select>
                                        </div> --}}
                                    <br>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-dot-circle-o"></i> Simpan
                                        </button>
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
    <div class="clearfix"></div>

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
    $('#nama_barang').change(function() {
        var idDetail = $(this).val();  // Mendapatkan id detail_toko dari dropdown nama_barang
        var idToko = $('#toko_pengirim').val();  // Mendapatkan id toko dari dropdown toko_pengirim

        if (idDetail && idToko) {
            $.ajax({
                url: '/admin/get-harga-barang/' + idDetail + '/' + idToko,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log('Data dari server:', data);
                    if (data.harga) {
                        var formattedHarga = new Intl.NumberFormat('id-ID').format(data.harga);
                        $('#harga').val(formattedHarga);  // Menampilkan harga yang sudah diformat
                        $('#harga').data('real-value', data.harga);  // Menyimpan harga asli di data attribute
                    } else {
                        $('#harga').val('');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    $('#harga').val('');
                }
            });
        } else {
            $('#harga').val('');
        }
    });
    $('form').on('submit', function() {
            var hargaInput = $('#harga');
            var realValue = hargaInput.data('real-value');
            hargaInput.val(realValue);  // Set value asli sebelum submit
        });
});

</script>


{{-- <script>
    $(document).ready(function() {
        $('#toko_penerima').change(function() {
            var idToko = $(this).val();
            if (idToko) {
                $.ajax({
                    url: '/admin/get-users-by-toko/' + idToko,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log('Data received:', data); // Log data untuk debugging
                        $('#nama_penerima').empty();
                        $('#nama_penerima').append('<option value="">~Pilih Nama Penerima~</option>');
                        $.each(data, function(key, value) {
                            $('#nama_penerima').append('<option value="' + value.id + '">' + value.nama + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 404) {  // Jika tidak ditemukan user
                    $('#nama_penerima').empty();
                    $('#nama_penerima').append('<option value="">Toko Tidak ada Admin</option>');
                } else {
                    console.error(xhr.responseText); // Log error lainnya
                }
            }
        });
            } else {
                $('#nama_penerima').empty();
                $('#nama_penerima').append('<option value="">~Nama Pengirim Tidak Ditemukan~</option>');
            }
        });
    });
</script> --}}
@endsection
