<?php
include '../koneksi.php';

$id = $_POST['id_wisata'];
$nama = $_POST['nama_wisata'];
$alamat = $_POST['alamat'];
$deskripsi = $_POST['deskripsi'];
$harga_tiket = $_POST['harga_tiket'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

mysqli_query($koneksi, "update wisata set nama_wisata='$nama', alamat='$alamat', deskripsi='$deskripsi', harga_tiket='$harga_tiket', latitude='$latitude', longitude='$longitude' where id_wisata='$id'");

header("location:tampil_data.php");
