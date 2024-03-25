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

$kerja = $_POST['Kerja'];
$pasutri = $_POST['Pasutri'];
$kuliah = $_POST['Kuliah'];

$persentKuliah = $_POST['persentKuliah'];
$persentKerja = $_POST['persentKerja'];
$persentPasutri = $_POST['persentPasutri'];

$query = "SELECT * FROM category WHERE kost_id='$id'";
$result = mysqli_query($koneksi, $query);

$dataCategory = [];
if (isset($kerja) && isset($persentKerja)) {
    $dataCategory[] = [
        "category" => $kerja,
        "persent" => $persentKerja,
    ];
}

if (isset($kuliah) && isset($persentKuliah)) {
    $dataCategory[] = [
        "category" => $kuliah,
        "persent" => $persentKuliah,
    ];
}

if (isset($pasutri) && isset($persentPasutri)) {
    $dataCategory[] = [
        "category" => $pasutri,
        "persent" => $persentPasutri,
    ];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($gambar)) {
        $upload = Helpers::upload($gambar);

        if (isset($upload['allowed']) && isset($upload['type']) && in_array($upload['type'], $upload['allowed'])) {
            $image = md5(time() . $upload['name']);


            if (file_exists("upload/" . $image)) {
                echo $image . " is already exists.";
            } else {
                if (move_uploaded_file($gambar["tmp_name"], "upload/" . $image)) {
                    mysqli_query($koneksi, "update kost set nama_kost='$nama', alamat='$alamat', deskripsi='$deskripsi', harga='$harga', latitude='$latitude', longitude='$longitude', image='$image' where id='$id'");

                    while ($d = mysqli_fetch_array($result)) {
                        $category = $data['category'];
                        $persent = $data['persent'];
                        $id = $d['id'];

                        mysqli_query($koneksi, "update category set category='$category', persent='$persent' where id='$id'");
                    }

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

        while ($d = mysqli_fetch_array($result)) {
            $category = $d['category'];
            $persent = $d['persent'];
            $id = $d['id'];

            mysqli_query($koneksi, "update category set category='$category', persent='$persent' where id='$id'");
        }

        header("location:tampil_data.php");
    }
} else {
    header("location:tampil_data.php");
}
header("location:tampil_data.php");
