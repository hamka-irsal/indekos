<?php
if ($_SERVER['SCRIPT_NAME'] != "/detail_kost.php") {
    session_start();
}

function user()
{

    $host = "localhost";
    $user = "u527366907_indekos";
    $pass = "BintangFery123$$";
    $name = "u527366907_db_kost";

    $koneksi = mysqli_connect($host, $user, $pass, $name);
    if (mysqli_connect_errno()) {
        echo "Koneksi database mysqli gagal!!! : " . mysqli_connect_error();
    }

    $id = $_SESSION['id_user'];
    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE id= '$id'");
    $row = mysqli_fetch_assoc($result);

    if (isset($row)) {
        return $row;
    } else {
        return null;
    }
}

if (isset($_SESSION['id_user'])) {
    $user = user();
} else {
    $user = null;
}

?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.3.2/dist/esri-leaflet-geocoder.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/esri-leaflet@2.4.0/dist/esri-leaflet.js"></script>
<script src="https://unpkg.com/esri-leaflet-geocoder@2.3.2/dist/esri-leaflet-geocoder.js"></script>
<header class="header-sticky header-absolute">
    <nav class="navbar navbar-expand-xl">
        <div class="container">
            <a class="navbar-brand me-0" href="index.php">
                <img width="250px" src="admin/img/logo_indekost.svg" alt="logo">
            </a>

            <div class="navbar-collapse collapse" id="navbarCollapse">
                <ul class="navbar-nav navbar-nav-scroll dropdown-hover mx-auto">
                    <li class="nav-item"> <a class="nav-link" href="index.php">Home</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="rekomendasi.php">Rekomendasi</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="cari_kost.php">Cari Kost</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="maps.php">Maps</a> </li>
                </ul>
                <ul class="nav align-items-center dropdown-hover ms-sm-2 my-2">
                    <?php if (!isset($user['username']) && !isset($user['id'])) : ?>
                        <li class="nav-item d-flex gap-3">
                            <a class="btn btn-sm btn-primary mb-0" href="register.php">Daftar</a>
                            <a class="btn btn-sm btn-outline-primary mb-0" href="user_login.php">Masuk</a>
                        </li>
                    <?php else : ?>
                        <div class="d-flex gap-4">
                            <div>
                                <p class="mb-0"><?= $user['email'] ?></p>
                                <small class="text-primary">Ada telah login!</small>
                            </div>
                            <div>
                                <a class="btn btn-sm btn-danger mt-2" href="logout_user.php">Logout</a>
                            </div>
                        </div>
                    <?php endif  ?>
                </ul>
            </div>
            <ul class="nav align-items-center dropdown-hover ms-sm-2">
                <li class="nav-item">
                    <button class="navbar-toggler ms-sm-3 p-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-animation">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>
                </li>
            </ul>

        </div>
    </nav>
</header>