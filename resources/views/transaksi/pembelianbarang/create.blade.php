<!doctype html>
<html class="no-js" lang="">

<title>Tambah Data Pembelian Barang - Gecorp</title>

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
                        <h1 class="card-title"><strong>Tambah Data - Pembelian Barang</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('dashboard')}}">Dashboard</a></li>
                            <li><a href="{{ route('transaksi.pembelianbarang.index')}}">Data Pembelian Barang</a></li>
                            <li class="active">Tambah Data Pembelian Barang</li>
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
                                <a href="{{ route('transaksi.pembelianbarang.index')}}" class="btn btn-danger"></i> Kembali</a>
                            </div>
                            <div class="card-body">
                                {{-- Content --}}
                                <div class="card-body card-block">
                                    <form action="#" method="post" class="">

                                        <div class="form-group">
                                            <label for="status" class=" form-control-label">Status</label>
                                                <select name="status" id="select" class="form-control">
                                                    <option value="Progress">Progress</option>
                                                    <option value="Done">Done</option>
                                                    <option value="Failed">Failed   </option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_supplier" class=" form-control-label">Id Supplier</label>
                                                <select name="id_supplier" id="select" class="form-control">
                                                    <option value="1">Option #1</option>
                                                    <option value="2">Option #2</option>
                                                    <option value="3">Option #3</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_toko" class=" form-control-label">Id Toko</label>
                                                <select name="id_toko" id="select" class="form-control">
                                                    <option value="1">Option #1</option>
                                                    <option value="2">Option #2</option>
                                                    <option value="3">Option #3</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_nota" class=" form-control-label">Tanggal Nota<span style="color: red">*</span></label>
                                            <input type="date" id="tgl_nota" name="tgl_nota" placeholder="DD/MM/YYYY" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_supplier" class=" form-control-label">Nama Supplier<span style="color: red">*</span></label>
                                            <input type="text" id="nama_supplier" name="nama_supplier" placeholder="Contoh : Supplier 1" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_barang" class=" form-control-label">Nama Barang<span style="color: red">*</span></label>
                                            <input type="text" id="nama_barang" name="nama_barang" placeholder="Contoh : Tws Bluetooth" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_barang" class=" form-control-label">Jenis Barang<span style="color: red">*</span></label>
                                            <input type="text" id="jenis_barang" name="jenis_barang" placeholder="Contoh : Aksesoris" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="brand_barang" class=" form-control-label">Brand Barang<span style="color: red">*</span></label>
                                            <input type="text" id="brand_barang" name="brand_barang" placeholder="Contoh : JBL" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="jml_item" class=" form-control-label">Jumlah Item<span style="color: red">*</span></label>
                                            <input type="number" id="jml_item" name="jml_item" placeholder="Contoh : 16" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_toko" class=" form-control-label">Nama Toko<span style="color: red">*</span></label>
                                            <input type="text" id="nama_toko" name="nama_toko" placeholder="Contoh : Toko Jaya Abadi" class="form-control">
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
