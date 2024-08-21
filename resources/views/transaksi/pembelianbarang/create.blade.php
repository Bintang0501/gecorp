@extends('layouts.main')

@section('content')

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
                            <li><a href="{{ route('master.index')}}">Dashboard</a></li>
                            <li><a href="{{ route('master.pembelianbarang.index')}}">Data Pembelian Barang</a></li>
                            <li class="active">Tambah Data Pembelian Barang</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="content">
        <x-adminlte-alerts />
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('master.pembelianbarang.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                        <div class="card-body">
                            <div class="custom-tab">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true">Tambah Pembelian</a>
                                        <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="false">Detail Pembelian</a>
                                        {{-- <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-contact" role="tab" aria-controls="custom-nav-contact" aria-selected="false">Contact</a> --}}
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                        <br>
                                        <form action="{{ route('master.pembelianbarang.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" id="tgl_beli" name="tgl_beli" value="{{ now()->format('Y-m-d H:i:s') }}">

                                            <div class="row">
                                                <div class="col-6">
                                                    <!-- Nama Supplier -->
                                                    <div class="form-group">
                                                        <label for="id_supplier" class="form-control-label">Nama Supplier</label>
                                                        <select name="id_supplier" id="id_supplier" class="form-control">
                                                            <option value="" selected>Pilih Supplier</option>
                                                            @foreach($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <label for="id_supplier" class="form-control-label">Tanggal Nota</label>
                                                    <input class="form-control" type="date" name="tgl_nota" id="tgl_nota">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="no_nota" class=" form-control-label">Nomor Nota<span style="color: red">*</span></label>
                                                <input type="text" id="no_nota" name="no_nota" placeholder="Contoh : 001" class="form-control">
                                            </div>
                                        </form>

                                        <a href="#" type="button" id="add-item" style="float: right" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</a>

                                    </div>
                                    <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                        <br>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <h5><i class="fa fa-home"></i> Nomor Nota <span class="badge badge-secondary pull-right">#</span></h5
                                            </li>
                                            <li class="list-group-item">
                                                <h5><i class="fa fa-globe"></i> Nama Supplier <span class="badge badge-secondary pull-right">#</span></h5
                                            </li>
                                            <li class="list-group-item">
                                                <h5><i class="fa fa-map-marker"></i> &nbsp;Tanggal Nota <span class="badge badge-secondary pull-right">#</span></h3
                                            </li>
                                        </ul>
                                        {{-- <div class="col-6">
                                            <!-- Nama Toko -->
                                            <div class="form-group">
                                                <label for="id_toko" class="form-control-label">Nama Toko</label>
                                                <select name="id_toko" id="id_toko" class="form-control">
                                                    <option value="" selected>Pilih Toko</option>
                                                    @foreach($tokos as $toko)
                                                        <option value="{{ $toko->id }}">{{ $toko->nama_toko }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}
                                    <br>
                                    <!-- Item Container -->
                                    <div id="item-container">
                                        <div class="item-group">
                                            <div class="row">
                                                <div class="col-12">
                                                    <!-- Jenis Barang -->
                                                    <div class="form-group">
                                                        <label for="id_barang" class="form-control-label">Nama Barang<span style="color: red">*</span></label>
                                                        <select name="id_barang[]" id="id_barang"  data-placeholder="Pilih Barang..." class="standardSelect">
                                                            <option value="" selected >Pilih Barang</option>
                                                        @foreach($barang as $brg)
                                                                <option value="{{ $brg->id }}">{{ $brg->nama_barang }}</option>
                                                            @endforeach
                                                        </select>
                                                        <label class=" form-control-label">Barang Baru ?</label>
                                                        &nbsp;&nbsp;<input type="checkbox" id="checkbox1" name="checkbox1" value="option1"> Ya
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <!-- Jumlah Item -->
                                                    <div class="form-group">
                                                        <label for="jml_item" class="form-control-label">Jumlah Item<span style="color: red">*</span></label>
                                                        <input type="number" id="jml_item" min="1" name="qty[]" placeholder="Contoh: 16" class="form-control jumlah-item">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <!-- Harga Barang -->
                                                    <div class="form-group">
                                                        <label for="harga_barang" class="form-control-label">Harga Barang<span style="color: red">*</span></label>
                                                        <input type="number" id="harga_barang" min="1" name="harga_barang[]" placeholder="Contoh: 16000" class="form-control harga-barang">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" id="add-item" style="float: right" class="btn btn-secondary">Add</button>
                                    <br><br>
                                </form>
                                <div class="row">
                                    <div class="col-8">
                                        <!-- Jumlah Item -->
                                        <div class="card border border-primary">
                                            <div class="card-body">
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <p class="card-text">Hpp Awal <strong>Tes</strong> Hpp Baru <strong>Tes</strong></p>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-4">
                                        <!-- Harga Barang -->
                                        <div>
                                            <form action="#" method="post" class="">
                                                @foreach ($LevelHarga as $level)
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">{{ $level->nama_level_harga }}</div>
                                                        <input type="text" class="form-control">
                                                        <div class="input-group-addon">7.8%</div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                        <div class="row">
                                            <div class="col-12">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>action</th>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Nama Barang</th>
                                                            <th scope="col">Qty</th>
                                                            <th scope="col">Harga</th>
                                                            <th scope="col">Total Harga</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><a href=""><i class="fa fa-trash-o"></i></a></td>
                                                            <td>1</td>
                                                            <td>Lampu</td>
                                                            <td>4</td>
                                                            <td>Rp 10.000</td>
                                                            <td>Rp 40.000</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5" style='text-align:right'>SubTotal</td>
                                                            <td>Rp 40.000</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!-- Submit Button -->
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-dot-circle-o"></i> Simpan
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-nav-contact" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                                        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, irure terry richardson ex sd. Alip placeat salvia cillum iphone. Seitan alip s cardigan american apparel, butcher voluptate nisi .</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <script>
        function calculateTotals() {
            let totalItem = 0;
            let totalHarga = 0;
            let hppAwal = 0;
            let hppBaru = 0;

            document.querySelectorAll('.item-group').forEach(function(group) {
                const qty = group.querySelector('.jumlah-item').value || 0;
                const harga = group.querySelector('.harga-barang').value || 0;
                const harga = group.querySelector('.hpp_awal').value || 0;
                const harga = group.querySelector('.hpp_baru').value || 0;

                totalItem += parseInt(qty);
                totalHarga += parseInt(harga) * parseInt(qty);
                hppAwal += parseInt(harga);
                hppBaru += parseInt(harga) / parseInt(qty);

            });

            document.getElementById('total_item').value = totalItem;
            document.getElementById('total_harga').value = totalHarga;
            document.getElementById('hpp_awal').value = hppAwal;
            document.getElementById('hpp_baru').value = hppBaru;
        }

        document.getElementById('add-item').addEventListener('click', function () {
            var itemContainer = document.getElementById('item-container');
            var newItemGroup = document.createElement('div');
            newItemGroup.className = 'item-group';

            newItemGroup.innerHTML = ;

            itemContainer.appendChild(newItemGroup);

            // Attach event listener to remove button
            newItemGroup.querySelector('.remove-item').addEventListener('click', function () {
                newItemGroup.remove();
                calculateTotals();
            });

            // Attach change listeners to newly added fields
            newItemGroup.querySelector('.jumlah-item').addEventListener('input', calculateTotals);
            newItemGroup.querySelector('.harga-barang').addEventListener('input', calculateTotals);

            calculateTotals();
        });

        // Attach change listeners to default items
        document.querySelectorAll('.jumlah-item').forEach(function(element) {
            element.addEventListener('input', calculateTotals);
        });

        document.querySelectorAll('.harga-barang').forEach(function(element) {
            element.addEventListener('input', calculateTotals);
        });

        calculateTotals();
    </script>

@endsection
