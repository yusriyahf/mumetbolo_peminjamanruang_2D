<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Mahasiswa</h1>
    <p class="mb-4">Data Mahasiswa Jurusan Teknik Informatika <b>POLINEMA</b></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary mb-3">Tabel Mahasiswa</h6>
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#formTambahModal">
                <i class="fas fa-download fa-sm text-white-50"></i> Tambah Data Mahasiswa
            </button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nim</th>
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
                        foreach ($data['mhs'] as $mhs) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $mhs['nim']; ?></td>
                                <td><?= $mhs['nama']; ?></td>
                                <td><?= $mhs['jenis_kelamin']; ?></td>
                                <td><?= $mhs['no_tlp']; ?></td>
                                <td><?= $mhs['alamat']; ?></td>
                                <td>

                                    <a href="<?= BASEURL; ?>/admin/ubahMahasiswa/<?= $mhs['id_mahasiswa']; ?>" class="btn btn-warning btn-split btn-sm tampilModalUbah" style="margin-right: 4px;" data-toggle="modal" data-target="#formEditModal" data-id="<?= $mhs['id_mahasiswa']; ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <a href="<?= BASEURL; ?>/admin/hapusMahasiswa/<?= $mhs['id_mahasiswa']; ?>" class="btn btn-danger btn-split btn-sm" onclick="return confirm('yakin')">
                                        <i class="fas fa-trash"></i>
                                    </a>
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