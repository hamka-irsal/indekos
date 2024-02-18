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
                            <h1 style="font-weight:600; color: black; font-size: 30px; margin: 0px">Tambah Data Pengguna</h1>
                            <p>Menambah data pengguna</p>
                        </div>
                        <div class="mt-3">
                            <a class="btn btn-outline-primary " href="tampil_data_pengguna.php">Kembali</a>
                        </div>
                    </div>

                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Menambahkan Data Pengguna</h6>
                        </div>

                        <div class="card-body">
                            <form class="form-horizontal style-form" style="margin-top: 10px;" action="tambah_aksi_pengguna.php" method="post" enctype="multipart/form-data" name="form1" id="form1">

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nama Pengguna</label>
                                    <div class="col-sm-6">
                                        <input name="nama_pengguna" type="text" class="form-control" placeholder="Nama Pengguna" required value="" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Username</label>
                                    <div class="col-sm-6">
                                        <input name="username" class="form-control" type="text" placeholder="Username" required value="" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Email (Alamat Surel)</label>
                                    <div class="col-sm-6">
                                        <input name="email" class="form-control" type="text" placeholder="Email" required value="" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 form-label">Avatar</label>
                                    <div class="col-sm-6">
                                        <input name="avatar" class="form-control" type="file" placeholder="Avatar" required value="" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Password (Sandi Akun)</label>
                                    <div class="col-sm-6">
                                        <input name="password" class="form-control" type="password" placeholder="Password" required value="" />
                                    </div>
                                </div>

                                <div class="form-group" style="margin-bottom: 20px;">
                                    <label class="col-sm-2 col-sm-4 control-label"></label>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                                    </div>
                                </div>

                                <div style="margin-top: 20px;"></div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php include "footer.php"; ?>

        </div>
    </div>
</body>

</html>