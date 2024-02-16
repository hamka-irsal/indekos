<?php include "header.php"; ?>
<!-- start banner Area -->
<!-- Start about-info Area -->
<section class="about-info-area section-gap">
  <div class="container">
  <h2 style="text-align: center;">Form Rating Indekos</h2>
<br>
    <form action="submit_rating.php" method="post" style="margin-left:450px;">
        <label for="indekos_id"><b>Pilih Indekos:</b></label>
        <select name="indekos_id" id="indekos_id">
            <?php
            // Koneksi ke database
            $conn = new mysqli("localhost", "root", "", "sig_map4");

            // Periksa koneksi
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Ambil data indekos dari database
            $result = $conn->query("SELECT * FROM wisata");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id_wisata'] . "'>" . $row['nama_wisata'] . "</option>";
            }

            // Tutup koneksi
            $conn->close();
            ?>
        </select>

        <br>

        <label for="nama"><b>Nama Pengguna:</b></label><br>
        <input type="text" name="nama" id="nama" required>
        <br><br>
        <label for="rating"><b>Beri Rating (1-5):</b></label><br>
        <input type="number" name="rating" id="rating" min="1" max="5" required>
        <br><br>
        <label for="ulasan"><b>Ulasan Pengguna:</b></label><br>
        <textarea name="ulasan" id="ulasan" cols="30" rows="10"></textarea>
        <br>

        <input type="submit" value="Submit Rating">
    </form>
</section>
<!-- End about-info Area -->
<?php include "footer.php"; ?>