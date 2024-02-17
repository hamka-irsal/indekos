<?php

include '../koneksi.php';

$nama = $_POST['nama_wisata'];
$alamat = $_POST['alamat'];
$deskripsi = $_POST['deskripsi'];
$harga_tiket = $_POST['harga_tiket'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

mysqli_query($koneksi, "insert into wisata (nama_wisata,alamat,deskripsi,harga_tiket,latitude,longitude) values('$nama','$alamat','$deskripsi','$harga_tiket','$latitude','$longitude')");

header("location:tampil_data.php");
