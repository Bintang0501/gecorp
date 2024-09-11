@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header">
                    <div class="page-title">
                        <h1 class="card-title"><strong>Tambah Data - Pengiriman Barang</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('master.index')}}">Dashboard</a></li>
                            <li><a href="{{ route('master.pengirimanbarang.index')}}">Data Pengiriman Barang</a></li>
                            <li class="active">Tambah Data Pengiriman Barang</li>
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
                            <a href="{{ route('master.pengirimanbarang.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                        <div class="card-body">
                            <div class="custom-tab">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link {{ session('tab') == 'detail' ? '' : 'active' }}" id="tambah-tab" data-toggle="tab" href="#tambah" role="tab" aria-controls="tambah" aria-selected="true" {{ session('tab') == 'detail' ? 'style=pointer-events:none;opacity:0.6;' : '' }}>Tambah Pengiriman</a>
                                        <a class="nav-item nav-link {{ session('tab') == 'detail' ? 'active' : '' }}" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="false" {{ session('tab') == '' ? 'style=pointer-events:none;opacity:0.6;' : '' }}>Detail Pengiriman</a>
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade show {{ session('tab') == 'detail' ? '' : 'active' }}" id="tambah" role="tabpanel" aria-labelledby="tambah-tab">
                                        <br>
                                        <form action="{{ route('master.pengirimanbarang.store') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <!-- Nama Supplier -->
                                                    <div class="form-group">
                                                        <label for="no_resi" class=" form-control-label">Nomor Resi<span style="color: red">*</span></label>
                                                        <input type="number" id="no_resi" name="no_resi" placeholder="Contoh : 001" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <label for="tgl_kirim" class="form-control-label">Tanggal Kirim</label>
                                                    <input class="form-control" type="date" name="tgl_kirim" id="tgl_kirim">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class=" form-control-label">Toko Pengirim<span
                                                        style="color: red">*</span></label>
                                                <select class="standardSelect" name="toko_pengirim" id="toko_pengirim" style="display: block;">
                                                    <option class="" required>~Pilih Nama Toko~</option>
                                                    @foreach ($toko as $tk)
                                                        <option value="{{ $tk->id }}">{{ $tk->nama_toko }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_pengirim" class=" form-control-label">Nama Pengirim (Admin Toko)<span style="color: red">*</span></label>
                                                <select name="nama_pengirim" class="form-control" id="nama_pengirim" data-placeholder="Choose a Country..." tabindex="1">
                                                    <option class="" required>~Pilih Toko Terlebih Dahulu~</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="ekspedisi" class=" form-control-label">Ekspedisi<span
                                                        style="color: red">*</span></label>
                                                <input type="text" id="ekspedisi" name="ekspedisi" placeholder="Contoh : Sicepat"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class=" form-control-label">Toko Penerima<span
                                                        style="color: red">*</span></label>
                                                <select class="standardSelect" name="toko_penerima" id="toko_penerima" style="display: block;">
                                                    <option class="" required>~Pilih Nama Toko~</option>
                                                    @foreach ($toko as $tk)
                                                        <option value="{{ $tk->id }}">{{ $tk->nama_toko }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <button type="submit" style="float: right" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade {{ session('tab') == 'detail' ? 'show active' : '' }}" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                                    <br>
                                    @php
                                        $pengiriman_barang = session('pengiriman_barang', $pengiriman_barang ?? null);
                                    @endphp

                                    @if ($pengiriman_barang)
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <h4><i class="fa fa-home"></i> Nomor Resi <span class="badge badge-secondary pull-right">{{ $pengiriman_barang->no_resi }}</span></h4>
                                            </li>
                                            <li class="list-group-item">
                                                <h4><i class="fa fa-globe"></i> Toko Pengirim <span class="badge badge-secondary pull-right">{{ $pengiriman_barang->toko->nama_toko }}</span></h4>
                                            </li>
                                            <li class="list-group-item">
                                                <h4><i class="fa fa-globe"></i> Nama Pengirim <span class="badge badge-secondary pull-right">{{ $pengiriman_barang->user->nama }}</span></h4>
                                            </li>
                                            <li class="list-group-item">
                                                <h4><i class="fa fa-globe"></i> Ekspedisi <span class="badge badge-secondary pull-right">{{ $pengiriman_barang->ekspedisi }}</span></h4>
                                            </li>
                                            <li class="list-group-item">
                                                <h4><i class="fa fa-globe"></i> Toko Penerima <span class="badge badge-secondary pull-right">{{ $pengiriman_barang->tokos->nama_toko }}</span></h4>
                                            </li>
                                            <li class="list-group-item">
                                                <h4><i class="fa fa-map-marker"></i> &nbsp;Tanggal Kirim <span class="badge badge-secondary pull-right">{{ $pengiriman_barang->tgl_kirim }}</span></h4>
                                            </li>
                                        </ul>
                                    <br>
                                    <form action="{{ route('master.pengirimanbarang.update', $pengiriman_barang->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <!-- Item Container -->
                                    <div id="item-container">
                                        <div class="item-group">
                                            <div class="row">
                                                <div class="col-12">
                                                    <!-- Jenis Barang -->
                                                        <p>ID Toko: {{ $pengiriman_barang->toko_pengirim }}</p>
                                                        <p>ID: {{ $pengiriman_barang->id }}</p>
                                                    <div class="form-group">
                                                        <label for="id_barang" class="form-control-label">Nama Barang<span style="color: red">*</span></label>
                                                        <select name="id_barang" id="id_barang" class="form-control" required>
                                                            <option value="" disabled selected>Pilih Barang</option>
                                                                @foreach ( $stock as $stk )
                                                                <option value="{{ $stk->id }}">{{ $stk->nama_barang }}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <!-- Jumlah Item -->
                                                    <div class="form-group">
                                                        <label for="harga" class="form-control-label">Harga per Barang<span style="color: red">*</span></label>
                                                        <input type="text" id="harga_formatted" readonly placeholder="0" class="form-control"> <!-- Menampilkan harga dengan format -->
                                                        <input type="hidden" id="harga" name="harga[]"> <!-- Harga asli yang akan dikirim ke database -->
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <!-- Harga Barang -->
                                                    <div class="form-group">
                                                        <label for="jml_item" class="form-control-label">Jumlah Item<span style="color: red">*</span></label>
                                                        <input type="number" id="jml_item" min="1" name="qty[]" placeholder="Contoh: 16" class="form-control jumlah-item">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <button type="button" id="add-item-detail" style="float: right" class="btn btn-secondary">Add</button>
                                <br><br>

                                <br>
                                    <div class="row">
                                        <div class="col-12">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Action</th>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Nama Barang</th>
                                                        <th scope="col">Qty</th>
                                                        <th scope="col">Harga</th>
                                                        <th scope="col">Total Harga</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Rows akan ditambahkan di sini oleh JavaScript -->
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th scope="col" colspan="5" style="text-align:right">SubTotal</th>
                                                        <th scope="col">Rp </th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <!-- Submit Button -->
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-dot-circle-o"></i> Simpan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                    @else
                                    <div class="alert alert-warning">
                                        <strong>Perhatian!</strong> Anda perlu menambahkan data pengiriman di tab "Tambah Pengiriman" terlebih dahulu.
                                    </div>
                                    @endif
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
        $(document).ready(function() {
            $('#toko_pengirim').change(function() {
                var idToko = $(this).val();
                if (idToko) {
                    $.ajax({
                        url: '/admin/get-users-by-toko/' + idToko,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            console.log('Data received:', data); // Log data untuk debugging
                            $('#nama_pengirim').empty();
                            $('#nama_pengirim').append('<option value="">~Pilih Nama Pengirim~</option>');
                            $.each(data, function(key, value) {
                                $('#nama_pengirim').append('<option value="' + value.id + '">' + value.nama + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            if (xhr.status === 404) {  // Jika tidak ditemukan user
                        $('#nama_pengirim').empty();
                        $('#nama_pengirim').append('<option value="">Toko Tidak ada Admin</option>');
                    } else {
                        console.error(xhr.responseText); // Log error lainnya
                    }
                }
            });
                } else {
                    $('#nama_pengirim').empty();
                    $('#nama_pengirim').append('<option value="">~Nama Pengirim Tidak Ditemukan~</option>');
                }
            });
        });
    </script>

{{-- Tampilkan Barang --}}
<script>
$(document).ready(function() {
    var id_toko = $('#toko_pengirim').val();

    // Ambil daftar barang dari stok berdasarkan id_toko
    $.ajax({
        url: '/admin/get-barang-stock/' + id_toko,
        method: 'GET',
        success: function(response) {
            var select = $('#id_barang');
            select.empty();
            select.append('<option value="" disabled selected>Pilih Barang</option>');

            // Iterasi hasil response untuk menambah option ke dalam select
            response.forEach(function(barangs) {
                select.append('<option value="' + barangs.id + '">' + barangs.nama_barang + '</option>');
            });
        }
    });
});
</script>

{{-- Tampilkan Harga  --}}
<script>
    $(document).ready(function() {
        $('#id_barang').change(function() {
            var idBarang = $(this).val();

            if (idBarang) {
                $.ajax({
                    url: '/admin/get-harga-barang/' + idBarang,
                    type: 'GET',
                    success: function(data) {
                        if (data.harga) {
                            // Format number untuk tampilan
                            $('#harga_formatted').val(formatNumber(data.harga));
                            // Simpan harga asli ke input hidden untuk dikirim ke database
                            $('#harga').val(data.harga);
                        } else {
                            alert('Barang tidak ditemukan');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Gagal mendapatkan harga barang');
                    }
                });
            } else {
                $('#harga_formatted').val('');
                $('#harga').val('');
            }
        });

        // Fungsi untuk memformat angka dengan pemisah ribuan
        function formatNumber(num) {
            return new Intl.NumberFormat('id-ID', { minimumFractionDigits: 0 }).format(num);
        }
    });
</script>

{{-- Tampilkan Add --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let subtotal = 0;
        let addedItems = new Set();

        function toggleInputFields(disabled) {
            document.getElementById('jml_item').disabled = disabled;
            document.getElementById('harga').disabled = disabled;
            if (disabled) {
                document.getElementById('jml_item').value = '';
                document.getElementById('harga').value = '';
            }
        }

        // Initial check to set input fields based on existing items
        function checkInputFields() {
            let idBarang = document.getElementById('id_barang').value;
            let isItemAdded = addedItems.has(idBarang);
            toggleInputFields(isItemAdded);
        }

        document.getElementById('add-item-detail').addEventListener('click', function () {
            let idBarang = document.getElementById('id_barang').value;
            let namaBarang = document.getElementById('id_barang').selectedOptions[0].text;
            let qty = parseInt(document.getElementById('jml_item').value);
            let harga = parseInt(document.getElementById('harga').value);

            if (addedItems.has(idBarang)) {
                alert('Barang ini sudah ditambahkan sebelumnya.');
                return;
            }

            addedItems.add(idBarang);

            let totalHarga = qty * harga;
            subtotal += totalHarga;

            let row = `
                <tr>
                    <td><button type="button" class="btn btn-danger btn-sm remove-item">Remove</button></td>
                    <td class="numbered">${document.querySelectorAll('tbody tr').length + 1}</td>
                    <td><input type="hidden" name="id_barang[]" value="${idBarang}">${namaBarang}</td>
                    <td><input type="hidden" name="qty[]" value="${qty}">${qty}</td>
                    <td><input type="hidden" name="harga[]" value="${harga}">Rp ${harga.toLocaleString('id-ID')}</td>
                    <td>Rp ${totalHarga.toLocaleString('id-ID')}</td>
                </tr>
            `;

            document.querySelector('tbody').insertAdjacentHTML('beforeend', row);

            document.querySelector('tfoot tr th:last-child').textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;

            // Disable input fields after adding
            toggleInputFields(true);

            updateNumbers();
        });

        document.querySelector('tbody').addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-item')) {
                let row = e.target.closest('tr');
                let idBarang = row.querySelector('input[name="id_barang[]"]').value;
                let totalHarga = parseInt(row.querySelector('td:last-child').textContent.replace(/\D/g, ''));

                subtotal -= totalHarga;
                row.remove();

                addedItems.delete(idBarang);

                document.querySelector('tfoot tr th:last-child').textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;
                updateNumbers();

                // Enable input fields if no items are added
                if (!addedItems.size) {
                    toggleInputFields(false);
                } else {
                    // Recheck if the currently selected item is in the added items
                    checkInputFields();
                }
            }
        });

        document.getElementById('id_barang').addEventListener('change', function () {
            let idBarang = this.value;

            if (idBarang) {
                fetch(`/admin/get-stock-details/${idBarang}`)
                    .then(response => response.json())
                    .then(data => {
                        // let hppBaru = data.hpp_baru || 0;

                        document.querySelector('.card-text strong.stock').textContent = data.stock || '0';
                        document.querySelector('.card-text strong.hpp-awal').textContent = `Rp ${data.hpp_awal.toLocaleString('id-ID')}`;
                        document.querySelector('.card-text strong.hpp-baru').textContent = `Rp ${data.hpp_baru.toLocaleString('id-ID')}`;

                        // calculateHPP(hppBaru);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            } else {
                document.querySelector('.card-text strong.stock').textContent = '0';
                document.querySelector('.card-text strong.hpp-awal').textContent = 'Rp 0';
                document.querySelector('.card-text strong.hpp-baru').textContent = 'Rp 0';
            }

            checkInputFields();
        });

        document.querySelectorAll('.jumlah-item, .harga-barang').forEach(function (input) {
            input.addEventListener('input', function () {
                let hppBaru = parseFloat(document.querySelector('.card-text strong.hpp-baru').textContent.replace('Rp ', '').replace(/\./g, '')) || 0;
                calculateHPP(hppBaru);
            });
        });

        function calculateHPP(hppBaru) {
            let jumlah = parseFloat(document.querySelector('.jumlah-item').value) || 0;
            let harga = parseFloat(document.querySelector('.harga-barang').value) || 0;

            if (jumlah > 0 && harga > 0) {
                let totalHpp = harga;
                let finalHpp = (totalHpp + hppBaru) / 2;

                document.querySelector('.card-text strong.hpp-baru').textContent = `Rp ${Math.round(finalHpp).toLocaleString('id-ID')}`;
            }
        }

        function updateNumbers() {
            document.querySelectorAll('tbody tr .numbered').forEach((element, index) => {
                element.textContent = index + 1;
            });
        }
    });

    </script>

{{-- <script>
$('#id_barang').on('change', function () {
    var barangId = $(this).val();
    var tokoId = $('#toko_pengirim').val();
    if (barangId && tokoId) {
        $.ajax({
            url: '/admin/get-harga-barang/' + barangId + '/' + tokoId,
            type: "GET",
            dataType: "json",
            success: function (data) {
                $('#harga').val(data.harga); // Isi input harga otomatis
            }
        });
    }
});

</script> --}}


    {{-- @if(isset($pengiriman))
    <script>
        $(document).ready(function(){
            var id_toko = "{{ $pengiriman->toko_pengirim }}";
            // Fungsi untuk mendapatkan barang berdasarkan toko
            function fetchBarang(id_toko) {
                $.ajax({
                    url: '/admin/get-barangs-by-toko/' + id_toko,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#id_barang').empty(); // Kosongkan dropdown barang
                        $('#id_barang').append('<option value="" disabled selected>Pilih Barang</option>');

                        $.each(data, function(key, value){
                            $('#id_barang').append('<option value="'+ value.id +'">'+ value.nama_barang +'</option>');
                        });
                    }
                });
            }

            // Panggil fungsi untuk mendapatkan barang saat halaman dimuat
            fetchBarang(id_toko);
        });
    </script>
@else
    <script>
        // Jika $pengiriman tidak tersedia, tidak melakukan apa-apa atau tampilkan pesan
        console.log('Toko pengirim tidak tersedia.');
    </script>
@endif --}}


    {{-- <script>
        $(document).ready(function() {
            $('#id_barang').change(function() {
                var idBarang = $(this).val();  // Mendapatkan id_barang yang dipilih
                var idToko = $('#toko_pengirim').val();  // Mendapatkan id toko dari dropdown toko_pengirim (pastikan elemen ini ada di view)

                if (idBarang && idToko) {
                    $.ajax({
                        url: '/admin/get-harga-barang/' + idBarang + '/' + idToko,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            if (data.harga) {
                                var formattedHarga = new Intl.NumberFormat('id-ID').format(data.harga);
                                $('#harga').val(formattedHarga);  // Menampilkan harga yang sudah diformat
                                $('#harga').data('real-value', data.harga);  // Menyimpan harga asli di data attribute
                            } else {
                                $('#harga').val('');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            $('#harga').val('');
                        }
                    });
                } else {
                    $('#harga').val('');
                }
            });

            // Mengatur nilai harga sebelum submit form
            $('form').on('submit', function() {
                var hargaInput = $('#harga');
                var realValue = hargaInput.data('real-value');
                hargaInput.val(realValue);  // Set value asli sebelum submit
            });
        });
    </script>


    {{-- <script>
    $(document).ready(function() {
        $('#id_barang').change(function() {
            var idBarang = $(this).val();  // Mendapatkan id_barang yang dipilih
            var idToko = $('#toko_pengirim').val();  // Mendapatkan id toko dari dropdown toko_pengirim

            if (!idToko || idToko === "~Pilih Nama Toko~") {
        alert('Silakan pilih toko terlebih dahulu');
        return;
    }

            if (idBarang && idToko) {
                $.ajax({
                    url: '/admin/get-harga-barang/' + idBarang + '/' + idToko,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        if (data.harga) {
                            var formattedHarga = new Intl.NumberFormat('id-ID').format(data.harga);
                            $('#harga').val(formattedHarga);  // Menampilkan harga yang sudah diformat
                            $('#harga').data('real-value', data.harga);  // Menyimpan harga asli di data attribute
                        } else {
                            $('#harga').val('');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        $('#harga').val('');
                    }
                });
            } else {
                $('#harga').val('');
            }
        });

        // Mengatur nilai harga sebelum submit form
        $('form').on('submit', function() {
            var hargaInput = $('#harga');
            var realValue = hargaInput.data('real-value');
            hargaInput.val(realValue);  // Set value asli sebelum submit
        });
    });
</script> --}}

@endsection
