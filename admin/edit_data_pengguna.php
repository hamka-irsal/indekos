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

                            <?php
                            include '../koneksi.php';
                            $id = $_GET['id'];
                            $query = mysqli_query($koneksi, "select * from users where id='$id'");
                            $data  = mysqli_fetch_array($query);
                            ?>

                            <form class="form-horizontal style-form" style="margin-top: 10px;" action="edit_aksi_pengguna.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                <div class="form-group d-none">
                                    <label class="col-lg-6 col-12 control-label">ID Indekos</label>
                                    <div class="col-lg-6 col-12">
                                        <input name="id" type="text" id="id" class="form-control" value="<?php echo $data['id']; ?>" readonly />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nama Pengguna</label>
                                    <div class="col-sm-6">
                                        <input name="nama_pengguna" value="<?php echo $data['nama'] ?>" type="text" class="form-control" placeholder="Nama Pengguna" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Username</label>
                                    <div class="col-sm-6">
                                        <input name="username" class="form-control" type="text" placeholder="Username" required value="<?php echo $data['username'] ?>" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Email (Alamat Surel)</label>
                                    <div class="col-sm-6">
                                        <input name="email" class="form-control" type="text" placeholder="Email" value="<?php echo $data['email'] ?>" />
                                        <small>abaikan jika tidak ingin mengubah</small>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 form-label">Avatar</label>
                                    <div class="col-sm-6">
                                        <input name="avatar" class="form-control" type="file" placeholder="Avatar" value="" />
                                        <small>kosongkan jika tidak ingin mengubah</small>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Password (Sandi Akun)</label>
                                    <div class="col-sm-6">
                                        <input name="password" class="form-control" type="password" placeholder="Password" />
                                        <small>kosongkan jika tidak ingin mengubah</small>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-bottom: 20px;">
                                    <label class="col-sm-2 col-sm-4 control-label"></label>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-primary">Sunting Data</button>
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