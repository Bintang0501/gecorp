<title>Data Toko - Gecorp</title>
@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header">
                    <div class="page-title">
                        <h1 class="card-title"><strong>Data Master - Toko</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('dashboard')}}">Dashboard</a></li>
                            <li class="active">Data Toko</li>
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
                                <a href="{{ route('master.toko.create')}}" class="btn btn-primary"><i class="ti-plus menu-icon"></i> Tambah</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Toko</th>
                                            <th>Wilayah</th>
                                            <th>Alamat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @forelse ($toko as $tk)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$tk->nama_toko}}</td>
                                            <td>{{$tk->wilayah}}</td>
                                            <td>{{$tk->alamat}}</td>
                                            <td>
                                                <form onsubmit="return confirm('Ingin menghapus Data ini ? ?');" action="{{ route('master.toko.delete', $tk->id)}}" method="post">
                                                    <a href="{{ route('master.toko.edit', $tk->id)}}" class="btn btn-warning btn-sm"><i class="ti-pencil menu-icon"></i></a>
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
