<?php 
include_once "header.php"; 
include_once "koneksi.php";
?>

<!-- start banner Area -->
<!-- Start about-info Area -->
<section class="about-info-area section-gap">
  <div class="container">
  <h2 style="text-align: center;">List Rekomendasi Indekos</h2>
<br>
<?php
// Include Koneksi
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

$limit = 5; // Jumlah data per halaman
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Halaman saat ini
$start = ($page - 1) * $limit; // Mengambil nilai OFFSET berdasarkan halaman

$sql = "SELECT * FROM wisata JOIN rating ORDER BY RAND() LIMIT $limit OFFSET $start";
$result = $koneksi->query($sql);
?>

<table class="table table-bordered mx-auto text-center">
        <thead>
            <tr>
                <th scope="col">Nama Indekos</th>
                <th scope="col">Nama</th>
                <th scope="col">Rating</th>
                <th scope="col">Ulasan</th>
            </tr>
        </thead>
        <tbody>
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
        </tbody>
    </table>
</section>
<!-- End about-info Area -->
<?php include "footer.php"; ?>