<?php

require '../koneksi.php';

if (isset($_GET['limit']) && isset($_GET['start'])) {
    $limit = $_GET['limit'];
    $start = $_GET['start'];

    $query = "SELECT * FROM kost LIMIT $start";
}

$result = mysqli_query($koneksi, $query);

?>

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
                    <p class="small mb-2"><?= $data['alamat'] ?> 📌</p>
                    <p class="small mb-0"><?= $data['deskripsi'] ?></p>
                </div>
                <div class="card-footer bg-transparent d-flex justify-content-between px-2 py-0 mt-2">
                    <a class="icon-link icon-link-hover stretched-link" href="detail_kost.php?id=<?= $data['id'] ?>">Lihat Kost<i class="bi bi-arrow-right"></i> </a>
                </div>
            </article>
        </div>
    <?php endwhile ?>
</div>