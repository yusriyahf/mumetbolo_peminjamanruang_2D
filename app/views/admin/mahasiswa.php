<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Mahasiswa</h1>
    <p class="mb-4">Data Mahasiswa Jurusan Teknik Informatika <b>POLINEMA</b></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary mb-3">Tabel Mahasiswa</h6>
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm tambah" data-toggle="modal" data-target="#formTambahModal">
                <i class="fa fa-plus fa-xs" aria-hidden="true"></i></i>
                <span style="margin-left: 5px;"></i> Tambah Data Mahasiswa
            </button>
            <form action="<?= BASEURL; ?>/admin/cariMahasiswa" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
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
            </div>
        </div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telp</th>
                            <th>Kelas</th>
                            <th>Prodi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        if (!empty($data['mhs']) && is_array($data['mhs'])) {
                            foreach ($data['mhs'] as $mhs) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $mhs['nim']; ?></td>
                                    <td><?= $mhs['nama']; ?></td>
                                    <td><?= $mhs['jenis_kelamin']; ?></td>
                                    <td><?= $mhs['no_tlp']; ?></td>
                                    <td><?= $mhs['kelas']; ?></td>
                                    <td><?= $mhs['prodi']; ?></td>
                                    <td>

                                        <a href="<?= BASEURL; ?>/admin/ubahMahasiswa/<?= $mhs['nama']; ?>" class="btn btn-warning btn-split btn-sm tampilModalUbah" style="margin-right: 4px;" data-toggle="modal" data-target="#formEditModal" data-id="<?= $mhs['id_mahasiswa']; ?>">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a href="<?= BASEURL; ?>/admin/hapusMahasiswa/<?= $mhs['id_mahasiswa']; ?>" class="btn btn-danger btn-split btn-sm" onclick="return confirm('yakin')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php endforeach;
                        } else {
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