<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="/public/js/print.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/print-js"></script>


    <title><?= $data['judul']; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= BASEURL; ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <!-- Custom styles for this template-->

    <link href="<?= BASEURL; ?>/css/sb-admin-2.css" rel="stylesheet">

    <link rel="icon" href="<?= BASEURL; ?>/img/JTI.png" type="image/png">



</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon ">
                    <img src="<?= BASEURL; ?>/img/JTI.png" width=45>
                </div>
                <div class="sidebar-brand-text mx-3">Peminjaman Ruang</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= ($_SESSION['activePage'] = 'index') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= BASEURL . '/' . $_SESSION['tipe']; ?>">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <?php if ($_SESSION['tipe'] == 'admin') : ?>

                <div class="sidebar-heading">
                    Manage
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <!-- <li class="nav-item active"> -->
                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span>User</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Data User:</h6>
                            <a class="collapse-item" href="<?= BASEURL; ?>/admin/mahasiswa">Mahasiswa</a>
                            <a class="collapse-item" href="<?= BASEURL; ?>/admin/dosen">Dosen</a>
                        </div>
                    </div>
                </li>
            <?php endif; ?>

            <!-- Nav Item - Utilities Collapse Menu -->
            <?php if ($_SESSION['tipe'] == 'admin') : ?>
                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fa fa-building" aria-hidden="true"></i>
                        <span>Ruang</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Ruangan JTI</h6>
                            <a class="collapse-item" href="<?= BASEURL; ?>/admin/ruang/5">Lantai 5</a>
                            <a class="collapse-item" href="<?= BASEURL; ?>/admin/ruang/6">Lantai 6</a>
                            <a class="collapse-item" href="<?= BASEURL; ?>/admin/ruang/7">Lantai 7</a>
                            <a class="collapse-item" href="<?= BASEURL; ?>/admin/ruang/8">Lantai 8</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= BASEURL; ?>/admin/jadwal">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                        <span>Jadwal</span></a>
                </li>
            <?php endif; ?>

            <!-- Nav Item - Utilities Collapse Menu -->
            <?php if ($_SESSION['tipe'] == 'mahasiswa' or $_SESSION['tipe'] == 'dosen') : ?>
                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ruangPinjam" aria-expanded="true" aria-controls="ruangPinjam">
                        <i class="fa fa-building" aria-hidden="true"></i>
                        <span>Ruang</span>
                    </a>
                    <div id="ruangPinjam" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Ruangan JTI</h6>
                            <a class="collapse-item" href="<?= BASEURL; ?>/mahasiswa/ruang/5">Lantai 5</a>
                            <a class="collapse-item" href="<?= BASEURL; ?>/mahasiswa/ruang/6">Lantai 6</a>
                            <a class="collapse-item" href="<?= BASEURL; ?>/mahasiswa/ruang/7">Lantai 7</a>
                            <a class="collapse-item" href="<?= BASEURL; ?>/mahasiswa/ruang/8">Lantai 8</a>
                        </div>
                    </div>
                </li>
            <?php endif; ?>

            <!-- Divider -->
            <?php if ($_SESSION['tipe'] == 'admin') : ?>
                <hr class="sidebar-divider">

                <!-- Heading -->

                <div class="sidebar-heading">
                    Proses
                </div>
            <?php endif; ?>
            <?php if ($_SESSION['tipe'] == 'admin') : ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= BASEURL; ?>/admin/permintaanPeminjaman">
                        <i class="fas fa-comments"></i>
                        <span>Permintaan Peminjaman</span></a>
                </li>
            <?php endif; ?>

            <!-- Nav Item - Data Peminjaman Menu -->
            <?php if ($_SESSION['tipe'] == 'admin') : ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= BASEURL; ?>/admin/peminjaman">
                        <i class="fa fa-history" aria-hidden="true"></i>
                        <span>Riwayat Peminjaman</span></a>
                </li>
            <?php endif; ?>

            <?php if ($_SESSION['tipe'] == 'mahasiswa' or $_SESSION['tipe'] == 'dosen') : ?>
                <!-- Nav Item - Req Peminjaman Menu -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= BASEURL; ?>/mahasiswa/prosesPinjam">
                        <i class="fas fa-comments"></i>
                        <span>Proses Peminjaman</span></a>
                </li>
            <?php endif; ?>

            <?php if ($_SESSION['tipe'] == 'mahasiswa' or $_SESSION['tipe'] == 'dosen') : ?>
                <!-- Nav Item - Req Peminjaman Menu -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= BASEURL; ?>/mahasiswa/peminjaman">
                        <i class="fa fa-history" aria-hidden="true"></i>
                        <span>Riwayat Peminjaman</span></a>
                </li>
            <?php endif; ?>


            <!-- Nav Item - Charts -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Laporan</span></a>
            </li> -->


            <!-- Nav Item - Tables -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> -->

        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <!-- <form action="<?= BASEURL; ?>/admin/cariMahasiswa" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" name="keyword" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['username']; ?></span>
                                <img class="img-profile rounded-circle" src="<?= BASEURL; ?>/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <?php if ($_SESSION['tipe'] == 'mahasiswa' or $_SESSION['tipe'] == 'dosen') : ?>
                                    <a class="dropdown-item" href="<?= BASEURL; ?>/<?= $_SESSION['tipe']; ?>/profile">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                <?php endif; ?>
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> -->
                                <?php if ($_SESSION['tipe'] == 'mahasiswa' or $_SESSION['tipe'] == 'dosen') : ?>

                                    <div class="dropdown-divider"></div>
                                <?php endif; ?>

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>

                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->