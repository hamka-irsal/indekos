<?php include "header.php"; ?>
<?php
$id = $_GET['id_wisata'];
include_once "ambildata_id.php";
$obj = json_decode($data);
$id_wisata = "";
$nama_kost = "";
$alamat = "";
$deskripsi = "";
$harga_tiket = "";
$lat = "";
$long = "";
foreach ($obj->results as $item) {
  $id_wisata .= $item->id_wisata;
  $nama_kost .= $item->nama_wisata;
  $alamat .= $item->alamat;
  $deskripsi .= $item->deskripsi;
  $harga_tiket .= $item->harga_tiket;
  $lat .= $item->latitude;
  $long .= $item->longitude;
}

?>
<!-- start banner Area -->
<section class="about-banner relative">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          Detail Informasi Indekos
        </h1>

      </div>
    </div>
  </div>
</section>
<!-- End banner Area -->
<!-- Start about-info Area -->
<section class="about-info-area section-gap">
  <div class="container" style="padding-top: 120px;">
    <div class="row">

      <div class="col-md-7" data-aos="fade-up" data-aos-delay="200">
        <div class="panel panel-info panel-dashboard">
          <div class="panel-heading centered">
            <h2 class="panel-title"><strong>Informasi Indekos </strong></h4>
          </div>
          <div class="panel-body">
            <table class="table">
              <tr>
                <!-- <th>Item</th> -->
                <th>Detail</th>
              </tr>
              <tr>
                <td>Nama Kost</td>
                <td>
                  <h5><?php echo $nama_kost ?></h5>
                </td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>
                  <h5><?php echo $alamat ?></h5>
                </td>
              </tr>
              <tr>
                <td>Deskripsi</td>
                <td>
                  <h5><?php echo $deskripsi ?></h5>
                </td>
              </tr>
              <tr>
                <td>Harga</td>
                <td>
                  <h5>Rp. <?php echo $harga_tiket ?></h5>
                </td>
              </tr>
            </table>
            <div>
              <a href="rating.php">
                <h4>Beri Rating</h4>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-5" data-aos="zoom-in">
        <div class="panel panel-info panel-dashboard">
          <div class="panel-body">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong>Lokasi</strong></h4>
            </div>
            <div id="map" style="width:100%;height:380px;">

              <div class="row align-items-center" style="margin-left: 95px;">
                <script>
                  let name = "<?php echo $nama_kost ?>";
                  let DataLongLat = [<?php echo $lat; ?>, <?php echo $long; ?>];
                  let map = L.map('map').setView(DataLongLat, 17);
                  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
                  L.marker(DataLongLat).addTo(map)
                    .bindPopup(name)
                    .openPopup();
                </script>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>
<!-- End about-info Area -->
<?php include "footer.php"; ?>