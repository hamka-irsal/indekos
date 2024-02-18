<?php
require 'function.php';
include_once '../koneksi.php';
$select = new Select();

if (!empty($_SESSION["id"])) {
    $user = $select->selectUserById($_SESSION["id"]);
} else {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>

<body id="page-top">
    <div id="wrapper">

        <?php include "menu_sidebar.php"; ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <?php include "menu_topbar.php"; ?>

                <div class="container-fluid">

                    <div class="page-title d-flex justify-content-between mb-2">
                        <div>
                            <h1 style="font-weight:600; color: black; font-size: 30px; margin: 0px">Data Indekosta</h1>
                            <p>Menampilkan kumpulan data indekosta</p>
                        </div>
                        <div class="mt-3">
                            <a class="btn btn-primary " href="tambah_data.php">Tambah Data Indekosta</a>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Indekos Kecamatan Tamalanrea</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                    <thead>
                                        <tr>
                                            <th style="width: 30px;">No</th>
                                            <th style="width: 100px;">Nama Indekos</th>
                                            <th style="width: 100px;">Deksripsi</th>
                                            <th style="width: auto;">Alamat</th>
                                            <th style="width: 100px;">Harga</th>
                                            <th style="width: 50px;">Rating</th>
                                            <th style="width: 50px;">Ulasan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php View::Kost(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include "footer.php"; ?>

        </div>
    </div>
</body>