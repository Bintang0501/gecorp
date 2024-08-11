<!doctype html>
<html class="no-js" lang="">

<title>Tambah Data Level Harga - Gecorp</title>

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
                        <h1 class="card-title"><strong>Tambah Data - Level Harga</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('dashboard')}}">Dashboard</a></li>
                            <li><a href="{{ route('master.levelharga.index')}}">Data Level Harga</a></li>
                            <li class="active">Tambah Data Level Harga</li>
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
                                <a href="{{ route('master.levelharga.index')}}" class="btn btn-danger"></i> Kembali</a>
                            </div>
                            <div class="card-body">
                                {{-- Content --}}
                                <div class="card-body card-block">
                                    <form action="#" method="post" class="">

                                        <div class="form-group">
                                            <label for="id_barang" class=" form-control-label">Id Toko</label>
                                                <select name="id_barang" id="select" class="form-control">
                                                    <option value="1">Option #1</option>
                                                    <option value="2">Option #2</option>
                                                    <option value="3">Option #3</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_level_harga" class=" form-control-label">Nama Level Harga<span style="color: red">*</span></label>
                                            <input type="text" id="nama_level_harga" name="nama_level_harga" placeholder="Contoh : Level Harga" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_toko" class=" form-control-label">Nama Toko<span style="color: red">*</span></label>
                                            <input type="text" id="nama_toko" name="nama_toko" placeholder="Contoh : Bringas Sejahtera" class="form-control">
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
