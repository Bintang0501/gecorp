<!doctype html>
<html class="no-js" lang="">

<title>Edit Data Brand - Gecorp</title>

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
                        <h1 class="card-title"><strong>Edit Data Brand</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('master.index')}}">Dashboard</a></li>
                            <li><a href="{{ route('master.brand.index')}}">Data Brand</a></li>
                            <li class="active">Edit Data Brand</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content -->
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('master.brand.index')}}" class="btn btn-danger"><i class="ti-arrow-left menu-icon"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('master.brand.update', $brand->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama_brand" class=" form-control-label">Nama Brand<span style="color: red">*</span></label>
                                <input type="text" id="nama_brand" name="nama_brand" value="{{ old('nama_brand', $brand->nama_brand) }}" placeholder="Contoh : Bearbrand" class="form-control">
                            </div>
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            </div>
                        </form>
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
