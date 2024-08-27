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
                                <form action="#" method="post" class="">
                                    <div class="form-group">
                                        <label for="no_resi" class=" form-control-label">Nomor Resi<span
                                                style="color: red">*</span></label>
                                        <input type="number" id="no_resi" name="no_resi"
                                            placeholder="Contoh : 101002849121" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Toko Pengirim<span
                                                style="color: red">*</span></label>
                                        <select class="standardSelect" name="id_toko" id="id_toko" style="display: block;">
                                            <option class="" required>~Pilih Nama Toko~</option>
                                            @foreach ($toko as $tk)
                                                <option value="{{ $tk->id }}">{{ $tk->nama_toko }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_user" class=" form-control-label">Nama Pengirim (Admin Toko)<span style="color: red">*</span></label>
                                        <select name="id_user" class="form-control" id="id_user" data-placeholder="Choose a Country..." tabindex="1">
                                            <option class="" required>~Pilih Toko Terlebih Dahulu~</option>
                                        </select>
                                    </div>
                                    {{-- <div class="form-group">
                                            <label for="id_toko" class=" form-control-label">Toko Penerima<span style="color: red">*</span></label>
                                            <select name="id_toko" data-placeholder="Choose a Country..." class="standardSelect" tabindex="1">
                                                <option value="" required>~Pilih Nama Toko~</option>
                                                    @foreach ($toko as $tk)
                                                    <option value="{{ $tk->id }}">{{ $tk->nama_toko }}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_user" class=" form-control-label">Nama Penerima<span style="color: red">*</span></label>
                                            <select name="id_user" data-placeholder="Choose a Country..." class="standardSelect" tabindex="1">
                                                <option value="" required>~Pilih Nama Penerima~</option>
                                                    @foreach ($user as $usr)
                                                    <option value="{{ $usr->id }}">{{ $usr->nama }}</option>
                                                    @endforeach
                                                </select>
                                        </div> --}}
                                    <div class="form-group">
                                        <label for="ekspedisi" class=" form-control-label">Ekspedisi<span
                                                style="color: red">*</span></label>
                                        <input type="text" id="ekspedisi" name="ekspedisi" placeholder="Contoh : J&E"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga" class=" form-control-label">Harga<span
                                                style="color: red">*</span></label>
                                        <input type="number" id="harga" name="harga" placeholder="Contoh : 8000000"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="item" class=" form-control-label">Item<span
                                                style="color: red">*</span></label>
                                        <input type="number" id="item" name="item" placeholder="Contoh : 20"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_kirim" class=" form-control-label">Tanggal Kirim<span
                                                style="color: red">*</span></label>
                                        <input type="date" id="tgl_kirim" name="tgl_kirim" placeholder="DD/MM/YYYY"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_terima" class=" form-control-label">Tanggal Terima<span
                                                style="color: red">*</span></label>
                                        <input type="date" id="tgl_terima" name="tgl_terima" placeholder="DD/MM/YYYY"
                                            class="form-control">
                                    </div>
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
        $('#id_toko').change(function() {
            var idToko = $(this).val();
            if (idToko) {
                $.ajax({
                    url: '/admin/get-users-by-toko/' + idToko,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log('Data received:', data); // Log data untuk debugging
                        $('#id_user').empty();
                        $('#id_user').append('<option value="">~Pilih Nama Pengirim~</option>');
                        $.each(data, function(key, value) {
                            $('#id_user').append('<option value="' + value.id + '">' + value.nama + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 404) {  // Jika tidak ditemukan user
                    $('#id_user').empty();
                    $('#id_user').append('<option value="">Toko Tidak ada Admin</option>');
                } else {
                    console.error(xhr.responseText); // Log error lainnya
                }
            }
        });
            } else {
                $('#id_user').empty();
                $('#id_user').append('<option value="">~Nama Pengirim Tidak Ditemukan~</option>');
            }
        });
    });
</script>
@endsection
