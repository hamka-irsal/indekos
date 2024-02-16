<?php include "header.php"; ?>

<!-- start banner Area -->
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

        <div class="row align-items-center" style="margin-left: 95px;">

          <div id="map" style="width: 950px; height: 400px;"></div>
                  <script>
                    var map = L.map('map').setView([-5.087979859148326, 119.4928552479124], 5);

                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);

                    L.marker([-5.087979859148326, 119.4928552479124]).addTo(map)
                      .bindPopup('A pretty CSS popup.<br> Easily customizable.')
                      .openPopup();
                  </script>
                  <?php
                  $data = file_get_contents('http://localhost/SIG-WISATA/ambildata.php');
                  $no = 1;
                  if (json_decode($data, true)) {
                    $obj = json_decode($data);
                    foreach ($obj->results as $item) {
                  ?>[<?php echo $item->id_wisata ?>, '<?php echo $item->nama_wisata ?>', '<?php echo $item->alamat ?>', <?php echo $item->longitude ?>, <?php echo $item->latitude ?>],
              <?php
                    }
                  }
            ?>
        </div>
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
      </section><!-- End Counts Section -->
      <<<<<<< HEAD <!--=======Cta Section=======-->
        <section id="cta" class="cta">
          <div class="container">

            <div class="text-center" data-aos="zoom-in">
              <h3>SIG</h3>
              <p> Detail sekolah menengah negeri di Surabaya</p>
              <a class="cta-btn" href="#portfolio">Lihat Detail</a>
            </div>

          </div>
        </section><!-- End Cta Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
          <div class="container">
            <div class="text-center" data-aos="zoom-in">
              <h3 style="font-weight: bold; text-transform: uppercase;">Peta</h3>
            </div>
            <div class="panel-body" style="align-content: center;">
              <div id="map" style="width:100%;height:480px;"></div>
              <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAh0M3vKIhVO26dTSA_UMx-x2dl1JKlanb"></script>

              <script type="text/javascript">
                function initialize() {

                  var mapOptions = {
                    zoom: 12.5,
                    center: new google.maps.LatLng(-7.261184839447646, 112.74293031897085),
                    disableDefaultUI: false
                  };

                  var mapElement = document.getElementById('map');

                  var map = new google.maps.Map(mapElement, mapOptions);

                  setMarkers(map, officeLocations);

                }

                var officeLocations = [
                  <?php
                  $data = file_get_contents('http://localhost:8080/sig-sma/ambildata.php');
                  $no = 1;
                  if (json_decode($data, true)) {
                    $obj = json_decode($data);
                    foreach ($obj->results as $item) {
                  ?>[<?php echo $item->id_instansi ?>, '<?php echo $item->nama_instansi ?>', '<?php echo $item->alamat ?>', <?php echo $item->longitude ?>, <?php echo $item->latitude ?>],
                  <?php
                    }
                  }
                  ?>
                ];

                function setMarkers(map, locations) {
                  var globalPin = 'img/marker.png';

                  for (var i = 0; i < locations.length; i++) {

                    var office = locations[i];
                    var myLatLng = new google.maps.LatLng(office[4], office[3]);
                    var infowindow = new google.maps.InfoWindow({
                      content: contentString
                    });

                    var contentString =
                      '<div id="content">' +
                      '<div id="siteNotice">' +
                      '</div>' +
                      '<h5 id="firstHeading" class="firstHeading">' + office[1] + '</h5>' +
                      '<div id="bodyContent">' +
                      '<a href=detail.php?id=' + office[0] + '>Info Detail</a>' +
                      '</div>' +
                      '</div>';

                    var marker = new google.maps.Marker({
                      position: myLatLng,
                      map: map,
                      title: office[1],
                      icon: 'img/marker.png'
                    });

                    google.maps.event.addListener(marker, 'click', getInfoCallback(map, contentString));
                  }
                }

                function getInfoCallback(map, content) {
                  var infowindow = new google.maps.InfoWindow({
                    content: content
                  });
                  return function() {
                    infowindow.setContent(content);
                    infowindow.open(map, this);
                  };
                }

                initialize();
              </script>
            </div>

          </div>
        </section><!-- End Services Section -->

        <!-- ======= Contact Section ======= -->
        <section id="portfolio" class="contact">
          <div class="container">
            <div class="row">
              <div class="col-lg-3" data-aos="fade-right">
                <div class="section-title">
                  <h2>Data SMA SMK</h2>
                  <p>Halaman ini memuat informasi SMA dan SMA di Surabaya. </p>
                </div>
              </div>

              <div class="col-lg-9" data-aos="fade-up" data-aos-delay="100">

                <div class="col-md-12">
                  <div class="panel panel-info panel-dashboard">
                    <div class="panel-heading centered">
                      <h2 class="panel-title"><strong> - <?php echo 'Informasi instansi' ?> - </strong></h2>
                    </div>
                    <div class="panel-body">
                      <table class="table table-bordered table-striped table-admin">
                        <thead>
                          <tr>
                            <th width="5%">No.</th>
                            <th width="30%">Nama Sekolah</th>
                            <th width="10%">NPSN</th>
                            <th width="30%">Alamat</th>
                            <th width="20%">Website</th>
                            <th width="20%">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $data = file_get_contents('http://localhost:8080/sig-sma/ambildata.php');
                          $no = 1;
                          if (json_decode($data, true)) {
                            $obj = json_decode($data);
                            foreach ($obj->results as $item) {
                          ?>
                              <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $item->nama_instansi; ?></td>
                                <td><?php echo $item->NPSN; ?></td>
                                <td><?php echo $item->alamat; ?></td>
                                <td><a href="https://<?php echo $item->website; ?>" target="_blank"><?php echo $item->website; ?></a></td>
                                <td class="ctr">
                                  <div class="btn-group">
                                    <a href="detail.php?id=<?php echo $item->id_instansi; ?>" rel="tooltip" data-original-title="Lihat File" data-placement="top" class="btn btn-primary">
                                      <i class="fa fa-map-marker"> </i> Detail dan Lokasi</a>&nbsp;
                                  </div>
                                </td>
                              </tr>
                          <?php $no++;
                            }
                          } else {
                            echo "data tidak ada.";
                          } ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>

          </div>
        </section><!-- End Contact Section -->

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
    =======
    >>>>>>> dd12fc6 (first commit)
  </div>
  </section>
  <!-- End testimonial Area -->


  <?php include "footer.php"; ?>