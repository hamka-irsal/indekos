<?php

require_once './helpers/Ryoogen.php';
include '../koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama_pengguna'];
$username = $_POST['username'];
$email = $_POST['email'];
$avatar = $_FILES['avatar'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "select avatar from users where id='$id'");
$imageOld = mysqli_fetch_array($query);

if ($imageOld['avatar']) {
    unlink('upload/' . $imageOld['avatar']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($avatar) || isset($upload)) {
        $upload = Helpers::upload($avatar);

        if (in_array($upload['type'], $upload['allowed'])) {
            $image = md5(time() . $upload['name']);

            if (file_exists("upload/" . $image)) {
                echo $image . " is already exists.";
            } else {
                if (move_uploaded_file($avatar["tmp_name"], "upload/" . $image)) {
                    if ($password) {
                        $password = password_hash($password, PASSWORD_DEFAULT);

                        mysqli_query($koneksi, "update users set nama='$nama', username='$username',email='$email', password='$password',avatar='$image' where id='$id'");
                        header("location:index.php");
                    } else {
                        mysqli_query($koneksi, "update users set nama='$nama', username='$username',email='$email',avatar='$image' where id='$id'");
                        header("location:index.php");
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
    header("location:index.php");
}

header("location:index.php");
