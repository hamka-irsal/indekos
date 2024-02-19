<?php

require_once './admin/config/connection.php';

$koneksi = new Connection();
$query = "SELECT * FROM kost ORDER BY id DESC LIMIT 6";
$result = mysqli_query($koneksi->conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<?php include('./layouts/base.php') ?>

<body>
  <?php include('./components/header.php') ?>

  <main>
    <section class="position-relative overflow-hidden pb-0 pt-xl-9 mb-5">
      <div class="position-absolute top-0 start-0 ms-n7 d-none d-xl-block">
        <img src="aset/images/elements/decoration-pattern.svg" alt="">
      </div>

      <?php include('./components/figure/figureOne.php') ?>

      <div class="container pt-4 pt-sm-5">
        <div class="row g-xl-5">
          <div class="col-xl-7 mb-5 mb-xl-0">
            <div class="pe-xxl-4">
              <span class="heading-color d-inline-block bg-light small rounded-3 px-3 py-2">🤩 Cari kost dengan mudah dengan indekost</span>

              <h1 class="mt-3 lh-base">Sistem Pencarian Kost Kec.Tamanlanrea
                <span class="cd-headline clip big-clip is-full-width text-primary mb-0 d-block d-xxl-inline-block">
                  <span class="typed" data-type-text="Indekost&&Cari Kost&&Kost Murah&&Kost Kec Tamanlanrea"></span>
                </span>
              </h1>
              <p class="mb-0 mt-4 mt-md-5">Website ini menyediakan pencarian kost untuk kecamatan tamanlanrea, cocok buat kalian yang ingin mencari kost murah dan nyaman!</p>
            </div>
          </div>

          <div class="col-md-10 col-xl-5 position-relative mx-auto mt-7 mt-xl-0">

            <?php include('./components/figure/figureTwo.php') ?>

            <img src="aset/images/bg/01.jpg" class="rounded" alt="hero-img">

          </div>
        </div>
      </div>
    </section>


    <section class="pt-0 mt-5">
      <div class="container">

        <div class="d-lg-flex justify-content-between align-items-center">
          <h4 class="mb-3 mb-lg-0">Kost Teratas</h4>
        </div>

        <div class="row g-4 g-sm-5 g-xl-7 mt-0">

          <?php while ($data = mysqli_fetch_array($result)) : ?>
            <div class="col-md-6 col-lg-4">
              <article class="card bg-transparent h-100 p-0">
                <div class="badge text-bg-dark position-absolute top-0 start-0 m-3">Diswakan</div>

                <?php if (isset($data['image'])) : ?>
                  <img style="height: 240px; object-fit: cover" src="admin/upload/<?= $data['image'] ?>" class="card-img" alt="Blog-img">
                <?php else : ?>
                  <img src="aset/images/blog/4by3/03.jpg" class="card-img" alt="Blog-img">
                <?php endif ?>

                <div class="card-body px-2 pb-4">
                  <h6 class="card-title mb-2"><a href="#"><?= $data['nama_kost'] ?></a></h6>
                  <p class="small mb-0"><?= $data['deskripsi'] ?></p>
                </div>
                <div class="card-footer bg-transparent d-flex justify-content-between px-2 py-0">
                  <a class="icon-link icon-link-hover stretched-link" href="blog-single-v1.html">Lihat Kost<i class="bi bi-arrow-right"></i> </a>
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

  <!-- Back to top -->
  <div class="back-top"></div>

  <!-- Bootstrap JS -->
  <script src="aset/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!--Vendors-->
  <script src="aset/vendor/ityped/index.js"></script>
  <script src="aset/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Theme Functions -->
  <script src="aset/js/functions.js"></script>

</body>

</html>