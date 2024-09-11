<title>Data Stock Barang - Gecorp</title>

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header">
                    <div class="page-title">
                        <h1 class="card-title"><strong>Data Master - Stock Barang</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('master.index')}}">Dashboard</a></li>
                            <li class="active">Data Stock Barang</li>
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
                                <a href="{{ route('master.stockbarang.create')}}" class="btn btn-primary"><i class="ti-plus menu-icon"></i> Tambah</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Barang</th>
                                            <th>Stock</th>
                                            <th>Harga Satuan (Hpp Baru)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <tr>
                                            <td>#</td>
                                            <td>POCO F5 RAM 8/256</td>
                                            <td>10</td>
                                            <td>Rp. 5.000.000</td>
                                        </tr> --}}
                                        <?php $no = 1; ?>
                                        @forelse ($stock as $stk)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$stk->nama_barang}}</td>
                                            <td>{{$stk->stock}}</td>
                                            <td>Rp. {{ number_format($stk->hpp_baru, 0, '.', '.') }}</td>
                                            <td>
                                                <form onsubmit="return confirm('Ingin menghapus Data ini ? ?');" action="#" method="POST">
                                                    <a href="#" class="btn btn-warning btn-sm"><i class="ti-pencil menu-icon"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="ti-trash menu-icon"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <div class="alert alert-danger">
                                            Data Stock belum Tersedia.
                                        </div>
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
