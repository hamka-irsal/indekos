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
                            <h1 style="font-weight:600; color: black; font-size: 30px; margin: 0px">Sunting Data Indekosta</h1>
                            <p>Menyunting data indekosta</p>
                        </div>
                        <div class="mt-3">
                            <a class="btn btn-outline-primary " href="tampil_data.php">Kembali</a>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Sunting Data Indekosta</h6>
                        </div>
                        <div class="card-body">

                            <?php
                            include '../koneksi.php';
                            $id = $_GET['id'];
                            $query = mysqli_query($koneksi, "select * from kost where id='$id'");
                            $data  = mysqli_fetch_array($query);
                            ?>

                            <div class="panel-body">
                                <form class="form-horizontal style-form" style="margin-top: 20px;" action="edit_aksi.php" method="post" enctype="multipart/form-data" name="form1" id="form1">

                                    <div class="form-group d-none">
                                        <label class="col-lg-6 col-12 control-label">ID Indekos</label>
                                        <div class="col-lg-6 col-12">
                                            <input name="id_kost" type="text" id="id_kost" class="form-control" value="<?php echo $data['id']; ?>" readonly />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-6 col-12 control-label">Nama Indekos</label>
                                        <div class="col-lg-6 col-12">
                                            <input name="nama_wisata" type="text" id="nama_wisata" class="form-control" value="<?php echo $data['nama_kost']; ?>" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-6 col-12 control-label">Alamat</label>
                                        <div class="col-lg-6 col-12">
                                            <input name="alamat" class="form-control" id="alamat" type="text" value="<?php echo $data['alamat']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-6 col-12 control-label">Deskripsi</label>
                                        <div class="col-lg-6 col-12">
                                            <input name="deskripsi" class="form-control" id="deskripsi" type="text" value="<?php echo $data['deskripsi']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-6 col-12 control-label">Harga</label>
                                        <div class="col-lg-6 col-12">
                                            <input name="harga" class="form-control" type="text" id="harga" type="text" value="<?php echo $data['harga']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-6 col-12 control-label">Latitude</label>
                                        <div class="col-lg-6 col-12">
                                            <input name="latitude" class="form-control" id="latitude" type="text" value="<?php echo $data['latitude']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-6 col-12 control-label">Longitude</label>
                                        <div class="col-lg-6 col-12">
                                            <input name="longitude" class="form-control" id="longitude" type="text" value="<?php echo $data['longitude']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 20px;">
                                        <label class="col-lg-6 col-12 control-label"></label>
                                        <div class="col-lg-6 col-12">
                                            <button type="submit" class="btn btn-primary">Sunting Data</button>
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

                                    var longitude = document.querySelector("input[name=longitude]");
                                    var latitude = document.querySelector("input[name=latitude]");

                                    if (latitude.value == "") {
                                        latitude.value = -5.155978984099238;
                                    }

                                    if (longitude.value == "") {
                                        longitude.value = 119.40353393554689;
                                    }

                                    var map = L.map('map', {
                                        center: [latitude.value ?? -5.155978984099238, longitude.value ?? 119.40353393554689],
                                        zoom: 18,
                                        layers: [osm],
                                        minZoom: 5,
                                        maxZoom: 15,
                                    });

                                    var marker = L.marker([latitude.value ?? -5.155978984099238, longitude.value ?? 119.40353393554689], {
                                        draggable: true
                                    }).addTo(map);


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
            </div>

            <?php include "footer.php"; ?>

        </div>
    </div>
</body>

</html>