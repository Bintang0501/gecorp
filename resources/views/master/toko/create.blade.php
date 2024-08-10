<!doctype html>
<html class="no-js" lang="">

<title>Data Toko - Gecorp</title>

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
                        <h1 class="card-title"><strong>Tambah Data Master - Toko</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('dashboard')}}">Dashboard</a></li>
                            <li><a href="{{ route('master.toko.index')}}">Data Toko</a></li>
                            <li class="active">Tambah Data Toko</li>
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
                                <a href="{{ route('master.toko.index')}}" class="btn btn-danger"></i> Kembali</a>
                            </div>
                            <div class="card-body">
                                {{-- Content --}}
                                <div class="card-body card-block">
                                    <form action="#" method="post" class="">

                                        <div class="form-group">
                                            <label for="id_barang" class=" form-control-label">Id Barang</label>
                                                <select name="id_barang" id="select" class="form-control">
                                                    <option value="1">Option #1</option>
                                                    <option value="2">Option #2</option>
                                                    <option value="3">Option #3</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_jenis_barang" class=" form-control-label">Id Jenis Barang</label>
                                                <select name="id_jenis_barang" id="select" class="form-control">
                                                    <option value="1">Option #1</option>
                                                    <option value="2">Option #2</option>
                                                    <option value="3">Option #3</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_brand" class=" form-control-label">Id Brand</label>
                                                <select name="id_brand" id="select" class="form-control">
                                                    <option value="1">Option #1</option>
                                                    <option value="2">Option #2</option>
                                                    <option value="3">Option #3</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_toko" class=" form-control-label">Nama Toko<span style="color: red">*</span></label>
                                            <input type="text" id="nama_toko" name="nama_toko" placeholder="Contoh : Toko Sejahtera" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="wilayah" class=" form-control-label">Wilayah<span style="color: red">*</span></label>
                                            <input type="text" id="wilayah" name="wilayah" placeholder="Contoh : Cirebon Timur" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="wilayah" class=" form-control-label">Alamat<span style="color: red">*</span></label>
                                            <textarea name="alamat" id="alamat" rows="4" placeholder="Contoh : Jl. Nyimas Gandasari No.18 Plered - Cirebon" class="form-control"></textarea>
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
                                            <label for="harga" class=" form-control-label">Harga<span style="color: red">*</span></label>
                                            <input type="number" id="harga" name="harga" placeholder="Contoh : 1000000" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="stock" class=" form-control-label">Stock<span style="color: red">*</span></label>
                                            <input type="number" id="stock" name="stock" placeholder="Contoh : 40" class="form-control">
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
