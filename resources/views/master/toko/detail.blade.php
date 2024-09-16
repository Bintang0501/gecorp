<title>Detail Toko - Gecorp</title>

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header">
                    <div class="page-title">
                    <h1 class="card-title"><strong>Detail - Toko</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('master.index')}}">Dashboard</a></li>
                            <li><a href="{{ route('master.toko.index')}}">Data Toko</a></li>
                        <li class="active">Detail Toko</li>
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
                            <div class="card-body col-md-12">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <h3><i class="fa fa-home"></i> Nama Toko <span class="badge badge-secondary pull-right">{{ old('nama_toko', $toko->nama_toko) }}</span></h3
                                    </li>
                                    <li class="list-group-item">
                                        <h3><i class="fa fa-globe"></i> Wilayah <span class="badge badge-secondary pull-right">{{ old('wilayah', $toko->wilayah) }}</span></h3
                                    </li>
                                    <li class="list-group-item">
                                        <h3><i class="fa fa-map-marker"></i> &nbsp;Alamat <span class="badge badge-secondary pull-right">{{ old('alamat', $toko->alamat) }}</span></h3
                                    </li>
                                </ul>
                                {{-- Content --}}
                                    <br>
                                        <a href="{{ route('master.toko.create_detail', ['id' => $toko->id]) }}" class="btn btn-primary"></i> Tambah Barang</a>
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
                                                <?php $no = 1; ?>

                                                @if($toko->id == 1)
                                                    @forelse ($stock as $stk)
                                                    <tr>
                                                        <td>{{$no++}}</td>
                                                        <td>{{$stk->nama_barang}}</td>
                                                        <td>{{$stk->stock}}</td>
                                                        <td>Rp. {{ number_format($stk->hpp_baru, 0, '.', '.') }}</td>
                                                        <td>
                                                            <form onsubmit="return confirm('Ingin menghapus Data ini ?');" action="#" method="post">
                                                                <a href="#" class="btn btn-warning btn-sm">
                                                                    <i class="ti-pencil menu-icon"></i>
                                                                </a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm"><i class="ti-trash menu-icon"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="6">Tidak ada data.</td>
                                                    </tr>
                                                    @endforelse
                                                @else
                                                    @forelse ($detail_toko as $dt)
                                                    <tr>
                                                        <td>{{$no++}}</td>
                                                        <td>{{$dt->barang->nama_barang}}</td>
                                                        <td>{{$dt->qty}}</td>
                                                        <td>Rp. {{ number_format($dt->harga, 0, ',', '.') }}</td>
                                                        <td>
                                                            <form onsubmit="return confirm('Ingin menghapus Data ini ?');" action="{{ route('master.toko.delete_detail', ['id_toko' => $dt->id_toko, 'id_barang' => $dt->id_barang, 'id' => $dt->id]) }}" method="post">
                                                                <a href="{{ route('master.toko.edit_detail', ['id_toko' => $dt->id_toko, 'id_barang' => $dt->id_barang, 'id' => $dt->id]) }}" class="btn btn-warning btn-sm">
                                                                    <i class="ti-pencil menu-icon"></i>
                                                                </a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm"><i class="ti-trash menu-icon"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @empty

                                                    @endforelse
                                                @endif
                                            </tbody>

                                        </table>
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
        <div class="clearfix"></div>
        <!-- Footer -->
@endsection
