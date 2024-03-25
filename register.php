<?php

require 'koneksi.php';
require './admin/function.php';

$query = "SELECT * FROM kost ORDER BY id DESC LIMIT 6";
$result = mysqli_query($koneksi, $query);

if (!empty($_SESSION["id"])) {
    header("Location: index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = $_POST['nama_pengguna'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password = password_hash($password, PASSWORD_DEFAULT);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        mysqli_query($koneksi, "insert into users (nama,username, password, email, roles) values('$nama','$username','$password', '$email','user')");
        header("location:user_login.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('./layouts/base.php') ?>

<body>
    <main>
        <div class="row g-0">
            <div class="col-lg-7 vh-100 d-none d-lg-block">
                <div class="swiper h-100" data-swiper-options='{
					"pagination":{
						"el":".swiper-pagination",
						"clickable":"true"
					}}'>

                    <div class="swiper-wrapper">
                        <?php while ($data = mysqli_fetch_array($result)) : ?>
                            <div class="swiper-slide">
                                <div class="card rounded-0 h-100" data-bs-theme="dark" style="background-image:url(admin/upload/<?= $data['image'] ?>); background-position: center left; background-size: cover;">
                                    <div class="bg-overlay bg-dark opacity-5"></div>

                                    <div class="card-img-overlay z-index-2 p-7">
                                        <div class="d-flex flex-column justify-content-end h-100">
                                            <h4 class="fw-light">"<?= $data['deskripsi'] ?>"</h4>
                                            <div class="d-flex justify-content-between mt-5">
                                                <div>
                                                    <h5 class="mb-0"><?= $data['nama_kost'] ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile ?>
                    </div>

                    <div class="swiper-pagination swiper-pagination-line mb-3"></div>
                </div>
            </div>

            <!-- Right -->
            <div class="col-sm-10 col-lg-5 d-flex m-auto vh-100">
                <div class="row w-100 m-auto">
                    <div class="col-lg-10 my-5 m-auto">

                        <div class="row text-center mb-5">
                            <a href="index.php"><img width="350px" src="admin/img/logo_indekost.svg" alt="logo"></a>
                        </div>

                        <h2 class="mb-0">Daftar Sekarang</h2>
                        <p class="mb-0">Daftar untuk login!</p>

                        <form action="" method="post" class="mt-4">
                            <div class="input-floating-label form-floating mb-4">
                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>

                            <div class="input-floating-label form-floating position-relative mb-4">
                                <input type="text" name="nama_pengguna" class="form-control fakepassword pe-6" id="nama_pengguna" placeholder="Nama Lengkap">
                                <label for="floatingInput">Nama Lengkap</label>
                            </div>

                            <div class="input-floating-label form-floating position-relative mb-4">
                                <input type="text" name="username" class="form-control fakepassword pe-6" id="username" placeholder="Username">
                                <label for="floatingInput">Username</label>
                            </div>

                            <div class="input-floating-label form-floating position-relative mb-4">
                                <input type="password" name="password" class="form-control fakepassword pe-6" id="passwrod" placeholder="Enter your password">
                                <label for="floatingInput">Password</label>
                                <span class="position-absolute top-50 end-0 translate-middle-y p-0 me-2">
                                    <i class="fakepasswordicon fas fa-eye-slash cursor-pointer p-2"></i>
                                </span>
                            </div>

                            <div class="align-items-center mt-0">
                                <div class="d-grid">
                                    <button class="btn btn-dark mb-0" type="submit">Daftar</button>
                                </div>
                            </div>
                        </form>

                        <div class="mt-4 text-center">
                            <span>Sudah daftar?<a href="user_login.php"> masuk di sini!</a></span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="back-top"></div>

    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendor/pswmeter/pswmeter.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <script src="assets/js/functions.js"></script>

</body>

</html>