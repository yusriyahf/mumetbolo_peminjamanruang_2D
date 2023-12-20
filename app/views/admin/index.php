<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Selamat Datang <?= $_SESSION['username']; ?></h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Permintaan Peminjaman Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= BASEURL; ?>/admin/permintaanPeminjaman" class="text-decoration-none">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Permintaan Peminjaman</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['permintaanPeminjaman']; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= BASEURL; ?>/admin/peminjaman" class="text-decoration-none">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Peminjaman Mahasiswa</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['totalPeminjaman']; ?></div>
                            </div>
                            <div class="col-auto">
                                <span class="text-gray-300">
                                    <i class="fa fa-list-ul fa-2x" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Total Ruangan Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= BASEURL; ?>/admin/ruang/5" class="text-decoration-none">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Ruangan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['totalRuang']; ?></div>
                            </div>
                            <div class="col-auto">
                                <span class="text-gray-300">
                                    <i class="fa fa-building fa-2x" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Total Mahasiswa Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= BASEURL; ?>/admin/mahasiswa" class="text-decoration-none">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Mahasiswa</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['totalMhs']; ?></div>
                            </div>
                            <div class="col-auto">
                                <span class="text-gray-300">
                                    <i class="fa fa-users fa-2x" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Total Dosen Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= BASEURL; ?>/admin/dosen" class="text-decoration-none">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Dosen</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['totalDosen']; ?></div>
                            </div>
                            <div class="col-auto">
                                <span class="text-gray-300">
                                    <i class="fa fa-users fa-2x" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>

    <!-- Content Row -->



    <!-- Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->