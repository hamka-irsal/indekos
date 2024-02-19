<?php
require_once './admin/config/connection.php';
$koneksi = new Connection();

$id = $_GET['id'];

$query = "SELECT * FROM kost WHERE id='$id'";
$result = mysqli_query($koneksi->conn, $query);

$kost = mysqli_fetch_assoc($result);
$query = "SELECT * FROM recomendations WHERE kost_id='$id' LIMIT 5";
$recomendations = mysqli_query($koneksi->conn, $query);

$query = "SELECT rating FROM recomendations WHERE kost_id='$id'";
$rating = mysqli_query($koneksi->conn, $query);

$totalRating = mysqli_num_rows($rating);

$rating5 = 0;
$rating4 = 0;
$rating3 = 0;
$rating2 = 0;
$rating1 = 0;

$jumlahRating = 0;

while ($d = mysqli_fetch_assoc($rating)) {
    switch ($d['rating']) {
        case 5:
            $rating5 += 1;
            $jumlahRating += $d['rating'];
            break;
        case 4:
            $rating4 += 1;
            $jumlahRating += $d['rating'];
            break;
        case 3:
            $rating3 += 1;
            $jumlahRating += $d['rating'];
            break;
        case 2:
            $rating2 += 1;
            $jumlahRating += $d['rating'];
            break;
        default:
            $rating1 += 1;
            $jumlahRating += $d['rating'];
    }
}

if ($jumlahRating && $totalRating) {
    $avarageRating =  round($jumlahRating / $totalRating, 1);
    $avarageFloor = floor($jumlahRating / $totalRating);
} else {
    $avarageRating =  0;
    $avarageFloor = 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $host = "localhost";
    $user = "root";
    $pass = "";
    $name = "db_kost";

    $koneksi = mysqli_connect($host, $user, $pass, $name);
    if (mysqli_connect_errno()) {
        echo "Koneksi database mysqli gagal!!! : " . mysqli_connect_error();
    }

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];

    mysqli_query($koneksi, "insert into recomendations (nama,email,ulasan,rating, kost_id) values('$nama','$email','$ulasan','$rating','$id')");
    header("location:detail_kost.php?id=$id");
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include('./layouts/base.php') ?>

