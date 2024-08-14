<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pembelian Barang - Gecorp</title>
    @include('layout.source')
</head>
<body>
    @include('layout.sidebar')
    <div id="right-panel" class="right-panel">
        @include('layout.header')
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header">
                            <div class="page-title">
                                <h1 class="card-title"><strong>Edit Data - Pembelian Barang</strong></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{ route('master.index')}}">Dashboard</a></li>
                                    <li><a href="{{ route('master.pembelianbarang.index')}}">Data Pembelian Barang</a></li>
                                    <li class="active">Edit Data Pembelian Barang</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('master.pembelianbarang.index')}}" class="btn btn-danger">Kembali</a>
                            </div>
                            <div class="card-body">
                                <div class="card-body card-block">
                                    <form action="{{ route('master.pembelianbarang.update', $pembelian->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label for="id_supplier" class="form-control-label">Nama Supplier</label>
                                            <select name="id_supplier" id="select" class="form-control">
                                                <option selected>pilih</option>
                                                <option value="1" {{ $pembelian->id_supplier == 1 ? 'selected' : '' }}>Deni</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_toko" class="form-control-label">Nama Toko</label>
                                            <select name="id_toko" id="select" class="form-control">
                                                <option selected>pilih</option>
                                                <option value="1" {{ $pembelian->id_toko == 1 ? 'selected' : '' }}>GEC</option>
                                            </select>
                                        </div>

                                        <div id="item-container">
                                            @foreach($pembelian->detail as $detail)
                                            <input type="hidden" name="detail_ids[]" value="{{ $detail->id }}">
                                            <div class="item-group">
                                                <div class="form-group">
                                                    <label for="nama_barang" class="form-control-label">Nama Barang<span style="color: red">*</span></label>
                                                    <input type="text" id="nama_barang" name="nama_barang[]" value="{{ $detail->nama_barang }}" class="form-control col-4">
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenis_barang" class="form-control-label">Jenis Barang</label>
                                                    <select name="id_jenis_barang[]" id="select" class="form-control col-4">
                                                        <option selected>pilih</option>
                                                        <option value="1" {{ $detail->id_jenis_barang == 1 ? 'selected' : '' }}>Spareparts</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="brand" class="form-control-label">Brand Barang</label>
                                                    <select name="id_brand[]" id="select" class="form-control col-4">
                                                        <option selected>pilih</option>
                                                        <option value="1" {{ $detail->id_brand == 1 ? 'selected' : '' }}>Milkita</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="harga_barang" class="form-control-label">Harga Barang<span style="color: red">*</span></label>
                                                    <input type="number" id="harga_barang" min="1" name="harga_barang[]" value="{{ $detail->harga_barang }}" class="form-control col-4 harga-barang">
                                                </div>
                                                <div class="form-group">
                                                    <label for="jml_item" class="form-control-label">Jumlah Item<span style="color: red">*</span></label>
                                                    <input type="number" id="jml_item" min="1" name="qty[]" value="{{ $detail->qty }}" class="form-control col-4 jumlah-item">
                                                </div>
                                                <button type="button" class="btn btn-danger remove-item">Hapus</button>
                                            </div>
                                            @endforeach
                                        </div>
                                        <button type="button" id="add-item" class="btn btn-secondary">Add</button>
                                        <button type="button" id="reset-item" class="btn btn-secondary" style="display:none;">Reset</button>
                                        <br><br>
                                        <div class="form-group">
                                            <label for="total_item" class="form-control-label">Total Item<span style="color: red">*</span></label>
                                            <input type="text" id="total_item" name="total_item" value="{{ $pembelian->total_item }}" class="form-control col-4" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="total_harga" class="form-control-label">Total Harga<span style="color: red">*</span></label>
                                            <input type="text" id="total_harga" name="total_harga" value="{{ $pembelian->total_harga }}" class="form-control col-4" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="status" class="form-control-label">Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="progress" {{ $pembelian->status == 'progress' ? 'selected' : '' }}>Progress</option>
                                                <option value="done" {{ $pembelian->status == 'done' ? 'selected' : '' }}>Done</option>
                                                <option value="failed" {{ $pembelian->status == 'failed' ? 'selected' : '' }}>Failed</option>
                                            </select>
                                        </div>
                                        
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
        @include('layout.copyright')
    </div>

    @include('layout.footerjs')

    <script>
        function attachEventListeners() {
            document.querySelectorAll('.remove-item').forEach(function(button) {
                button.addEventListener('click', function () {
                    lastRemovedItem = this.parentElement.cloneNode(true); // Clone the item before removing
                    this.parentElement.remove();
                    calculateTotals();
                    updateRemoveButtons();
                    toggleResetButton();
                });
            });

            document.querySelectorAll('.jumlah-item, .harga-barang').forEach(function(input) {
                input.addEventListener('input', calculateTotals);
            });
        }

        let lastRemovedItem = null;

        document.getElementById('reset-item').addEventListener('click', function () {
            if (lastRemovedItem) {
                document.getElementById('item-container').appendChild(lastRemovedItem);
                lastRemovedItem.querySelector('.remove-item').addEventListener('click', function () {
                    lastRemovedItem = this.parentElement.cloneNode(true);
                    this.parentElement.remove();
                    calculateTotals();
                    updateRemoveButtons();
                    toggleResetButton();
                });

                // Attach event listeners for the reset item
                lastRemovedItem.querySelectorAll('.jumlah-item, .harga-barang').forEach(function(input) {
                    input.addEventListener('input', calculateTotals);
                });

                lastRemovedItem = null;
                calculateTotals();
                updateRemoveButtons();
                toggleResetButton();
            }
        });

        function toggleResetButton() {
            if (lastRemovedItem) {
                document.getElementById('reset-item').style.display = 'inline-block';
            } else {
                document.getElementById('reset-item').style.display = 'none';
            }
        }

        // Initial toggle check
        toggleResetButton();

        function updateRemoveButtons() {
            const itemGroups = document.querySelectorAll('.item-group');
            itemGroups.forEach(function(group) {
                const removeButton = group.querySelector('.remove-item');
                if (itemGroups.length > 1) {
                    removeButton.style.display = 'inline-block';
                } else {
                    removeButton.style.display = 'none';
                }
            });
        }

        function calculateTotals() {
            let totalItem = 0;
            let totalHarga = 0;

            document.querySelectorAll('.item-group').forEach(function(group) {
                const qty = group.querySelector('.jumlah-item').value;
                const harga = group.querySelector('.harga-barang').value;
                totalItem += parseInt(qty) || 0;
                totalHarga += (parseInt(qty) || 0) * (parseInt(harga) || 0);
            });

            document.getElementById('total_item').value = totalItem;
            document.getElementById('total_harga').value = totalHarga;
        }

        // Update totals initially
        calculateTotals();
        attachEventListeners();

        document.getElementById('add-item').addEventListener('click', function() {
            const newItem = document.createElement('div');
            newItem.classList.add('item-group');
            newItem.innerHTML = `
                <div class="form-group">
                    <label for="nama_barang" class="form-control-label">Nama Barang<span style="color: red">*</span></label>
                    <input type="text" id="nama_barang" name="nama_barang[]" class="form-control col-4">
                </div>
                <div class="form-group">
                    <label for="jenis_barang" class="form-control-label">Jenis Barang</label>
                    <select name="id_jenis_barang[]" id="select" class="form-control col-4">
                        <option selected>pilih</option>
                        <option value="1">Spareparts</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="brand" class="form-control-label">Brand Barang</label>
                    <select name="id_brand[]" id="select" class="form-control col-4">
                        <option selected>pilih</option>
                        <option value="1">Milkita</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="harga_barang" class="form-control-label">Harga Barang<span style="color: red">*</span></label>
                    <input type="number" id="harga_barang" min="1" name="harga_barang[]" class="form-control col-4 harga-barang">
                </div>
                <div class="form-group">
                    <label for="jml_item" class="form-control-label">Jumlah Item<span style="color: red">*</span></label>
                    <input type="number" id="jml_item" min="1" name="qty[]" class="form-control col-4 jumlah-item">
                </div>
                <button type="button" class="btn btn-danger remove-item">Hapus</button>
            `;

            document.getElementById('item-container').appendChild(newItem);

            // Attach event listeners to new elements
            attachEventListeners();
            calculateTotals();
            updateRemoveButtons();
            toggleResetButton();
        });
    </script>
</body>
</html>
