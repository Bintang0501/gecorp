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
                            <div class="card-body card-block">
                                <form action="{{ route('master.pembelianbarang.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" id="tgl_nota" name="tgl_nota" value="{{ now()->format('Y-m-d H:i:s') }}">
                                    <input type="hidden" id="tgl_beli" name="tgl_beli" value="{{ now()->format('Y-m-d H:i:s') }}">

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

                                    <!-- Item Container -->
                                    <div id="item-container">
                                        <div class="item-group">
                                            <!-- Nama Barang -->
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
                                        </div>
                                    </div>

                                    <button type="button" id="add-item" class="btn btn-secondary">Add</button>
                                    <br><br>

                                    <!-- Total Item -->
                                    <div class="form-group">
                                        <label for="total_item" class="form-control-label">Total Item<span style="color: red">*</span></label>
                                        <input type="text" id="total_item" name="total_item" class="form-control col-4" readonly>
                                    </div>

                                    <!-- Total Harga -->
                                    <div class="form-group">
                                        <label for="total_harga" class="form-control-label">Total Harga<span style="color: red">*</span></label>
                                        <input type="text" id="total_harga" name="total_harga" class="form-control col-4" readonly>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-dot-circle-o"></i> Simpan
                                        </button>
                                    </div>
                                </form>
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
