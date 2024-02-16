<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "db_kost");

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form
$indekos_id = $_POST['indekos_id'];
$rating = $_POST['rating'];
$nama = $_POST['nama'];
$ulasan = $_POST['ulasan'];

// Simpan rating ke database
$sql = "INSERT INTO rating (indekos_id, rating, nama, ulasan) VALUES ('$indekos_id', '$rating', '$nama', '$ulasan')";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Berhasil Beri Rating!');  window.history.go(-2);</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
// Tutup koneksi
$conn->close();
?>
