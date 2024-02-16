<?php include "header.php"; ?>
<!-- start banner Area -->
<!-- Start about-info Area -->
<section class="about-info-area section-gap">
  <div class="container">
  <h2 style="text-align: center;">List Rekomendasi Indekos</h2>
<br>
<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "sig_map4");

// Fungsi untuk mendapatkan rekomendasi indekos
function getRekomendasi($pengguna) {
    global $koneksi;

    // Ambil preferensi pengguna
    $query = "SELECT indekos_id, rating FROM rating WHERE nama = $pengguna";
    $result = mysqli_query($koneksi, $query);

    $preferensiPengguna = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $preferensiPengguna[$row['indekos_id']] = $row['rating'];
    }

    // Cari indekos yang mirip
    $query = "SELECT nama, indekos_id, rating FROM rating WHERE nama = $pengguna";
    $result = mysqli_query($koneksi, $query);

    $rekomendasi = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $similarity = hitungSimilarity($preferensiPengguna, $row['nama']);
        $rekomendasi[$row['indekos_id']] += $similarity * $row['rating'];
    }

    // Sort dan kembalikan rekomendasi
    arsort($rekomendasi);
    return $rekomendasi;
}

// Fungsi untuk menghitung similarity antara dua pengguna
function hitungSimilarity($pengguna1, $pengguna2) {
    // Implementasi similarity metric yang sesuai dengan kebutuhan Anda
    // Contoh: Cosine similarity
    $dotProduct = 0;
    $magnitude1 = 0;
    $magnitude2 = 0;

    foreach ($pengguna1 as $indekosId => $rating) {
        if (isset($pengguna2[$indekosId])) {
            $dotProduct += $rating * $pengguna2[$indekosId];
        }
        $magnitude1 += pow($rating, 2);
    }

    foreach ($pengguna2 as $rating) {
        $magnitude2 += pow($rating, 2);
    }

    if ($magnitude1 == 0 || $magnitude2 == 0) {
        return 0;
    }

    return $dotProduct / (sqrt($magnitude1) * sqrt($magnitude2));
}

// Contoh penggunaan
$pengguna = 1;
$rekomendasi = getRekomendasi($pengguna);

// Tampilkan rekomendasi
foreach ($rekomendasi as $indekosId => $score) {
    echo "Indekos ID: $indekosId, Score: $score <br>";
}

$conn = new mysqli("localhost", "root", "", "sig_map4");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM wisata JOIN rating ORDER BY RAND() LIMIT 5";
$result = $conn->query($sql);
?>

<!-- <h2>Rekomendasi Indekos</h2> -->
    <center>
<table border="1" >
        <tr>
            <th>Nama Indekos</th>
            <th>Nama</th>
            <th>Rating</th>
            <th>Ulasan</th>
        </tr>
        <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['nama_wisata']}</td>";
                echo "<td>{$row['nama']}</td>";
                echo "<td>{$row['rating']}</td>";
                echo "<td>{$row['ulasan']}</td>";
                echo "</tr>";
            }
        ?>
    </table>
    </center>
</section>
<!-- End about-info Area -->
<?php include "footer.php"; ?>