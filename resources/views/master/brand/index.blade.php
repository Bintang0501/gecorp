<title>Data Brand - Gecorp</title>

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header">
                    <div class="page-title">
                        <h1 class="card-title"><strong>Data Master - Brand</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('master.index')}}">Dashboard</a></li>
                            <li class="active">Data Brand</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Content -->
<div class="content">
    @if (session('success'))
    <div class="alerts">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert" id="success-alert">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    </div>
    @endif

    @if (session('error'))
    <div class="alerts">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert" id="error-alert">
                    {{ session('error') }}
                </div>
            </div>
        </div>
    </div>
    @endif
            <!-- Animated -->
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('master.brand.create')}}" class="btn btn-primary"><i class="ti-plus menu-icon"></i> Tambah</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Brand</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($brand as $br)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $br->nama_brand }}</td>
                                            <td>
                                                <form onsubmit="return confirm('Ingin menghapus Data ini ? ?');" action="{{ route('master.brand.delete', $br->id) }}" method="POST">
                                                    <a href="{{ route('master.brand.edit', $br->id)}}" class="btn btn-warning btn-sm"><i class="ti-pencil menu-icon"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="ti-trash menu-icon"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
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

        <!-- Footer -->

        @endsection
</body>
</html>
