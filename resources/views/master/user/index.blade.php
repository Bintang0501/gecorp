<title>Data Toko - Gecorp</title>
@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header">
                    <div class="page-title">
                        <h1 class="card-title"><strong>Data Master - User</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('dashboard')}}">Dashboard</a></li>
                            <li class="active">Data User</li>
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
                                <a href="{{ route('master.user.create')}}" class="btn btn-primary"><i class="ti-plus menu-icon"></i> Tambah</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama User</th>
                                            <th>Level</th>
                                            <th>Toko</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @forelse ($user as $usr)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$usr->nama}}</td>
                                            <td>{{$usr->leveluser->nama_level}}</td>
                                            <td>{{$usr->toko->nama_toko}}</td>
                                            <td>{{$usr->username}}</td>
                                            <td>{{$usr->email}}</td>
                                            <td>{{$usr->alamat}}</td>
                                            <td>
                                                <form onsubmit="return confirm('Ingin menghapus Data ini ? ?');" action="{{ route('master.user.delete', $usr->id)}}" method="post">
                                                    <a href="{{ route('master.user.edit', $usr->id)}}" class="btn btn-warning btn-sm"><i class="ti-pencil menu-icon"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="ti-trash menu-icon"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty

                                        @endforelse
                                    </tbody>
                                </table>
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
