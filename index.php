<?php include "header.php"; ?>
<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_kost";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Ambil data wisata dari database
$query = "SELECT * FROM wisata";
$result = mysqli_query($conn, $query);

$DataLongLat = array();

while ($d = mysqli_fetch_array($result)) {
  $DataLongLat[] = array(
    'latitude' => $d['latitude'],
    'longitude' => $d['longitude'],
    'nama_kost' => $d['nama_wisata']
  );
}
mysqli_close($conn);
?>

<section class="banner-area relative">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row fullscreen align-items-center justify-content-between">
      <div class="col-lg-6 col-md-6 banner-left">
        <h6 class="text-white">SISTEM REKOMENDASI PENCARIAN INDEKOS</h6>
        <h1 class="text-white">KECAMATAN TAMALANREA</h1>
        <p class="text-white">
          Sistem ini merupakan aplikasi rekomendasi pencarian tempat indekos di wilayah Tamalanrea Kota Makassar. Aplikasi ini memuat informasi, lokasi dan rekomendasi indekos di Kecamatan Tamalanrea.
        </p>
        <a href="#peta_wisata" class="primary-btn text-uppercase">Lihat Detail</a>
      </div>

    </div>
  </div>
  </div>
</section>
<!-- End banner Area -->


<main id="main">

  <!-- Start about-info Area -->
  <section class="price-area section-gap">

    <section id="peta_wisata" class="about-info-area section-gap">
      <div class="container">

        <div class="title text-center">
          <h1 class="mb-10">Peta Lokasi Indekos</h1>
          <br>
        </div>

        <div id="map" style="width:   1050px; height: 500px;"></div>
        <script>
          var map = L.map('map').setView([0, 0], 6); // Pusat peta di tengah dunia dengan zoom level  4

          // Tambahkan layer OpenStreetMap
          L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          }).addTo(map);

          // Buat array untuk menyimpan marker
          var markers = [];

          <?php foreach ($DataLongLat as $location) : ?>
            var nama_kost = "<?php echo $location['nama_kost']; ?>"
            var datLongLat = [<?php echo $location['latitude']; ?>, <?php echo $location['longitude']; ?>];
            var marker = L.marker(datLongLat).addTo(map)
              .bindPopup(nama_kost)
              .openPopup();
            // Tambahkan marker ke array
            markers.push({
              id: nama_kost, // Gunakan nama kost sebagai id unik
              marker: marker
            });
            // Fokus peta ke posisi marker
            map.setView(datLongLat, 13); // Anda dapat mengubah zoom level sesuai kebutuhan
          <?php endforeach; ?>
        </script>
      
      </div> <!-- ======= Counts Section ======= -->
      <section id="counts">
        <div class="container">
          <div class="title text-center">
            <h1 class="mb-10">Jumlah Tempat Indekos</h1>
            <br>
          </div>
          <div class="row d-flex justify-content-center">


            <?php
            include_once "countsma.php";
            $obj = json_decode($data);
            $sman = "";
            foreach ($obj->results as $item) {
              $sman .= $item->sma;
            }
            ?>

            <div class="text-center">
              <h1><span data-toggle="counter-up"><?php echo $sman; ?></span></h1>
              <br>
            </div>
            <?php
            include_once "countsmk.php";
            $obj2 = json_decode($data);
            $smkn = "";
            foreach ($obj2->results as $item2) {
              $smkn .= $item2->smk;
            }
            ?>

          </div>

        </div>
        <section id="cta" class="cta">
          <div class="container">

            <div class="text-center" data-aos="zoom-in">
              <h3>Data KOST</h3>
              <p>Lihat Daftar Kost Yang Terdaftar Di App IndeKos Kami</p>
              <a class="cta-btn" href="data_kost.php">Lihat Daftar</a>
            </div>

          </div>
        </section><!-- End Cta Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
          <div class="container">
            <div class="row">
              <div class="col-lg-4" data-aos="fade-right">
                <div class="section-title">
                  <h2>Kontak Kami</h2>
                  <p>Halaman ini memuat informasi pengembang serta masukan kritik dan saran dari pengguna apabila ditemukan masalah. </p>
                </div>
              </div>

              <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">

                <!-- <iframe style="border:0; width: 100%; height: 270px;" id="map-canvas"></iframe> -->
                <div class="info mt-4">
                  <i class="icofont-google-map"></i>
                  <h4>Lokasi:</h4>
                  <p>Jl. Ketintang, Ketintang, Kec. Gayungan, Kota SBY, Indonesia 60231</p>
                </div>
                <div class="row">
                  <div class="col-lg-6 mt-4">
                    <div class="info">
                      <i class="icofont-envelope"></i>
                      <h4>Email:</h4>
                      <p>info@sigsma.com</p>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="info w-100 mt-4">
                      <i class="icofont-phone"></i>
                      <h4>Telepon:</h4>
                      <p>+62 895 0987 6543</p>
                    </div>
                  </div>
                </div>

                <form action="forms/contact.php" method="post" role="form" class="php-email-form mt-4">
                  <div class="form-row">
                    <div class="col-md-6 form-group">
                      <input type="text" name="name" class="form-control" id="name" placeholder="Nama anda" data-rule="minlen:4" data-msg="Masukkan sedikitnya 4 karakter" />
                      <div class="validate"></div>
                    </div>
                    <div class="col-md-6 form-group">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email anda" data-rule="email" data-msg="Masukkan email yang valid" />
                      <div class="validate"></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subjek" data-rule="minlen:4" data-msg="Masukkan setidaknya 8 karakter" />
                    <div class="validate"></div>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Masukkan pesan untuk kami" placeholder="Pesan"></textarea>
                    <div class="validate"></div>
                  </div>
                  <div class="mb-3">
                    <div class="loading">Memuat</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Pesan anda telah terkirim. Terimakasih!</div>
                  </div>
                  <div class="text-center"><button type="submit">Kirim pesan</button></div>
                </form>
              </div>
            </div>

          </div>
        </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-contact">
          <h3>SIG</h3>
          <p>
            Jl. Ketintang, Ketintang <br>
            Gayungan, SBY 60231<br>
            Indonesia <br><br>
            <strong>Phone:</strong> +62 895 0987 6543<br>
            <strong>Email:</strong> info@sigsma.com<br>
          </p>
        </div>

        <div class="col-lg-2 col-md-6 footer-links">
          <h4>Link bantuan</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Maps</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Data</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">SMA Negeri</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">SMK Negeri</a></li>
            <!-- <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li> -->
          </ul>
        </div>

        <div class="col-lg-4 col-md-6 footer-newsletter">
          <h4>Ikuti info terbaru</h4>
          <p>Subscribe email</p>
          <form action="" method="post">
            <input type="email" name="email"><input type="submit" value="Subscribe">
          </form>
        </div>

      </div>
    </div>
  </div>

  </section>
  <!-- End testimonial Area -->


  <?php include "footer.php"; ?>