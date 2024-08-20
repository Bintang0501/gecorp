@extends('layouts.main')

@section('content')

    <div class="breadcrumbs">
        <!-- Breadcrumbs Content -->
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
                                        <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true">Tambah</a>
                                        <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="false">Detail</a>
                                        {{-- <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-contact" role="tab" aria-controls="custom-nav-contact" aria-selected="false">Contact</a> --}}
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                        <br>
                                        <form action="{{ route('master.pembelianbarang.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" id="tgl_nota" name="tgl_nota" value="{{ now()->format('Y-m-d H:i:s') }}">
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
                                                </div>
                                            </div>

                                            <!-- Item Container -->
                                            <div id="item-container">
                                                <div class="item-group">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <!-- Nama Barang -->
                                                            <div class="form-group">
                                                                <label for="nama_barang" class="form-control-label">Nama Barang<span style="color: red">*</span></label>
                                                                <input type="text" id="nama_barang" name="nama_barang[]" placeholder="Contoh: Tws Bluetooth" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <!-- Jenis Barang -->
                                                            <div class="form-group">
                                                                <label for="id_jenis_barang" class="form-control-label">Jenis Barang</label>
                                                                <select name="id_jenis_barang[]" id="id_jenis_barang" class="form-control">
                                                                    <option value="" selected>Pilih Jenis Barang</option>
                                                                    @foreach($jenisBarangs as $jenis)
                                                                        <option value="{{ $jenis->id }}">{{ $jenis->nama_jenis_barang }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <!-- Brand Barang -->
                                                            <div class="form-group">
                                                                <label for="id_brand" class="form-control-label">Brand Barang</label>
                                                                <select name="id_brand[]" id="id_brand" class="form-control">
                                                                    <option value="" selected>Pilih Brand Barang</option>
                                                                    @foreach($brands as $brand)
                                                                        <option value="{{ $brand->id }}">{{ $brand->nama_brand }}</option>
                                                                    @endforeach
                                                                </select>
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

                                            <div class="row">
                                                <div class="col-6">
                                                    <!-- Total Item -->
                                                    <div class="form-group">
                                                        <label for="total_item" class="form-control-label">Total Item<span style="color: red">*</span></label>
                                                        <input type="text" id="total_item" name="total_item" class="form-control" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <!-- Total Harga -->
                                                    <div class="form-group">
                                                        <label for="total_harga" class="form-control-label">Total Harga<span style="color: red">*</span></label>
                                                        <input type="text" id="total_harga" name="total_harga" class="form-control" readonly>
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
                                                        <p class="card-text">KONTOL <strong>MEMEK</strong> ASU <strong>JEMBUT</strong></p>
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


                                    </div>
                                    <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
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

            document.querySelectorAll('.item-group').forEach(function(group) {
                const qty = group.querySelector('.jumlah-item').value || 0;
                const harga = group.querySelector('.harga-barang').value || 0;

                totalItem += parseInt(qty);
                totalHarga += parseInt(harga) * parseInt(qty);
            });

            document.getElementById('total_item').value = totalItem;
            document.getElementById('total_harga').value = totalHarga;
        }

        document.getElementById('add-item').addEventListener('click', function () {
            var itemContainer = document.getElementById('item-container');
            var newItemGroup = document.createElement('div');
            newItemGroup.className = 'item-group';

            newItemGroup.innerHTML = `
                <div class="form-group">
                    <label for="nama_barang" class="form-control-label">Nama Barang<span style="color: red">*</span></label>
                    <input type="text" id="nama_barang" name="nama_barang[]" placeholder="Contoh: Tws Bluetooth" class="form-control col-4">
                </div>

                <!-- Jenis Barang -->
                <div class="form-group">
                    <label for="id_jenis_barang" class="form-control-label">Jenis Barang</label>
                    <select name="id_jenis_barang[]" id="id_jenis_barang" class="form-control col-4">
                        <option value="" selected>Pilih Jenis Barang</option>
                        @foreach($jenisBarangs as $jenis)
                            <option value="{{ $jenis->id }}">{{ $jenis->nama_jenis_barang }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Brand Barang -->
                <div class="form-group">
                    <label for="id_brand" class="form-control-label">Brand Barang</label>
                    <select name="id_brand[]" id="id_brand" class="form-control col-4">
                        <option value="" selected>Pilih Brand Barang</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->nama_brand }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Harga Barang -->
                <div class="form-group">
                    <label for="harga_barang" class="form-control-label">Harga Barang<span style="color: red">*</span></label>
                    <input type="number" id="harga_barang" min="1" name="harga_barang[]" placeholder="Contoh: 16000" class="form-control col-4 harga-barang">
                </div>

                <!-- Jumlah Item -->
                <div class="form-group">
                    <label for="jml_item" class="form-control-label">Jumlah Item<span style="color: red">*</span></label>
                    <input type="number" id="jml_item" min="1" name="qty[]" placeholder="Contoh: 16" class="form-control col-4 jumlah-item">
                </div>
                <button type="button" class="btn btn-danger remove-item">Hapus</button>
            `;

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
