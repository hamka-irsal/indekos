<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>

<body id="page-top">
    <div id="wrapper">

        <?php include "menu_sidebar.php"; ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <?php include "menu_topbar.php"; ?>

                <div class="container-fluid">

                    <div class="page-title d-flex justify-content-between mb-2">
                        <div>
                            <h1 style="font-weight:600; color: black; font-size: 30px; margin: 0px">Tambah Indekosta</h1>
                            <p>Menambah data indekosta</p>
                        </div>
                        <div class="mt-3">
                            <a class="btn btn-outline-primary " href="tampil_data.php">Kembali</a>
                        </div>
                    </div>

                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Menambahkan Data Indekosta</h6>
                        </div>

                        <div class="card-body">
                            <form class="form-horizontal style-form" style="margin-top: 10px;" action="tambah_aksi.php" method="post" enctype="multipart/form-data" name="form1" id="form1">

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nama Indekos</label>
                                    <div class="col-sm-6">
                                        <input name="nama_wisata" type="text" class="form-control" placeholder="Nama Indekos" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Alamat</label>
                                    <div class="col-sm-6">
                                        <input name="alamat" class="form-control" type="text" placeholder="Alamat" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Deskripsi</label>
                                    <div class="col-sm-6">
                                        <input name="deskripsi" class="form-control" type="text" placeholder="Deskripsi" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Harga</label>
                                    <div class="col-sm-6">
                                        <input name="harga_tiket" class="form-control" type="text" type="text" placeholder="Harga" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Gambar</label>
                                    <div class="col-sm-6">
                                        <input name="gambar" class="form-control" type="file" placeholder="Gambar" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Latitude</label>
                                    <div class="col-sm-6">
                                        <input name="latitude" class="form-control" type="text" placeholder="-7.3811577" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Longitude</label>
                                    <div class="col-sm-6">
                                        <input name="longitude" class="form-control" type="text" placeholder="109.2550945" required />
                                    </div>
                                </div>
                                <div class="page-title d-flex mb-2">
                                    <div>
                                        <h1 style="font-weight:600; color: black; font-size: 15px; margin: 0px">Tambah Kategori Anda.</h1>
                                        <div class="form-group pt-2 mx-3">
                                            <div class="form-check mb-2">
                                                <input name="kuliah" class="form-check-input" type="checkbox" value="kuliah" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Kuliah
                                                </label>
                                                <div class="col-sm-6">
                                                    <input name="persentKuliah" type="number" class="form-control" placeholder="0" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group pt-2 mx-3">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" name="kerja" value="kerja" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    kerja
                                                </label>
                                                <div class="col-sm-6">
                                                    <input name="persentKerja" type="number" class="form-control" placeholder="0" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group pt-2 mx-3">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" name="pasutri" value="pasutri" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    pasutri
                                                </label>
                                                <div class="col-sm-6">
                                                    <input name="persentPasutri" type="number" class="form-control" placeholder="0" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 20px;">
                                    <label class="col-sm-2 col-sm-4 control-label"></label>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                                    </div>
                                </div>

                                <div style="margin-top: 20px;"></div>
                            </form>
                            <div class="card-body border-top">
                                <div class="row mb-3">
                                    <h6 class="text-dark">Cari Lokasi (Opsional)</h6>
                                </div>
                                <div class="form-group mb-1 px-lg-3">
                                    <div class="row">
                                        <div class="col-12" id="map"></div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                                });

                                var map = L.map('map', {
                                    center: [-5.143465248049867, 119.42513287132269],
                                    zoom: 13,
                                    layers: [osm],
                                    minZoom: 5,
                                    maxZoom: 15,
                                });

                                var marker = L.marker([-5.143465248049867, 119.42513287132269], {
                                    draggable: true
                                }).addTo(map);

                                var longitude = document.querySelector("input[name=longitude]");
                                var latitude = document.querySelector("input[name=latitude]");

                                map.on('click', function(e) {
                                    longitude.value = e.latlng.lng;
                                    latitude.value = e.latlng.lat;

                                    if (!marker) {
                                        marker = L.marker(e.latlng).addTo(map);
                                    } else {
                                        marker.setLatLng(e.latlng);
                                    }
                                });

                                marker.on('dragend', function(e) {
                                    var coordinate = e.target._latlng;
                                    longitude.value = coordinate.lng;
                                    latitude.value = coordinate.lat;
                                    marker.setLatLng(coordinate);

                                });

                                var searchControl = L.esri.Geocoding.geosearch().addTo(map);
                                var results = L.layerGroup().addTo(map);

                                searchControl.on('results', function(data) {
                                    results.clearLayers();
                                    var firstResult = data.results[0];
                                    var latlng = L.latLng(firstResult.latlng.lat, firstResult.latlng.lng);
                                    marker.setLatLng(latlng);
                                    map.setView(latlng, 13);
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>

            <?php include "footer.php"; ?>

        </div>
    </div>
    <script>
$(document).ready(function() {
    // Mengatur event handler untuk checkbox
    $('.form-check-input').change(function() {
        // Mendapatkan elemen input yang sesuai dengan checkbox yang dicentang
        var pasutri = $(this).closest('.form-check').find('input[name="persentPasutri"]');
        var kuliah = $(this).closest('.form-check').find('input[name="persentKuliah"]');
        var kerja = $(this).closest('.form-check').find('input[name="persentKerja"]');
        
        // Jika checkbox dicentang, aktifkan input
        if ($(this).is(':checked')) {
            pasutri.prop('disabled', false);
            kuliah.prop('disabled', false);
            kerja.prop('disabled', false);
        } else {
            // Jika checkbox tidak dicentang, nonaktifkan input
            pasutri.prop('disabled', true);
            kuliah.prop('disabled', true);
            kerja.prop('disabled', true);
        }
    });

    // Mengatur inputan awal berdasarkan status checkbox
    $('.form-check-input').trigger('change');
});
</script>
</body>

</html>