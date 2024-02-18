<?php
include '../koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi, "delete from kost where id='$id'");
if ($query) {
    echo "<script>alert('Data Berhasil Dihapus!'); window.location = 'tampil_data.php'</script>";
} else {
    echo "<script>alert('Data Gagal Dihapus!'); window.location = 'tampil_data.php'</script>";
}
