<?php
include '../koneksi.php';

$id = $_POST['id_kost'];
$nama = $_POST['nama_wisata'];
$alamat = $_POST['alamat'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

mysqli_query($koneksi, "update kost set nama_kost='$nama', alamat='$alamat', deskripsi='$deskripsi', harga='$harga', latitude='$latitude', longitude='$longitude' where id='$id'");

header("location:tampil_data.php");
