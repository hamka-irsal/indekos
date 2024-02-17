<?php

include '../koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama_pengguna'];
$username = $_POST['username'];
$password = $_POST['password'];

if ($password) {
    mysqli_query($koneksi, "update admin set nama='$nama', username='$username', password='$password' where id='$id'");
} else {
    mysqli_query($koneksi, "update admin set nama='$nama', username='$username' where id='$id'");
}

header("location:index.php");
