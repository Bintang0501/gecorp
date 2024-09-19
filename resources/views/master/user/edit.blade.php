<title>Edit Data User - Gecorp</title>

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header">
                    <div class="page-title">
                    <h1 class="card-title"><strong>Edit Data - User</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('master.index')}}">Dashboard</a></li>
                            <li><a href="{{ route('master.user.index')}}">Data User</a></li>
                        <li class="active">Edit Data User</li>
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
                                <a href="{{ route('master.user.index')}}" class="btn btn-danger"></i> Kembali</a>
                            </div>
                            <div class="card-body">
                                {{-- Content --}}
                                <div class="card-body card-block">
                                    <form action="{{ route('master.user.update', $user->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            <label for="id_toko" class=" form-control-label">Nama Toko</label>
                                            <select name="id_toko" class="standardSelect" tabindex="1">
                                                <option value="">~Pilih~</option>
                                                    @foreach ($toko as $tk)
                                                    <option value="{{ $tk->id }}" {{ $user->id_toko == $tk->id ? 'selected' : '' }}>{{ $tk->nama_toko }}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_level" class=" form-control-label">Level</label>
                                            <select name="id_level" class="standardSelect" tabindex="1">
                                                <option value="">~Pilih~</option>
                                                    @foreach ($leveluser as $lu)
                                                    <option value="{{ $lu->id }}" {{ old('id_level', $user->id_level) == "$lu->id" ? "selected" : "" }}>{{ $lu->nama_level }}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama" class=" form-control-label">Nama<span style="color: red">*</span></label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $user->nama) }}" placeholder="Masukkan nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class=" form-control-label">Email<span style="color: red">*</span></label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" placeholder="Contoh : user@gmail.com">
                                        </div>
                                        <div class="form-group">
                                            <label for="username" class=" form-control-label">Username<span style="color: red">*</span></label>
                                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $user->username) }}" placeholder="Contoh : users213">
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class=" form-control-label">Password<span style="color: red">*</span></label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password', $user->password) }}" placeholder="Contoh : *********">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat" class=" form-control-label">Alamat<span style="color: red">*</span></label>
                                            <textarea name="alamat" id="alamat" rows="4" @error('alamat') is-invalid @enderror" name="alamat" class="form-control">{{ old('alamat', $user->alamat) }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp" class=" form-control-label">No HP<span style="color: red">*</span></label>
                                            <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}" placeholder="Contoh : 089xxxxxxxxxx">
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
