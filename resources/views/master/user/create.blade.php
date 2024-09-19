<title>Tambah Data User - Gecorp</title>
@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header">
                    <div class="page-title">
                        <h1 class="card-title"><strong>Tambah Data - User</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('master.index')}}">Dashboard</a></li>
                            <li><a href="{{ route('master.user.index')}}">Data User</a></li>
                            <li class="active">Tambah Data User</li>
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
                                    <form action="{{ route('master.user.store')}}" method="post" class="">
                                        @csrf
                                        <div class="form-group">
                                            <label for="id_toko" class=" form-control-label">Nama Toko</label>
                                            <select name="id_toko" data-placeholder="Choose a Country..." class="standardSelect" tabindex="1">
                                                <option value="" required>~Pilih~</option>
                                                    @foreach ($toko as $tk)
                                                    <option value="{{ $tk->id }}">{{ $tk->nama_toko }}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_level" class=" form-control-label">Level</label>
                                            <select name="id_level" data-placeholder="Choose a Country..." class="standardSelect" tabindex="1">
                                            <option value="" required>~Pilih~</option>
                                                    @foreach ($leveluser as $lu)
                                                    <option value="{{ $lu->id }}">{{ $lu->nama_level }}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama" class=" form-control-label">Nama<span style="color: red">*</span></label>
                                            <input type="text" id="nama" name="nama" placeholder="Contoh : User 1" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class=" form-control-label">Email<span style="color: red">*</span></label>
                                            <input type="email" id="email" name="email" placeholder="Contoh : user123@gmail.com" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="username" class=" form-control-label">Username<span style="color: red">*</span></label>
                                            <input type="text" id="username" name="username" placeholder="Contoh : user123" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class=" form-control-label">Password<span style="color: red">*</span></label>
                                            <input type="password" id="password" name="password" placeholder="Contoh : *********" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat" class=" form-control-label">Alamat<span style="color: red">*</span></label>
                                            <textarea name="alamat" id="alamat" rows="4" placeholder="Contoh : Jl. Nyimas Gandasari No.18 Plered - Cirebon" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp" class=" form-control-label">No HP<span style="color: red">*</span></label>
                                            <input type="number" id="no_hp" name="no_hp" placeholder="Contoh : 089xxxxxxxxx" class="form-control">
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
