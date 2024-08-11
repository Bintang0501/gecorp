<!doctype html>
<html class="no-js" lang="">

<title>Tambah Data Jenis Barang - Gecorp</title>

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
                        <h1 class="card-title"><strong>Tambah Data - Jenis Barang</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('dashboard')}}">Dashboard</a></li>
                            <li><a href="{{ route('master.jenisbarang.index')}}">Data Jenis Barang</a></li>
                            <li class="active">Tambah Data Jenis Barang</li>
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
                                <a href="{{ route('master.jenisbarang.index')}}" class="btn btn-danger"></i> Kembali</a>
                            </div>
                            <div class="card-body">
                                {{-- Content --}}
                                <div class="card-body card-block">
                                    <form action="#" method="post" class="">

                                        <div class="form-group">
                                            <label for="nama_jenis_barang" class=" form-control-label">Nama Jenis Barang<span style="color: red">*</span></label>
                                            <input type="text" id="nama_jenis_barang" name="nama_jenis_barang" placeholder="Contoh : Barang Kali" class="form-control">
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
