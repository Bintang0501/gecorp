@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header">
                    <div class="page-title">
                        <h1 class="card-title"><strong>Data - Pembelian Barang</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('master.index')}}">Dashboard</a></li>
                            <li class="active">Data Pembelian Barang</li>
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
                                <a href="{{ route('master.pembelianbarang.create')}}" class="btn btn-primary"><i class="ti-plus menu-icon"></i> Tambah</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Status</th>
                                            <th>No. Nota</th>
                                            <th>Tgl Nota</th>
                                            <th>Tgl Input</th>
                                            <th>Supplier</th>
                                            <th>Total Item</th>
                                            <th>Total Harga</th>
                                            <th>Nama Toko</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($pembelian as $beli)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            @if ($beli->status == 'progress')
                                                <td><h4><span class="badge badge-warning">Progress</span></h4></td>  
                                            @elseif ($beli->status == 'done')
                                                <td><h4><span class="badge badge-success">Done</span></h4></td>
                                            @else
                                                <td><h4><span class="badge badge-danger">Failed</span></h4></td>
                                            @endif
                                            <td>{{ $beli->no_nota }}</td>
                                            <td>{{ $beli->tgl_nota }}</td>
                                            <td>{{ $beli->tgl_beli }}</td>
                                            <td>{{ $beli->id_supplier }}</td>
                                            <td>{{ $beli->total_item }}</td>
                                            <td>{{ $beli->total_harga }}</td>
                                            <td>{{ $beli->id_toko }}</td>
                                            <td>
                                                <form onsubmit="return confirm('Ingin menghapus Kostum ini ? ?');" action="{{ route('master.pembelianbarang.delete', $beli->id) }}" method="POST">
                                                    <a href="{{ route('master.pembelianbarang.edit', $beli->id) }}" class="btn btn-warning btn-sm"><i class="ti-pencil menu-icon"></i></a>
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
        <div class="clearfix"></div>
        <!-- Footer -->
        @endsection
</body>
</html>
