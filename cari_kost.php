<?php

require_once './admin/config/connection.php';

$koneksi = new Connection();
$query = "SELECT * FROM kost ORDER BY id DESC";
$result = mysqli_query($koneksi->conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<?php include('./layouts/base.php') ?>

<body>

    <?php include('./components/header.php') ?>

    <main>
        <section class="pt-8">
            <div class="container">
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
                        Cari Kost Kamu Sekarang!
                    </h1>

                    <form class="col-md-7 bg-light border rounded-2 position-relative mx-auto p-2 mt-4 mt-md-5">
                        <div class="input-group">
                            <input class="form-control focus-shadow-none bg-light border-0 me-1" type="text" placeholder="Cari Kost Sekarang">
                            <button type="button" class="btn btn-dark rounded-2 mb-0"><i class="bi bi-search me-2"></i>Cari Kost</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section class="pt-0">
            <div class="container">

                <div class="row g-4 g-sm-5 g-xl-7 mt-0">

                    <?php while ($data = mysqli_fetch_array($result)) : ?>
                        <div class="col-md-6 col-lg-4">
                            <article class="card bg-transparent h-100 p-0">
                                <div class="badge text-bg-dark position-absolute top-0 start-0 m-3">Diswakan</div>
                                <?php if ($data['image']) : ?>
                                    <img src="admin/upload/<?= $data['image'] ?>" class="card-img" alt="Blog-img">
                                <?php else : ?>
                                    <img src="aset/images/blog/4by3/03.jpg" class="card-img" alt="Blog-img">
                                <?php endif ?>
                                <div class="card-body px-2 pb-4">
                                    <h6 class="card-title mb-2"><a href="#"><?= $data['nama_kost'] ?></a></h6>
                                    <p class="small mb-0"><?= $data['deskripsi'] ?></p>
                                </div>
                                <div class="card-footer bg-transparent d-flex justify-content-between px-2 py-0">
                                    <a class="icon-link icon-link-hover stretched-link" href="detail_kost.php?id=<?= $data['id'] ?>">Lihat Kost<i class="bi bi-arrow-right"></i> </a>
                                </div>
                            </article>
                        </div>
                    <?php endwhile ?>

                </div>
                <div class="row mt-7">
                    <div class="col-12 mx-auto">

                    </div>
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