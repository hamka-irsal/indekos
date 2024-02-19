<?php

require_once './helpers/Ryoogen.php';
include '../koneksi.php';

$id = $_POST['id_kost'];
$nama = $_POST['nama_wisata'];
$alamat = $_POST['alamat'];
$deskripsi = $_POST['deskripsi'];
$gambar = $_FILES['gambar'];
$harga = $_POST['harga'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($gambar)) {
        $upload = Helpers::upload($gambar);

        if (in_array($upload['type'], $upload['allowed'])) {
            $image = md5(time() . $upload['name']);

            if (file_exists("upload/" . $image)) {
                echo $image . " is already exists.";
            } else {
                if (move_uploaded_file($gambar["tmp_name"], "upload/" . $image)) {
                    mysqli_query($koneksi, "update kost set nama_kost='$nama', alamat='$alamat', deskripsi='$deskripsi', harga='$harga', latitude='$latitude', longitude='$longitude', image='$image' where id='$id'");
                    header("location:tampil_data.php");
                } else {
                    echo "File is not uploaded";
                }
            }
        } else {
            echo "Error: There was a problem uploading your file. Please try again.";
        }
    } else {
        mysqli_query($koneksi, "update kost set nama_kost='$nama', alamat='$alamat', deskripsi='$deskripsi', harga='$harga', latitude='$latitude', longitude='$longitude' where id='$id'");
        header("location:tampil_data.php");
    }
} else {
    header("location:tampil_data.php");
}
header("location:tampil_data.php");
