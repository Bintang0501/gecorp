<title>Edit Data Toko - Gecorp</title>

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header">
                    <div class="page-title">
                    <h1 class="card-title"><strong>Edit Data - Toko</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('master.index')}}">Dashboard</a></li>
                            <li><a href="{{ route('master.toko.index')}}">Data Toko</a></li>
                        <li class="active">Edit Data Toko</li>
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
                                <a href="{{ route('master.toko.index')}}" class="btn btn-danger"></i> Kembali</a>
                            </div>
                            <div class="card-body">
                                {{-- Content --}}
                                <div class="card-body card-block">
                                    <form action="{{ route('master.toko.update', $toko->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')

                                        <div class="form-group">
                                            <label for="nama_toko" class=" form-control-label">Nama Toko<span style="color: red">*</span></label>
                                            <input type="text" class="form-control @error('nama_toko') is-invalid @enderror" name="nama_toko" value="{{ old('nama_toko', $toko->nama_toko) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="id_level_harga" class="form-control-label">Level Harga</label>
                                            <select name="id_level_harga[]" multiple class="standardSelect">
                                                @foreach ($levelharga as $lh)
                                                    <option value="{{ $lh->id }}"
                                                        @if(in_array($lh->id, json_decode($toko->id_level_harga, true))) selected @endif>
                                                        {{ $lh->nama_level_harga }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="wilayah" class=" form-control-label">Wilayah<span style="color: red">*</span></label>
                                            <input type="text" class="form-control @error('wilayah') is-invalid @enderror" name="wilayah" value="{{ old('wilayah', $toko->wilayah) }}" placeholder="Masukkan wilayah">
                                        </div>
                                        <div class="form-group">
                                            <label for="wilayah" class=" form-control-label">Alamat<span style="color: red">*</span></label>
                                            <textarea name="alamat" id="alamat" rows="4" @error('alamat') is-invalid @enderror" name="alamat" class="form-control">{{ old('alamat', $toko->alamat) }}</textarea>
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

        <!-- Footer -->
@endsection
