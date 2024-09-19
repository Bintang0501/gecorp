<title>Tambah Data Barang - Gecorp</title>
@extends('layouts.main')
@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header">
                    <div class="page-title">
                        <h1 class="card-title"><strong>Tambah Data - Barang</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('master.index')}}">Dashboard</a></li>
                            <li><a href="{{ route('master.barang.index')}}">Data Barang</a></li>
                            <li class="active">Tambah Data Barang</li>
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
                                <a href="{{ route('master.barang.index')}}" class="btn btn-danger"></i> Kembali</a>
                            </div>
                            <div class="card-body">
                                {{-- Content --}}
                                <div class="card-body card-block">
                                    <form action="{{ route('master.barang.store')}}" method="post" class="">
                                        @csrf
                                        <div class="form-group">
                                                <div class="form-group">
                                                <label for="nama_barang" class=" form-control-label">Nama Barang<span style="color: red">*</span></label>
                                                <input type="text" id="nama_barang" name="nama_barang" value="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_jenis_barang" class=" form-control-label">Jenis Barang</label>
                                            <select name="id_jenis_barang" data-placeholder="Choose a Country..." class="standardSelect">
                                                <option value="" required>~Pilih Jenis Barang~</option>
                                                    @foreach ($jenis as $jn)
                                                    <option value="{{ $jn->id }}">{{ $jn->nama_jenis_barang }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_brand_barang" class=" form-control-label">Brand Barang</label>
                                            <select name="id_brand_barang" id="id_brand_barang" class="standardSelect">
                                                <option value="">~Pilih Brand~</option>
                                                @foreach ($brand as $br)
                                                    <option value="{{ $br->id }}">{{ $br->nama_brand }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="harga" class=" form-control-label">Harga<span style="color: red">*</span></label>
                                            <input type="number" id="harga" name="harga" placeholder="500000" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="stock" class=" form-control-label">Stock<span style="color: red">*</span></label>
                                            <input type="number" id="stock" name="stock" placeholder="Contoh : 12" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="stock_fix" class=" form-control-label">Stock Fix<span style="color: red">*</span></label>
                                            <input type="text" id="stock_fix" name="stock_fix" placeholder="Stock Fix" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="stock_error" class=" form-control-label">Stock Error<span style="color: red">*</span></label>
                                            <input type="text" id="stock_error" name="stock_error" placeholder="Stock Error" class="form-control">
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

        <!-- Footer -->

        <!-- JavaScript untuk AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#id_jenis_barang').change(function() {
            var idJenisBarang = $(this).val();
            var $brandSelect = $('#id_brand_barang');

            if (idJenisBarang) {
                $.ajax({
                    url: '{{ route("getBrandsByJenis") }}',
                    type: 'GET',
                    data: { id_jenis_barang: idJenisBarang },
                    success: function(data) {
                        console.log(data);
                        $brandSelect.empty(); // Kosongkan pilihan sebelumnya
                        $brandSelect.append('<option value="">~Pilih Brand~</option>');
                        $.each(data, function(key, value) {
                            $brandSelect.append('<option value="' + value.id + '">' + value.nama_brand + '</option>');
                        });
                    },
                    error: function(xhr) {
                        console.error("Request AJAX gagal:", xhr.responseText);
                    }
                });
            } else {
                $brandSelect.empty();
                $brandSelect.append('<option value="">~Pilih Brand~</option>');
            }
        });
    });
</script>
@endsection
