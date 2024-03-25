<?php
include '../koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi, "select avatar from users where id='$id'");
$data = mysqli_fetch_array($query);

if ($data['avatar']) {
    unlink('upload/' . $data['avatar']);
}

$query = mysqli_query($koneksi, "delete from users where id='$id'");

if ($query) {
    echo "<script>alert('Data Berhasil Dihapus!'); window.location = 'tampil_data_pengguna.php'</script>";
} else {
    echo "<script>alert('Data Gagal Dihapus!'); window.location = 'tampil_data_pengguna.php'</script>";
}
