<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Ruangan Lantai 5</h1>
    <p class="mb-4">Data Ruangan Jurusan Teknik Informatika <b>POLINEMA</b></p>
    <div class="clock"></div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary mb-3">Tabel Ruangan</h6>
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm tombolTambahData" data-toggle="modal" data-target="#formModal">
                <i class="fas fa-download fa-sm text-white-50"></i> Tambah Data Ruangan
            </button>
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm tombolTambahData" data-toggle="modal" data-target="#formModal">
                <div id="clock"></div>
            </button>

        </div>
        <img src="<?= BASEURL; ?>/img/5.png" alt="" width="70%" class="mx-auto">

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
                        foreach ($data['ruang'] as $ruang) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $ruang['nama_ruang']; ?></td>
                                <td><?= $ruang['lantai']; ?></td>
                                <td class="status-cell"><?= $ruang['status']; ?></td>
                                <td><?= $ruang['status']; ?></td>
                                <td><?= $ruang['jenis_ruang']; ?></td>
                                <td><?= $ruang['kapasitas']; ?></td>
                                <td><?= $ruang['fasilitas']; ?></td>
                                <td>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->