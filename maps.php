<?php

require_once './admin/config/connection.php';
require_once './function/rating.php';

$koneksi = new Connection();
$query = "SELECT * FROM kost";
$result = mysqli_query($koneksi->conn, $query);

$DataLongLat = [];

while ($d = mysqli_fetch_array($result)) {
    $DataLongLat[] = [
        'latitude' => $d['latitude'],
        'longitude' => $d['longitude'],
        'nama_kost' => $d['nama_kost'],
        'alamat' => $d['alamat'],
        'image' => $d['image'],
        'deskripsi' => $d['deskripsi'],
        'created_at' => $d['created_at'],
        'id' => $d['id'],
    ];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>

<?php include('./layouts/base.php') ?>

<body>

    <?php include('./components/header.php') ?>
    <main>
        <section class="pt-8">
            <div class="container mb-6">
                <div class="inner-container text-center mb-2">
                    <h1 class="mb-0 lh-base position-relative">
                        <span class="position-absolute top-0 start-0 mt-n5 ms-n5 d-none d-sm-block">
                            <svg class="fill-primary" width="63.6px" height="93.3px" viewBox="0 0 63.6 93.3" style="enable-background:new 0 0 63.6 93.3;" xml:space="preserve">
                                <path d="M58.5,1.9c0.5,0,1.6,5.3,2.4,11.8c0.8,6.5,1.4,14,1.6,18.5c0.3,8.8-0.5,15.9-1.6,16c-1.1,0-2.1-7.1-2.4-15.8 c-0.2-4.4-0.3-12-0.4-18.4C57.9,7.3,57.9,1.9,58.5,1.9z" />
                                <path d="M47.7,44.4c-0.5,0.1-1.5-2.1-2.8-4.7c-1.3-2.6-2.8-5.5-3.7-7.2c-1.7-3.4-2.9-6.4-2.1-7c0.8-0.6,3.4,1.5,5.3,5.1 c1,1.8,2.2,5.1,2.9,8.1C48.1,41.8,48.2,44.3,47.7,44.4z" />
                                <path d="M36.2,53.4c-0.2,0.5-4.1-1.2-8.5-3.5c-4.4-2.3-9.5-5.4-12.3-7.3c-5.6-3.9-9.6-7.9-9-8.8c0.6-0.9,5.4,1.7,11,5.5 c2.8,1.9,7.5,5.3,11.6,8.2C33.1,50.5,36.4,53,36.2,53.4z" />
                                <path d="M27.2,68.3c-0.1,0.5-2.1,0.7-4.4,0.6c-2.4,0-5.1-0.3-6.7-0.7c-3.1-0.6-5.4-2-5.2-3c0.2-1,2.9-1.2,5.9-0.5 c1.5,0.3,4.1,1,6.3,1.7C25.4,67.1,27.2,67.8,27.2,68.3z" />
                                <path d="M30.8,83.2c0.1,0.5-3.5,1.7-7.7,3.1c-4.3,1.4-9.2,3.1-12.1,4.1c-5.7,1.9-10.6,3.1-11,2.1 c-0.4-0.9,3.9-3.6,9.8-5.6c2.9-1,8.1-2.4,12.6-3.2C26.9,83,30.7,82.7,30.8,83.2z" />
                            </svg>
                        </span>
                        Cari Lokasi Kost Kamu 🤩
                    </h1>
                </div>
            </div>
            <div class="container mt-6">
                <div class="row g-xl-7 justify-content-center">
                    <div class="card-body border-top">
                        <div class="row">
                            <div class="col-12" id="map"></div>
                        </div>

                        <script>
                            var osm = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
                                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                            });

                            var map = L.map('map', {
                                center: [<?= $DataLongLat[0]['latitude']; ?>, <?= $DataLongLat[0]['longitude']; ?>],
                                zoom: 13,
                                layers: [osm],
                                minZoom: 5,
                                maxZoom: 18,
                            });

                            <?php foreach ($DataLongLat as $location) : ?>

                                <?php
                                $ratings = new Rating();

                                $rating = $ratings->getRating($location['id']);

                                $avarageRating =  $rating['avarage'];
                                $avarageFloor = $rating['floor'];
                                $totalRating = $rating['total'];
                                ?>

                                var link = `<table cellpadding="5">
                                <tr>
                                    <td class="text-center" colspan="3"><img class="rounded mb-2" style="width: 150px; height: 150px; object-fit: cover" src='./admin/upload/<?= $location['image'] ?>' alt='image'/></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><b><?= $location['nama_kost'] ?></b></td>
                                </tr>

                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>
                                        <b><?= $location['alamat'] ?></b>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Deskripsi</td>
                                    <td>:</td>
                                    <td><b><?= $location['deskripsi'] ?></b></td>
                                </tr>

                                <tr><td colspan='3' class='text-center'><ul class="list-inline mb-0">

                                <?php for ($i = 0; $i < $avarageFloor; $i++) : ?>
                                    <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <?php endfor ?>

                                <?php
                                $bagian = explode('.', $avarageRating);
                                ?>

                                <?php if (isset($bagian[1]) && $bagian[1] > 0) : ?>
                                    <li class="list-inline-item me-0"><i class="fas fa-star-half-alt text-warning"></i></li>
                                <?php endif ?>

                                <li class="list-inline-item me-0 heading-color fw-normal">(<?= $avarageRating ?>) <small class="ms-2">dari <?= $totalRating ?> user</small></li>

                                </ul></td></tr>

                                <tr>
                                    <td class='text-center' colspan='3'><a class='btn btn-sm btn-primary text-white mt-2' href='detail_kost.php?id=<?= $location['id'] ?>'>Lihat Detail</a></td>
                                </tr>

                            </table>
                            `
                                var nama_kost = "<?= $location['nama_kost']; ?>";
                                var datLongLat = [<?= $location['latitude']; ?>, <?= $location['longitude']; ?>];
                                var marker = L.marker(datLongLat).addTo(map)
                                    .bindPopup(link);
                            <?php endforeach; ?>

                            var searchControl = L.esri.Geocoding.geosearch().addTo(map);
                            var results = L.layerGroup().addTo(map);

                            searchControl.on('results', function(data) {
                                results.clearLayers();
                                var firstResult = data.results[0];
                                var latlng = L.latLng(firstResult.latlng.lat, firstResult.latlng.lng);
                                marker.setLatLng(latlng);
                                map.setView(latlng, 2);
                            });
                        </script>
                    </div>
                </div>
        </section>

    </main>

    <?php include('./components/footer.php') ?>

    <div class="back-top"></div>

    <!-- Bootstrap JS -->
    <script src="aset/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!--Vendors-->
    <script src="aset/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Theme Functions -->
    <script src="aset/js/functions.js"></script>

</body>

</html>