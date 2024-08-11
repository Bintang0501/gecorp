<!doctype html>
<html class="no-js" lang="">

<title>Data Karyawan - Gecorp</title>

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
                        <h1 class="card-title"><strong>Data Master - Karyawan</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('dashboard')}}">Dashboard</a></li>
                            <li class="active">Data Karyawan</li>
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
                                <a href="#" class="btn btn-primary"><i class="ti-plus menu-icon"></i> Tambah</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Karyawan</th>
                                            <th>Email</th>
                                            <th>Toko</th>
                                            <th>Area</th>
                                            <th>Level</th>
                                            <th>Alamat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Asep Kopling</td>
                                            <td>kontolasep@gmail.com</td>
                                            <td>ASEP TAMBAL BAN</td>
                                            <td>Area 51</td>
                                            <td>Kasir</td>
                                            <td>Jakarta Pusat</td>
                                            <td>
                                                <form onsubmit="return confirm('Ingin menghapus Kostum ini ? ?');" action="#">
                                                    <a href="#" class="btn btn-warning btn-sm"><i class="ti-pencil menu-icon"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="ti-trash menu-icon"></i></button>
                                                </form>
                                            </td>
                                        </tr>
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
    @include('layout.copyright')

        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    @include('layout.footerjs')
</body>
</html>