<body>

    <?php include('./components/header.php') ?>

    <main>
        <section>
            <div class="container">
                <div class="row mt-7">
                    <div class="col-md-5 mb-5 mb-md-0">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="panel panel-info panel-dashboard">
                                        <div id="map" style="width:100%;height:380px;">

                                            <div class="row align-items-center" style="margin-left: 95px;">
                                                <script>
                                                    var DataLongLat = [-5.155978984099238, 119.40353393554689];
                                                    var map = L.map('map').setView(DataLongLat, 16);
                                                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
                                                    L.marker(DataLongLat).addTo(map)
                                                        .bindPopup("Hellow World")
                                                        .openPopup();
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7 ps-md-6">
                        <h1 class="h2 mb-4"><?= $kost['nama_kost'] ?></h1>
                        <h5 class="h5 mb-4"><?= $kost['alamat'] ?> 📌</h5>

                        <div class="d-flex align-items-center flex-wrap mb-4">
                            <ul class="list-inline mb-0">

                                <?php for ($i = 0; $i < $avarageFloor; $i++) : ?>
                                    <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <?php endfor ?>

                                <?php
                                $bagian = explode('.', $avarageRating);
                                ?>

                                <?php if (isset($bagian[1]) && $bagian[1] > 0) : ?>
                                    <li class="list-inline-item me-0"><i class="fas fa-star-half-alt text-warning"></i></li>
                                <?php endif ?>

                                <li class="list-inline-item me-0 heading-color fw-normal">(<?= $avarageRating ?>)</li>

                            </ul>
                        </div>

                        <p class="mb-4"><?= $kost['deskripsi'] ?></p>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-0">
            <div class="container">
                <h2 class="h4 mb-5">Rating & review</h2>

                <div class="row sticky">
                    <div class="col-lg-5 pe-lg-5 mb-5 mb-lg-0 mt-3">
                        <div class="border rounded-2 p-4">
                            <div class="row">
                                <div class="col-md-5">
                                    <h2 class="mb-0"><?= $avarageRating ?></h2>
                                    <ul class="list-inline mb-2">

                                        <?php for ($i = 0; $i < $avarageFloor; $i++) : ?>
                                            <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                        <?php endfor ?>
                                        <?php
                                        $bagian = explode('.', $avarageRating);
                                        ?>
                                        <?php if (isset($bagian[1]) && $bagian[1] > 0) : ?>
                                            <li class="list-inline-item me-0"><i class="fas fa-star-half-alt text-warning"></i></li>
                                        <?php endif ?>

                                    </ul>
                                    <p class="mb-2">Total ulasan <?= $totalRating ?></p>
                                </div>

                                <div class="col-md-7">
                                    <div class="d-flex align-items-center">
                                        <div class="progress progress-sm bg-warning bg-opacity-15 w-100 me-3">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $rating5 ?>%" aria-valuenow="<?= $rating5 ?>" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <span class="heading-color">5</span>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <div class="progress progress-sm bg-warning bg-opacity-15 w-100 me-3">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $rating4 ?>%" aria-valuenow="<?= $rating4 ?>" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <span class="heading-color">4</span>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <div class="progress progress-sm bg-warning bg-opacity-15 w-100 me-3">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $rating3 ?>%" aria-valuenow="<?= $rating3 ?>" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <span class="heading-color">3</span>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <div class="progress progress-sm bg-warning bg-opacity-15 w-100 me-3">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $rating2 ?>%" aria-valuenow="<?= $rating2 ?>" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <span class="heading-color">2</span>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <div class="progress progress-sm bg-warning bg-opacity-15 w-100 me-3">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $rating1 ?>%" aria-valuenow="<?= $rating1 ?>" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <span class="heading-color">1</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper mt-4">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="card card-element-hover overflow-hidden">

                                        <?php if (isset($kost['image'])) : ?>
                                            <img src="admin/upload/<?= $kost['image'] ?>" class="rounded-3" alt="">
                                        <?php endif ?>

                                        <div class="hover-element w-100 h-100">
                                            <i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div id="output">
                            <?php while ($data = mysqli_fetch_assoc($recomendations)) : ?>
                                <hr>

                                <div class="d-flex">

                                    <?php if (isset($data['email'])) : ?>
                                        <img class="avatar avatar-md rounded-circle float-start me-3" src="https://gravatar.com/avatar/'<?php md5(strtolower(trim($data['email']))) ?>?s=1024" alt="avatar">
                                    <?php else : ?>
                                        <img class="avatar avatar-md rounded-circle float-start me-3" src="https://gravatar.com/avatar?s=1024" alt="avatar">
                                    <?php endif ?>

                                    <div>
                                        <div>
                                            <h6 class="m-0"><?= $data['nama'] ?></h6>
                                            <span class="me-3 small"><?= $data['created_at'] ?></span>
                                        </div>
                                        <ul class="list-inline">

                                            <?php for ($i = 0; $i <  (int) $data['rating']; $i++) : ?>
                                                <li class="list-inline-item small me-0"><i class="fas fa-star text-warning"></i></li>
                                            <?php endfor ?>

                                        </ul>

                                        <p><?= $data['ulasan'] ?></p>
                                    </div>
                                </div>
                            <?php endwhile ?>
                        </div>

                        <div class="row my-5">
                            <div class="col-12 mx-auto d-flex justify-content-center">
                                <a href="" id="load_more" class="btn btn-primary-soft mb-0">Komentar Lainnya</a>
                            </div>
                        </div>

                        <hr class="my-3">

                        <div class="card mt-5">
                            <form action="" method="post" enctype="multipart/form-data">
                                <select name="rating" class="form-select mb-3" aria-label="Default select example">
                                    <option value="5">★★★★★ (5/5)</option>
                                    <option value="4">★★★★☆ (4/5)</option>
                                    <option value="3">★★★☆☆ (3/5)</option>
                                    <option value="2">★★☆☆☆ (2/5)</option>
                                    <option value="1">★☆☆☆☆ (1/5)</option>
                                </select>
                                <input class="form-control mb-3" name="nama" id="nama" placeholder="Nama anda" type="text" />
                                <input class="form-control mb-3" name="email" id="email" placeholder="Email Anda" type="text" />
                                <textarea class="form-control mb-3" name="ulasan" id="ulasan" placeholder="Your review" rows="3"></textarea>
                                <button type="submit" class="btn btn-primary mb-0">Kirim Ulasan <i class="bi fa-fw bi-arrow-right ms-2"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include('./components/footer.php') ?>

        <!-- Back to top -->
        <div class="back-top"></div>

        <!-- Bootstrap JS -->
        <script src="aset/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Vendors -->
        <script src="aset/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="aset/vendor/glightbox/js/glightbox.js"></script>

        <!-- Theme Functions -->
        <script src="aset/js/functions.js"></script>

        <script src="js/jquery.js"></script>

        <script>
            $(document).ready(function() {
                // load more
                const limit = 5;
                let start = 0;

                $("#load_more").click((e) => {
                    e.preventDefault();

                    start = start + limit;

                    $.ajax({
                        url: `load/load_ulasan.php`,
                        method: 'GET',
                        data: {
                            limit: limit,
                            start: start,
                            id: <?= $id ?>
                        },
                        success: function(data) {
                            $('#output').html(data);

                            $('#output').css('display', 'block');

                            $("#search").focusout(function() {
                                $('#output').css('display', 'none');
                            });

                            $("#search").focusin(function() {
                                $('#output').css('display', 'block');
                            });
                        }
                    });
                });
            });
        </script>
</body>

</html>