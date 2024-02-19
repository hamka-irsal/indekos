<?php

require_once './admin/config/connection.php';
require_once './function/rating.php';

$koneksi = new Connection();
$query = "SELECT k.*
FROM kost k
INNER JOIN (
    SELECT kost_id, MAX(rating) AS max_rating
    FROM recomendations
    GROUP BY kost_id
) r ON k.id = r.kost_id
ORDER BY r.max_rating DESC";

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
                        Rekomendasi Indekost, Untuk Kamu
                    </h1>
                </div>
            </div>
        </section>

        <section class="pt-0 ">
            <div class="container" id="output">
                <div class="row g-xl-7 justify-content-center">
                    <div class="col-lg-8">

                        <?php while ($data = mysqli_fetch_array($result)) : ?>

                            <?php
                            $ratings = new Rating();

                            $rating = $ratings->getRating($data['id']);

                            $avarageRating =  $rating['avarage'];
                            $avarageFloor = $rating['floor'];
                            $totalRating = $rating['total'];
                            ?>

                            <article class="card card-hover-shadow border p-3 mb-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <?php if (isset($data['image'])) : ?>
                                            <img style="height: 230px; object-fit: cover" src="admin/upload/<?= $data['image'] ?>" class="img-fluid card-img" alt="blog-img">
                                        <?php else : ?>
                                            <img src="aset/images/blog/4by4/06.jpg" class="img-fluid card-img" alt="blog-img">
                                        <?php endif ?>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body d-flex flex-column h-100 ps-0 pe-3">
                                            <div><span class="badge text-bg-dark mb-3">Disewakan</span></div>
                                            <h5 class="card-title mb-3 mb-md-0"><?= $data['nama_kost'] ?></h5>
                                            <p class="small mb-2"><?= $data['alamat'] ?> 📌</p>

                                            <div class="d-flex align-items-center flex-wrap mb-2">
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

                                                    <li class="list-inline-item me-0 heading-color fw-normal">(<?= $avarageRating ?>) <small class="ms-2">dari <?= $totalRating ?> user</small></li>

                                                </ul>
                                            </div>

                                            <p class="small mb-0"><?= $data['deskripsi'] ?></p>
                                            <div class="d-sm-flex justify-content-between align-items-center mt-auto mt-2">
                                                <a class="icon-link icon-link-hover stretched-link mt-2" href="detail_kost.php?id=<?= $data['id'] ?>">Lihat Kost<i class="bi bi-arrow-right"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        <?php endwhile ?>
                    </div>
                </div>
            </div>

            <div class="row mt-7">
                <div class="col-12 mx-auto d-flex justify-content-center">
                    <a href="" id="load_more" class="btn btn-primary mb-0">Load More</a>
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

    <script src="js/jquery.js"></script>

    <script>
        $(document).ready(function() {
            // load more
            const limit = 10;
            let start = 0;

            $("#load_more").click((e) => {
                e.preventDefault();

                start = start + limit;

                $.ajax({
                    url: `load/load_recomendation.php`,
                    method: 'GET',
                    data: {
                        limit: limit,
                        start: start,
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