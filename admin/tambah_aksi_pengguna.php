<?php

require_once './helpers/Ryoogen.php';
include '../koneksi.php';

$nama = $_POST['nama_pengguna'];
$username = $_POST['username'];
$email = $_POST['email'];
$avatar = $_FILES['avatar'];
$password = $_POST['password'];

$password = password_hash($password, PASSWORD_DEFAULT);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($avatar)) {
        $upload = Helpers::upload($avatar);

        if (in_array($upload['type'], $upload['allowed'])) {
            $image = md5(time() . $upload['name']);

            if (file_exists("upload/" . $image)) {
                echo $image . " is already exists.";
            } else {
                if (move_uploaded_file($avatar["tmp_name"], "upload/" . $image)) {
                    mysqli_query($koneksi, "insert into users (nama,username, password, email, avatar, roles) values('$nama','$username','$password', '$email', '$image','admin')");
                    header("location:tampil_data_pengguna.php");
                } else {
                    echo "File is not uploaded";
                }
            }
        } else {
            echo "Error: There was a problem uploading your file. Please try again.";
        }
    } else {
        mysqli_query($koneksi, "insert into users (nama,username, password, email, roles) values('$nama','$username','$password', '$email','admin')");
        header("location:tampil_data_pengguna.php");
    }
} else {
    header("location:tampil_data_pengguna.php");
}
