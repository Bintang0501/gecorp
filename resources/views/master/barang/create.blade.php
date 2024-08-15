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
                                    <form action="#" method="post" class="">

                                        <div class="form-group">
                                            <label for="id_pembelian_barang" class=" form-control-label">Nama Barang</label>
                                                <select name="id_pembelian_barang" id="select" class="form-control">
                                                    <option value="">~Pilih Barang~</option>
                                                    @foreach($detail as $dt)
                                                        @foreach($pembelian as $pembelianItem)
                                                            @if($dt->id_pembelian_barang == $pembelianItem->id && $pembelianItem->status == 'done')
                                                                <option value="{{ $dt->id }}">{{ $dt->nama_barang }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            @foreach($detail as $dt)
                                            <label for="jenis_barang" class=" form-control-label">Jenis Barang<span style="color: red">*</span></label>
                                            <input type="text" id="jenis_barang" name="jenis_barang" readonly value="{{ $dt->jenis_barang }}" class="form-control">
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label for="brand_barang" class=" form-control-label">Brand Barang<span style="color: red">*</span></label>
                                            <input type="text" id="brand_barang" name="brand_barang" readonly placeholder="Nama Brand" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="harga" class=" form-control-label">Harga<span style="color: red">*</span></label>
                                            <input type="number" id="harga" name="harga" readonly placeholder="500000" class="form-control">
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
                                        </div>
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
        <!-- Footer -->
@endsection
