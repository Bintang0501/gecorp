@extends('layouts.main')

@section('content')
<!-- Breadcrumb and Header -->
...

<!-- Form -->
<div class="content">
    <x-adminlte-alerts />
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('master.pembelianbarang.index')}}" class="btn btn-danger">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('master.pembelianbarang.update', $pembelian->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Form fields for supplier and store -->
                            <div class="form-group">
                                <label for="id_supplier" class="form-control-label">Nama Supplier</label>
                                <select name="id_supplier" class="form-control">
                                    <option selected>Pilih</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}" {{ $pembelian->id_supplier == $supplier->id ? 'selected' : '' }}>{{ $supplier->nama_supplier }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_toko" class="form-control-label">Nama Toko</label>
                                <select name="id_toko" class="form-control">
                                    <option selected>Pilih</option>
                                    @foreach($tokos as $toko)
                                        <option value="{{ $toko->id }}" {{ $pembelian->id_toko == $toko->id ? 'selected' : '' }}>{{ $toko->nama_toko }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Item container -->
                            <div id="item-container">
                                @foreach($pembelian->detail as $detail)
                                <input type="hidden" name="detail_ids[]" value="{{ $detail->id }}">
                                <div class="item-group">
                                    <!-- Nama Barang -->
                                    <div class="form-group">
                                        <label for="nama_barang" class="form-control-label">Nama Barang<span style="color: red">*</span></label>
                                        <input type="text" name="nama_barang[]" value="{{ $detail->nama_barang }}" class="form-control col-4">
                                    </div>

                                    <!-- Jenis Barang -->
                                    <div class="form-group">
                                        <label for="id_jenis_barang" class="form-control-label">Jenis Barang</label>
                                        <select name="id_jenis_barang[]" class="form-control col-4">
                                            <option selected>Pilih</option>
                                            @foreach($jenisBarang as $jenis)
                                                <option value="{{ $jenis->id }}" {{ $detail->id_jenis_barang == $jenis->id ? 'selected' : '' }}>{{ $jenis->nama_jenis_barang }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Brand Barang -->
                                    <div class="form-group">
                                        <label for="id_brand" class="form-control-label">Brand Barang</label>
                                        <select name="id_brand[]" class="form-control col-4">
                                            <option selected>Pilih</option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}" {{ $detail->id_brand == $brand->id ? 'selected' : '' }}>{{ $brand->nama_brand }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Harga Barang -->
                                    <div class="form-group">
                                        <label for="harga_barang" class="form-control-label">Harga Barang<span style="color: red">*</span></label>
                                        <input type="number" name="harga_barang[]" min="1" value="{{ $detail->harga_barang }}" class="form-control col-4 harga-barang">
                                    </div>

                                    <!-- Jumlah Item -->
                                    <div class="form-group">
                                        <label for="qty" class="form-control-label">Jumlah Item<span style="color: red">*</span></label>
                                        <input type="number" name="qty[]" min="1" value="{{ $detail->qty }}" class="form-control col-4 jumlah-item">
                                    </div>

                                    <!-- Status Barang -->
                                    <div class="form-group">
                                        <label for="status_detail" class="form-control-label">Status Barang</label>
                                        <select name="status_detail[]" class="form-control">
                                            <option value="progress" {{ $detail->status == 'progress' ? 'selected' : '' }}>Progress</option>
                                            <option value="done" {{ $detail->status == 'done' ? 'selected' : '' }}>Done</option>
                                            <option value="failed" {{ $detail->status == 'failed' ? 'selected' : '' }}>Failed</option>
                                            <option value="refund" {{ $detail->status == 'refund' ? 'selected' : '' }}>Refund</option>
                                            <option value="resend" {{ $detail->status == 'resend' ? 'selected' : '' }}>Resend</option>
                                        </select>
                                    </div>

                                    <!-- Remove Button -->
                                    <button type="button" class="btn btn-danger remove-item">Hapus</button>
                                </div>
                                @endforeach
                            </div>
                            <button type="button" id="reset-item" class="btn btn-secondary" style="display:none;">Reset</button>
                            <br><br>

                            <!-- Total Fields -->
                            <div class="form-group">
                                <label for="total_item" class="form-control-label">Total Item<span style="color: red">*</span></label>
                                <input type="text" id="total_item" name="total_item" value="{{ $pembelian->total_item }}" class="form-control col-4" readonly>
                            </div>

                            <div class="form-group">
                                <label for="total_harga" class="form-control-label">Total Harga<span style="color: red">*</span></label>
                                <input type="text" id="total_harga" name="total_harga" value="{{ $pembelian->total_harga }}" class="form-control col-4" readonly>
                            </div>

                            <!-- Status of the Main Transaction -->
                            <div class="form-group">
                                <label for="status" class="form-control-label">Status Transaksi</label>
                                <select name="status" class="form-control">
                                    <option value="progress" {{ $pembelian->status == 'progress' ? 'selected' : '' }}>Progress</option>
                                    <option value="done" {{ $pembelian->status == 'done' ? 'selected' : '' }}>Done</option>
                                    <option value="failed" {{ $pembelian->status == 'failed' ? 'selected' : '' }}>Failed</option>
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let lastRemovedItem = null;

    function attachEventListeners() {
        document.querySelectorAll('.remove-item').forEach(function(button) {
            button.addEventListener('click', function () {
                lastRemovedItem = this.parentElement.cloneNode(true);
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

    function toggleResetButton() {
        if (lastRemovedItem) {
            document.getElementById('reset-item').style.display = 'inline-block';
        } else {
            document.getElementById('reset-item').style.display = 'none';
        }
    }

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

    function resetDeletedItem() {
        if (lastRemovedItem) {
            document.getElementById('item-container').appendChild(lastRemovedItem);
            lastRemovedItem = null;
            toggleResetButton();
            attachEventListeners();
            updateRemoveButtons();
            calculateTotals();
        }
    }

    // Event Listeners
    document.addEventListener('DOMContentLoaded', function() {
        attachEventListeners();
        updateRemoveButtons();
        calculateTotals();
        document.getElementById('reset-item').addEventListener('click', resetDeletedItem);
    });
</script>
@endsection
