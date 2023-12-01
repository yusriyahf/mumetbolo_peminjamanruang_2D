<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Ruangan Lantai 7</h1>
    <p class="mb-4">Data Ruangan Jurusan Teknik Informatika <b>POLINEMA</b></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary mb-3">Tabel Ruangan</h6>
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#formTambahRuang">
                <i class="fas fa-download fa-sm text-white-50"></i> Tambah Data Ruangan
            </button>
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#formModal">
                <div id="clock"></div>
            </button>
            <form action="<?= BASEURL; ?>/admin/cariRuang/7" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" name="keyword" placeholder="Cari Data" aria-label="Search" aria-describedby="basic-addon2" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            <div class="row mt-3">
                <div class="col-lg-4">
                    <?php Flasher::flash() ?>
                </div>
                <img src="<?= BASEURL; ?>/img/7.png" alt="" width="70%" class="mx-auto">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Ruang</th>
                                    <th>Lantai</th>
                                    <th>Status</th>
                                    <th>Jenis Ruangan</th>
                                    <th>Kapasitas</th>
                                    <th>Fasilitas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <!-- <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telp</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </tfoot> -->
                            <tbody>
                                <?php $i = 1;
                                if (!empty($data['ruang']) && is_array($data['ruang'])) {
                                    foreach ($data['ruang'] as $ruang) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $ruang['nama_ruang']; ?></td>
                                            <td><?= $ruang['lantai']; ?></td>
                                            <td class="status-cell"><?= $ruang['status']; ?></td>
                                            <td><?= $ruang['jenis_ruang']; ?></td>
                                            <td><?= $ruang['kapasitas']; ?></td>
                                            <td><?= $ruang['fasilitas']; ?></td>
                                            <td>
                                                <a href="<?= BASEURL; ?>/admin/ubahRuang/<?= $mhs['id_ruang']; ?>" class="btn btn-warning btn-split btn-sm tampilModalUbahRuang" style="margin-right: 4px;" data-toggle="modal" data-target="#formEditRuang" data-id="<?= $ruang['id_ruang']; ?>">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="<?= BASEURL; ?>/admin/hapusRuang/<?= $ruang['id_ruang']; ?>/<?= $ruang['lantai']; ?>" class="btn btn-danger btn-split btn-sm" onclick="return confirm('yakin')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                <?php endforeach;
                                } else {
                                    echo "No data available.";
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->