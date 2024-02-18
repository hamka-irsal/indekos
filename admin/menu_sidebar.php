<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon ">
            <img class="rounded-circle" src="img/Indekosta.png" width="45px" height="45px" alt="...">
        </div>
        <div class="sidebar-brand-text mx-3">INDEKOS</div>

    </a>

    <hr class="sidebar-divider my-0">

    <li <?php if ($_SERVER['SCRIPT_NAME'] == "/indekos/admin/index.php") { ?> class="nav-item active" <?php   } else {  ?> class="nav-item" <?php } ?>>
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-chart-pie"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">

    <li <?php if ($_SERVER['SCRIPT_NAME'] == "/indekos/admin/tampil_data.php" || $_SERVER['SCRIPT_NAME'] == "/indekos/admin/edit_data.php" || $_SERVER['SCRIPT_NAME'] == "/indekos/admin/tambah_data.php") { ?> class="nav-item active" <?php   } else {  ?> class="nav-item" <?php } ?>>
        <a class="nav-link" href="tampil_data.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Indekosta</span>
        </a>
    </li>

    <li <?php if ($_SERVER['SCRIPT_NAME'] == "/indekos/admin/tampil_data_rekomendasi.php") { ?> class="nav-item active" <?php   } else {  ?> class="nav-item" <?php } ?>>
        <a class="nav-link" href="tampil_data_rekomendasi.php">
            <i class="fas fa-fw fa-star"></i>
            <span>Rekomendasi</span></a>
    </li>

    <li <?php if ($_SERVER['SCRIPT_NAME'] == "/indekos/admin/tampil_data_pengguna.php" || $_SERVER['SCRIPT_NAME'] == "/indekos/admin/edit_data_pengguna.php" || $_SERVER['SCRIPT_NAME'] == "/indekos/admin/tambah_data_pengguna.php") { ?> class="nav-item active" <?php   } else {  ?> class="nav-item" <?php } ?>>
        <a class="nav-link" href="tampil_data_pengguna.php">
            <i class="fas fa-fw fa-user"></i>
            <span>Pengguna</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>