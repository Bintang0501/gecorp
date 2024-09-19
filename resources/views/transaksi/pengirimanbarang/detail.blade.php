<title>Detail Pengiriman Barang - Gecorp</title>

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header">
                    <div class="page-title">
                        <h1 class="card-title"><strong>Detail - Pengiriman Barang</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('master.index')}}">Dashboard</a></li>
                            <li class="active">Detail Pengiriman Barang</li>
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
                                <a href="{{ route('master.pengirimanbarang.index') }}" class="btn btn-danger">Kembali</a>
                                  {{-- <a href="{{ route('master.pengirimanbarang.create')}}" class="btn btn-primary"><i class="ti-plus menu-icon"></i> Tambah</a> --}}
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        @if ($pengiriman_barang)
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <h4><i class="fa fa-home"></i> Nomor Resi <span class="badge badge-secondary pull-right">{{ $pengiriman_barang->no_resi }}</span></h4>
                                            </li>
                                            <li class="list-group-item">
                                                <h4><i class="fa fa-globe"></i> Toko Pengirim <span class="badge badge-secondary pull-right">{{ $pengiriman_barang->toko->nama_toko }}</span></h4>
                                            </li>
                                            <li class="list-group-item">
                                                <h4><i class="fa fa-globe"></i> Nama Pengirim <span class="badge badge-secondary pull-right">{{ $pengiriman_barang->user->nama }}</span></h4>
                                            </li>
                                            <li class="list-group-item">
                                                <h4><i class="fa fa-globe"></i> Ekspedisi <span class="badge badge-secondary pull-right">{{ $pengiriman_barang->ekspedisi }}</span></h4>
                                            </li>
                                            <li class="list-group-item">
                                                <h4><i class="fa fa-globe"></i> Toko Penerima <span class="badge badge-secondary pull-right">{{ $pengiriman_barang->tokos->nama_toko }}</span></h4>
                                            </li>
                                            <li class="list-group-item">
                                                <h4><i class="fa fa-map-marker"></i> &nbsp;Tanggal Kirim <span class="badge badge-secondary pull-right">{{ $pengiriman_barang->tgl_kirim }}</span></h4>
                                            </li>
                                        </ul>
                                        <br>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th>Status</th>
                                                    <th scope="col">Nama Barang</th>
                                                    <th scope="col">Qty</th>
                                                    <th scope="col">Harga</th>
                                                    <th scope="col">Total Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        @forelse ($detail_pengiriman as $dtpr)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            @if ($dtpr->status == 'failed')
                                                <td><h4><span class="badge badge-danger">Failed</span></h4></td>
                                            @elseif ($dtpr->status == 'progress')
                                            <td><h4><span class="badge badge-warning">Progress</span></h4></td>
                                            @else
                                            <td><h4><span class="badge badge-success">Success</span></h4></td>
                                            @endif
                                            <td>{{ $dtpr->nama_barang}}</td>
                                            <td>{{ $dtpr->qty}}</td>
                                            <td>Rp. {{ number_format($dtpr->harga, 0, '.', '.') }}</td>
                                            <td>Rp. {{ number_format($dtpr->total_harga, 0, '.', '.')}}</td>
                                            {{-- <td>{{ $dtpr->toko->nama_toko}}</td>
                                            <td>{{ $dtpr->user->nama}}</td>
                                            <td>{{ $dtpr->ekspedisi}}</td>
                                            <td>{{ $dtpr->total_item}}</td>
                                            <td>Rp. {{ number_format($dtpr->total_nilai, 0, '.', '.') }}</td>
                                            <td>{{ $dtpr->tokos->nama_toko}}</td>
                                            <td>
                                                <form onsubmit="return confirm('Ingin menghapus Kostum ini ? ?');" action="#">
                                                    <a href="{{ route('master.pengirimanbarang.edit', $dtpr->id)}}" class="btn btn-warning btn-sm"><i class="ti-pencil menu-icon"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="ti-trash menu-icon"></i></button>
                                                </form>
                                            </td> --}}
                                        </tr>
                                        @empty

                                        @endforelse
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th scope="col" colspan="5" style="text-align:right">SubTotal</th>
                                                    <th scope="col">Rp. {{ number_format($pengiriman_barang->total_nilai, 0, '.', '.')}}</th>
                                                </tr>

                                            </tfoot>
                                        </table>
                                        <!-- Submit Button -->

                                    </div>
                                    @else
                                    <div class="alert alert-warning">
                                        <strong>Perhatian!</strong> Anda perlu menambahkan data pengiriman di tab "Tambah Pengiriman" terlebih dahulu.
                                    </div>
                                    @endif
                                    <div class="tab-pane fade" id="custom-nav-contact" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                                        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, irure terry richardson ex sd. Alip placeat salvia cillum iphone. Seitan alip s cardigan american apparel, butcher voluptate nisi .</p>
                                    </div>
                                </div>
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
