<?php
$id = $_GET['id'];

echo "
    <script>
        var check = confirm('Apakah anda yakin? data yang anda hapus tidak dapat dikembalikan');
        if (check) {
            window.location = 'delete_pengguna.php?id=$id';
        } else {
            window.location = 'tampil_data_pengguna.php';
        }
    </script>
";
