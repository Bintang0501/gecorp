<title>Data Pengiriman Barang - Gecorp</title>

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header">
                    <div class="page-title">
                        <h1 class="card-title"><strong>Data - Pengiriman Barang</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('master.index')}}">Dashboard</a></li>
                            <li class="active">Data Pengiriman Barang</li>
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
                                <a href="{{ route('master.pengirimanbarang.create')}}" class="btn btn-primary"><i class="ti-plus menu-icon"></i> Tambah</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Detail</th>
                                            <th>Status</th>
                                            <th>Tgl Pengiriman</th>
                                            <th>Tgl Terima</th>
                                            <th>No. Resi</th>
                                            <th>Toko Pengirim</th>
                                            <th>Nama Pengirim</th>
                                            <th>Ekspedisi</th>
                                            <th>Jumlah Qty</th>
                                            <th>Total Harga</th>
                                            <th>Toko Penerima</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pengiriman_barang as $prbr)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>
                                                <a href="{{ route('master.pengirimanbarang.detail', $prbr->id)}}" class="btn btn-primary btn-sm">Cek Detail</i></a>
                                            </td>
                                            @if ($prbr->status == 'failed')
                                                <td><h4><span class="badge badge-danger">Failed</span></h4></td>
                                            @elseif ($prbr->status == 'progress')
                                            <td><h4><span class="badge badge-warning">Progress</span></h4></td>
                                            @else
                                            <td><h4><span class="badge badge-success">Success</span></h4></td>
                                            @endif
                                            <td>{{ $prbr->tgl_kirim}}</td>
                                            <td>{{ $prbr->tgl_terima}}</td>
                                            <td>{{ $prbr->no_resi}}</td>
                                            <td>{{ $prbr->toko->nama_toko}}</td>
                                            <td>{{ $prbr->user->nama}}</td>
                                            <td>{{ $prbr->ekspedisi}}</td>
                                            <td>{{ $prbr->total_item}}</td>
                                            <td>Rp. {{ number_format($prbr->total_nilai, 0, '.', '.') }}</td>
                                            <td>{{ $prbr->tokos->nama_toko}}</td>
                                            <td>
                                                <form onsubmit="return confirm('Ingin menghapus Kostum ini ? ?');" action="#">
                                                    <a href="{{ route('master.pengirimanbarang.edit', $prbr->id)}}" class="btn btn-warning btn-sm"><i class="ti-pencil menu-icon"></i></a>
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

        <!-- Footer -->
        @endsection
</body>
</html>
