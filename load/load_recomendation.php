<?php

require '../koneksi.php';

if (isset($_GET['limit']) && isset($_GET['start'])) {
    $limit = $_GET['limit'];
    $start = $_GET['start'];

    $query = "SELECT k.*
            FROM kost k
            INNER JOIN (
                SELECT kost_id, MAX(rating) AS max_rating
                FROM recomendations
                GROUP BY kost_id
            ) r ON k.id = r.kost_id
            ORDER BY r.max_rating DESC LIMIT $start";
}

$result = mysqli_query($koneksi, $query);

?>

<div class="row g-xl-7 justify-content-center">
    <div class="col-lg-8">

        <?php while ($data = mysqli_fetch_array($result)) : ?>
            <article class="card card-hover-shadow border p-3 mb-4">
                <div class="row">
                    <div class="col-md-4">
                        <?php if (isset($data['image'])) : ?>
                            <img style="height: 200px; object-fit: cover" src="admin/upload/<?= $data['image'] ?>" class="img-fluid card-img" alt="blog-img">
                        <?php else : ?>
                            <img src="aset/images/blog/4by4/06.jpg" class="img-fluid card-img" alt="blog-img">
                        <?php endif ?>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body d-flex flex-column h-100 ps-0 pe-3">
                            <div><span class="badge text-bg-dark mb-3">Disewakan</span></div>
                            <h5 class="card-title mb-3 mb-md-0"><?= $data['nama_kost'] ?></h5>
                            <p class="small mb-2"><?= $data['alamat'] ?> 📌</p>
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