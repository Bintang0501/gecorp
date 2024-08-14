<!doctype html>
<html class="no-js" lang="">

<title>Tambah Data Pengiriman Barang - Gecorp</title>

@include('layout.source')

<body>
{{-- Sidebar --}}
@include('layout.sidebar')
{{-- end Sidebar --}}

<!-- Right Panel -->
<div id="right-panel" class="right-panel">

@include('layout.header')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header">
                    <div class="page-title">
                        <h1 class="card-title"><strong>Tambah Data - Pengiriman Barang</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('master.index')}}">Dashboard</a></li>
                            <li><a href="{{ route('transaksi.pembelianbarang.index')}}">Data Pengiriman Barang</a></li>
                            <li class="active">Tambah Data Pengiriman Barang</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('transaksi.pengirimanbarang.index')}}" class="btn btn-danger"></i> Kembali</a>
                            </div>
                            <div class="card-body">
                                {{-- Content --}}
                                <div class="card-body card-block">
                                    <form action="#" method="post" class="">

                                        <div class="form-group">
                                            <label for="nama_pengirim" class=" form-control-label">Nama Pengirim<span style="color: red">*</span></label>
                                            <input type="text" id="nama_pengirim" name="nama_pengirim" placeholder="Contoh : Supplier 1" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="toko_pengirim" class=" form-control-label">Toko Pengirim<span style="color: red">*</span></label>
                                            <input type="text" id="toko_pengirim" name="toko_pengirim" placeholder="Contoh : TB JAYA ABADI" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_penerima" class=" form-control-label">Nama Penerima<span style="color: red">*</span></label>
                                            <input type="text" id="nama_penerima" name="nama_penerima" placeholder="Contoh : Supplier 2" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="toko_penerima" class=" form-control-label">Toko Penerima<span style="color: red">*</span></label>
                                            <input type="text" id="toko_penerima" name="toko_penerima" placeholder="Contoh : Toko Buku" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="ekspedisi" class=" form-control-label">Ekspedisi<span style="color: red">*</span></label>
                                            <input type="text" id="ekspedisi" name="ekspedisi" placeholder="Contoh : J&E" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="harga" class=" form-control-label">Harga<span style="color: red">*</span></label>
                                            <input type="number" id="harga" name="harga" placeholder="Contoh : 8000000" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="item" class=" form-control-label">Item<span style="color: red">*</span></label>
                                            <input type="number" id="item" name="item" placeholder="Contoh : 8000000" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_kirim" class=" form-control-label">Tanggal Kirim<span style="color: red">*</span></label>
                                            <input type="date" id="tgl_kirim" name="tgl_kirim" placeholder="DD/MM/YYYY" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_terima" class=" form-control-label">Tanggal Terima<span style="color: red">*</span></label>
                                            <input type="date" id="tgl_terima" name="tgl_terima" placeholder="DD/MM/YYYY" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="status" class=" form-control-label">Status</label>
                                                <select name="status" id="select" class="form-control">
                                                    <option value="Progress">Progress</option>
                                                    <option value="Done">Done</option>
                                                    <option value="Failed">Failed   </option>
                                                </select>
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
        <div class="clearfix"></div>
        <!-- Footer -->
    @include('layout.copyright')

        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    @include('layout.footerjs')
</body>
</html>
