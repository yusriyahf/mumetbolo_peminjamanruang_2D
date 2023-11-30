<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Dosen</h1>
    <p class="mb-4">Data Dosen Jurusan Teknik Informatika <b>POLINEMA</b></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary mb-3">Tabel Dosen</h6>
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#formTambahDosenModal">
                <i class="fas fa-download fa-sm text-white-50"></i> Tambah Data Dosen
            </button>

            <div class="row mt-3">
                <div class="col-lg-4">
                    <?php Flasher::flash() ?>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nip</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telp</th>
                            <th>Alamat</th>
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
                        if (!empty($data['dsn']) && is_array($data['dsn'])) {
                            foreach ($data['dsn'] as $dsn) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $dsn['nip']; ?></td>
                                    <td><?= $dsn['nama']; ?></td>
                                    <td><?= $dsn['jenis_kelamin']; ?></td>
                                    <td><?= $dsn['no_tlp']; ?></td>
                                    <td><?= $dsn['alamat']; ?></td>
                                    <td>
    
                                        <a href="<?= BASEURL; ?>/admin/ubahDosen/<?= $dsn['id_dosen']; ?>" class="btn btn-warning btn-split btn-sm tampilModalUbahDosen" style="margin-right: 4px;" data-toggle="modal" data-target="#formEditModalDosen" data-id="<?= $dsn['id_dosen']; ?>">
                                            <i class="fas fa-edit"></i>
                                        </a>
    
                                        <a href="<?= BASEURL; ?>/admin/hapusDosen/<?= $dsn['id_dosen']; ?>" class="btn btn-danger btn-split btn-sm" onclick="return confirm('yakin')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach;
                        }else {
                            echo "No data available.";
                        }
                        ?>                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->