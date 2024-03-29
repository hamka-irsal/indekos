<?php
require_once './admin/config/connection.php';
require_once './function/rating.php';
require_once './function/helpers.php';

session_start();

$koneksi = new Connection();

$id = $_GET['id'];

$query = "SELECT * FROM kost WHERE id='$id'";
$result = mysqli_query($koneksi->conn, $query);
$kost = mysqli_fetch_assoc($result);

$query = "SELECT * FROM recomendations WHERE kost_id='$id' ORDER BY id DESC LIMIT 5";
$recomendations = mysqli_query($koneksi->conn, $query);

$ratings = new Rating();

$rating = $ratings->getRating($id);

$avarageRating =  $rating['avarage'];
$avarageFloor = $rating['floor'];
$totalRating = $rating['total'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $host = "localhost";
    $user = "root";
    $pass = "";
    $name = "db_kost";

    $koneksi = mysqli_connect($host, $user, $pass, $name);
    if (mysqli_connect_errno()) {
        echo "Koneksi database mysqli gagal!!! : " . mysqli_connect_error();
    }

    if (!isset($_SESSION['id_user']) && !isset($_SESSION['login_user']) && !isset($_SESSION['email_user'])) {
        echo "<script>alert('Anda belum login silahkan login terlebih dahulu!'); window.location.href = 'user_login.php'</script>";
    }

    $nama =  $_SESSION['name_user'];
    $email =  $_SESSION['email_user'];
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];

    if (isset($nama) && isset($email) && isset($ulasan) && isset($rating)) {
        $check = mysqli_query($koneksi, "select * from recomendations where email='$email' and kost_id='$id'");
        $check = mysqli_fetch_assoc($check);

        if (isset($check['email'])) {
            echo "<script>alert('Email telah dipakai coba dengan email lain!'); window.location = 'detail_kost.php?id=$id'</script>";
        } else {
            if ($email != "" && $ulasan != "" && $nama != "") {
                mysqli_query($koneksi, "insert into recomendations (nama,email,ulasan,rating, kost_id) values('$nama','$email','$ulasan','$rating','$id')");
                header("location:detail_kost.php?id=$id");
            } else {
                echo "<script>alert('Tidak Boleh Kosong!'); window.location = 'detail_kost.php?id=$id'</script>";
            }
        }
    }
}

function getCategory($kostId, $koneksi)
{
    $query = "SELECT * FROM category WHERE kost_id='$kostId'";
    $category = mysqli_query($koneksi, $query);

    return $category;
}

if (isset($_GET['category'])) {
    $category = $_GET['category'];
    $query = "SELECT * FROM category WHERE category='$category'";
    $category = mysqli_query($koneksi->conn, $query);
    $dataCategory =  mysqli_fetch_assoc($category);
    $persent = $dataCategory['persent'];
}

$category = getCategory($id, $koneksi->conn);

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
                                                    var link = `<table cellpadding="5">
                                                        <tr>
                                                            <td>Nama</td>
                                                            <td>:</td>
                                                            <td><b><?= $kost['nama_kost'] ?></b></td>
                                                        </tr>

                                                        <tr>
                                                            <td>Alamat</td>
                                                            <td>:</td>
                                                            <td>
                                                                <b><?= $kost['alamat'] ?></b>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Deskripsi</td>
                                                            <td>:</td>
                                                            <td><b><?= $kost['deskripsi'] ?></b></td>
                                                        </tr>

                                                        <tr>
                                                            <td>Tanggal</td>
                                                            <td>:</td>
                                                            <td><b><?= $kost['created_at'] ?></b></td>
                                                        </tr>
                                                    </table>
                                                    `
                                                    var DataLongLat = [<?= $kost['latitude'] ?>, <?= $kost['longitude'] ?>];
                                                    var map = L.map('map').setView(DataLongLat, 10);
                                                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
                                                    L.marker(DataLongLat).addTo(map)
                                                        .bindPopup(link)
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
                        <h5 class="h4"><?= $kost['alamat'] ?> 📌</h5>

                        <?php if (!isset($persent)) : ?>
                            <h6 class="h6 mb-4"><?= Helpers::money_format_idr($kost['harga']) ?></h6>
                        <?php else : ?>
                            <h6 class="h6 mb-4"><?= Helpers::money_format_idr($kost['harga'] - ($persent / 100 * $kost['harga'])) ?></h6>
                        <?php endif ?>

                        <div class="d-flex gap-2 mb-3">
                            <?php while ($cate = mysqli_fetch_array($category)) : ?>
                                <a href="detail_kost.php?id=<?= $id ?>&category=<?= $cate['category'] ?>" class="btn btn-sm <?php echo ($cate['category'] == $dataCategory['category']) ? 'btn-primary' : 'btn-outline-primary'; ?>"><?= $cate['category'] ?></a>
                            <?php endwhile ?>

                            <?php if (isset($dataCategory['category'])) : ?>
                                <a class="btn btn-sm btn-outline-primary" href="detail_kost.php?id=<?= $id ?>">Harga Awal</a>
                            <?php endif ?>
                        </div>

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
                                            <img style="height: 300px; object-fit:cover" src="admin/upload/<?= $kost['image'] ?>" class="rounded-3" alt="">
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