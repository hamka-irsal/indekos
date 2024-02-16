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

<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include "menu_sidebar.php"; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
            <?php include "menu_topbar.php"; ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Rekomendasi Indekos Kecamatan Tamalanrea</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                    <?php
                                    // Instansiasi class ViewRating
                                    $view = new View();
                                    // Tampilkan data rating
                                    echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
                                    echo "<thead><tr><th>No</th><th>Nama</th><th>Rating</th><th>Ulasan</th><th>Aksi</th></tr></thead>";
                                    echo "<tbody>";
                                    $view->getRating();

                                    echo "</table>";
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "footer.php"; ?>

        </div>
        <!-- End of Page Wrapper -->