<?php

include '../koneksi.php';

$nama = $_POST['nama_pengguna'];
$username = $_POST['username'];
$password = $_POST['password'];

mysqli_query($koneksi, "insert into admin (nama,username, password) values('$nama','$username','$password')");

header("location:tampil_data_pengguna.php");
