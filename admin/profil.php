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
                            <h1 style="font-weight:600; color: black; font-size: 30px; margin: 0px">Profil</h1>
                            <p>Kelola Data Akun Anda</p>
                        </div>
                        <div class="mt-3">
                            <a class="btn btn-outline-primary " href="index.php">Kembali</a>
                        </div>
                    </div>

                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Menyunting Data Akun</h6>
                        </div>

                        <?php
                        include '../koneksi.php';
                        $id = $_GET['id'];
                        $query = mysqli_query($koneksi, "select * from admin where id='$id'");
                        $data  = mysqli_fetch_array($query);
                        ?>

                        <div class="card-body">
                            <form class="form-horizontal style-form" style="margin-top: 10px;" action="sunting_profil.php" method="post" enctype="multipart/form-data" name="form1" id="form1">

                                <div class="form-group d-none">
                                    <div class="col-lg-6 col-12">
                                        <input name="id" type="text" id="id" class="form-control" value="<?php echo $data['id']; ?>" readonly />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nama Anda</label>
                                    <div class="col-sm-6">
                                        <input name="nama_pengguna" type="text" class="form-control" placeholder="Nama Anda" value="<?php $data['nama'] ?>" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Username</label>
                                    <div class="col-sm-6">
                                        <input name="username" class="form-control" type="text" placeholder="Username Akun" value="<?php echo $data['username'] ?>" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Password</label>
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