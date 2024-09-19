<title>Edit Data Barang - Gecorp</title>

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header">
                    <div class="page-title">
                        <h1 class="card-title"><strong>Edit Data Barang</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('master.index')}}">Dashboard</a></li>
                            <li><a href="{{ route('master.barang.index')}}">Data Barang</a></li>
                            <li class="active">Edit Data Barang</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content -->
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('master.barang.index')}}" class="btn btn-danger"><i class="ti-arrow-left menu-icon"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('master.barang.update', $barang->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="id_jenis_barang" class=" form-control-label">Jenis Barang</label>
                                <select name="id_jenis_barang" class="standardSelect" tabindex="1">
                                    <option value="">~Pilih~</option>
                                    @foreach ($jenis as $jn)
                                    <option value="{{ $jn->id }}" {{ old('id_jenis_barang', $barang->id_jenis_barang) == $jn->id ? 'selected' : '' }}>
                                        {{ $jn->nama_jenis_barang }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_brand_barang" class=" form-control-label">Brand Barang</label>
                                <select name="id_brand_barang" class="standardSelect" tabindex="1">
                                    <option value="">~Pilih~</option>
                                    @foreach ($brand as $br)
                                    <option value="{{ $jn->id }}" {{ old('id_brand_barang', $barang->id_brand_barang) == $br->id ? 'selected' : '' }}>
                                        {{ $br->nama_brand }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_barang" class=" form-control-label">Nama barang<span style="color: red">*</span></label>
                                <input type="text" id="nama_barang" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}" placeholder="Contoh : Bearbarang" class="form-control">
                            </div>
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .animated -->
</div>
<!-- /.content -->

<!-- Footer -->
@endsection
</body>
</html>
