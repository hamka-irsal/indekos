<?php

require_once './helpers/Ryoogen.php';
include '../koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama_pengguna'];
$username = $_POST['username'];
$email = $_POST['email'];
$avatar = $_FILES['avatar'];
$password = $_POST['password'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($avatar) || isset($upload)) {
        $upload = Helpers::upload($avatar);

        if (in_array($upload['type'], $upload['allowed'])) {
            if (file_exists("upload/" . $upload['name'])) {
                echo $upload['name'] . " is already exists.";
            } else {
                if (move_uploaded_file($avatar["tmp_name"], "upload/" . $upload['name'])) {
                    $image = $upload['name'];

                    $password = password_hash($password, PASSWORD_DEFAULT);

                    if ($password) {
                        mysqli_query($koneksi, "update users set nama='$nama', username='$username',email='$email', password='$password',avatar='$image' where id='$id'");
                        header("location:tampil_data_pengguna.php");
                    } else {
                        mysqli_query($koneksi, "update users set nama='$nama', username='$username',email='$email',avatar='$image' where id='$id'");
                        header("location:tampil_data_pengguna.php");
                    }
                } else {
                    echo "File is not uploaded";
                }
            }
        } else {
            echo "Error: There was a problem uploading your file. Please try again.";
        }
    } else {
        if ($password) {
            mysqli_query($koneksi, "update users set nama='$nama', username='$username',email='$email', password='$password' where id='$id'");
        } else {
            mysqli_query($koneksi, "update users set nama='$nama', username='$username',email='$email' where id='$id'");
        }
    }
} else {
    header("location:tampil_data_pengguna.php");
}

header("location:tampil_data_pengguna.php");
