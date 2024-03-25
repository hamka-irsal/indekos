<?php
require 'function.php';
include_once '../koneksi.php';
$select = new Select();

if (!empty($_SESSION["id"])) {
    $user = $select->selectUserById($_SESSION["id"]);
} else {
    header("Location: tampil_data_rekomendasi.php");
}
?>

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
                            <h1 style="font-weight:600; color: black; font-size: 30px; margin: 0px">Data Rekomendasi</h1>
                            <p>Menampilkan kumpulan data rekomendasi</p>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Rekomendasi Indekos Kecamatan Tamalanrea</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 30px;">No</th>
                                            <th>Nama</th>
                                            <th>Rating</th>
                                            <th>Ulasan</th>
                                            <th class="text-center" style="width: 50px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php View::Rating(); ?>
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