<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="{{ asset('ElaAdmin-master/assets/js/main.js') }}"></script>

<!--  Chart js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

<!--Chartist Chart-->
<script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
<script src="{{ asset('ElaAdmin-master/assets/js/init/weather-init.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
<script src="{{ asset('ElaAdmin-master/assets/js/init/fullcalendar-init.js') }}"></script>

<script src="{{ asset('ElaAdmin-master/assets/js/lib/data-table/datatables.min.js') }}"></script>
<script src="{{ asset('ElaAdmin-master/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('ElaAdmin-master/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('ElaAdmin-master/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('ElaAdmin-master/assets/js/lib/data-table/jszip.min.js') }}"></script>
<script src="{{ asset('ElaAdmin-master/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
<script src="{{ asset('ElaAdmin-master/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
<script src="{{ asset('ElaAdmin-master/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
<script src="{{ asset('ElaAdmin-master/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('ElaAdmin-master/assets/js/init/datatables-init.js') }}"></script>
<script src="{{ asset('ElaAdmin-master/assets/js/lib/chosen/chosen.jquery.min.js') }}"></script>

<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 0,
            no_results_text: "Oops, nothing found!",
            width: "100%",
        });
    });
</script>
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
                <input type="text" id="nama_barang" name="nama_barang[]" placeholder="Contoh : Tws Bluetooth" class="form-control col-4">
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
                <input type="number" id="harga_barang" min="1" name="harga_barang[]" placeholder="Contoh : 16000" class="form-control col-4 harga-barang">
            </div>
            <div class="form-group">
                <label for="jml_item" class="form-control-label">Jumlah Item<span style="color: red">*</span></label>
                <input type="number" id="jml_item" min="1" name="qty[]" placeholder="Contoh : 16" class="form-control col-4 jumlah-item">
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


