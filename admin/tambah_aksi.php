<?php

require_once './helpers/Ryoogen.php';
include '../koneksi.php';

$nama = $_POST['nama_wisata'];
$alamat = $_POST['alamat'];
$gambar = $_FILES['gambar'];
$deskripsi = $_POST['deskripsi'];
$harga_tiket = $_POST['harga_tiket'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

$query = mysqli_query($koneksi, "select image from kost where id='$id'");
$imageOld = mysqli_fetch_array($query);

if ($imageOld['image']) {
    unlink('upload/' . $imageOld['image']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($gambar)) {
        $upload = Helpers::upload($gambar);

        if (in_array($upload['type'], $upload['allowed'])) {
            $image = md5(time() . $upload['name']);

            if (file_exists("upload/" . $image)) {
                echo $image . " is already exists.";
            } else {
                if (move_uploaded_file($gambar["tmp_name"], "upload/" . $image)) {
                    mysqli_query($koneksi, "insert into kost (nama_kost,alamat,deskripsi,harga,latitude,longitude, image) values('$nama','$alamat','$deskripsi','$harga_tiket','$latitude','$longitude','$image')");
                    header("location:tampil_data.php");
                } else {
                    echo "File is not uploaded";
                }
            }
        } else {
            echo "Error: There was a problem uploading your file. Please try again.";
        }
    } else {
        mysqli_query($koneksi, "insert into kost (nama_kost,alamat,deskripsi,harga,latitude,longitude) values('$nama','$alamat','$deskripsi','$harga_tiket','$latitude','$longitude')");
        header("location:tampil_data.php");
    }
} else {
    header("location:tampil_data.php");
}

header("location:tampil_data.php");
