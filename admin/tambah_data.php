<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include "menu_sidebar.php"; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include "menu_topbar.php"; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Data Tempat Indekos</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                        </div>
                        <div class="card-body">

                            <!-- Main content -->
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
                                <div class="form-group" style="margin-bottom: 20px;">
                                    <label class="col-sm-2 col-sm-4 control-label"></label>
                                    <div class="col-sm-8">
                                        <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />
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

                                // MAKE MAP INTERFACE
                                var map = L.map('map', {
                                    center: [-5.155978984099238, 119.40353393554689],
                                    zoom: 13,
                                    layers: [osm],
                                    minZoom: 5,
                                    maxZoom: 15,
                                });

                                // MAERKER DEFAULT
                                var marker = L.marker([-5.155978984099238, 119.40353393554689], {
                                    draggable: true
                                }).addTo(map);

                                var longitude = document.querySelector("input[name=longitude]");
                                var latitude = document.querySelector("input[name=latitude]");
                                // EVENT CLICK (JIKA DI KLIK)
                                map.on('click', function(e) {
                                   longitude.value = e.latlng.lng;
                                   latitude.value = e.latlng.lat;

                                    if (!marker) {
                                        marker = L.marker(e.latlng).addTo(map);
                                    } else {
                                        marker.setLatLng(e.latlng);
                                    }
                                });

                                // EVENT DRAG (JIKA DI TARIK)
                                marker.on('dragend', function(e) {
                                    var coordinate = e.target._latlng;
                                    longitude.value = coordinate.lng;
                                    latitude.value = coordinate.lat;
                                    marker.setLatLng(coordinate);
                                    
                                });

                                // EVENT JIKA DI SEARCH
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
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <?php include "footer.php"; ?>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
</body>

</html>