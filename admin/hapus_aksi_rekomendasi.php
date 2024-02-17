<?php
// koneksi database
include '../koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];


echo "
    <script>
        var check = confirm('Apakah anda yakin? data yang anda hapus tidak dapat dikembalikan');
        if (check) {
            window.location = 'delete_rekomendasi.php?id=$id';
        } else {
            window.location = 'tampil_data_rekomendasi.php';
        }
    </script>
";