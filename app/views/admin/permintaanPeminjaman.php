<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Permintaan Peminjaman</h1>
    <p class="mb-4">Permintaan Peminjaman Ruang Jurusan Teknik Informatika <b>POLINEMA</b></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary mb-3">Tabel Data Permintaan Peminjaman</h6>

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
                            <th>Nama ruang</th>
                            <th>Lantai</th>
                            <th>Peminjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Surat</th>
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
                            <th>prodi</th>
                            <th>Action</th>
                        </tr>
                    </tfoot> -->
                    <tbody>
                        <?php $i = 1;
                        if (!empty($data['proses']) && is_array($data['proses'])) {
                            foreach ($data['proses'] as $proses) :
                                if ($proses['status'] == 'diproses') { ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $proses['nama_ruang']; ?></td>
                                        <td><?= $proses['lantai']; ?></td>
                                        <td><?= $proses['username']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($proses['tanggal_pinjam'])); ?></td>
                                        <td>
                                            <?php if ($proses['file'] == NULL) { ?>
                                                <p class="text-danger">File belum diunggah</p>
                                            <?php } else { ?>
                                                <a href="<?= BASEURL; ?>/uploadFile/<?= $proses['file']; ?>"><?= $proses['file']; ?></a>
                                            <?php } ?>
                                        </td>

                                        <td>
                                            <!-- <a href="#" class="btn btn-success btn-split btn-sm accPeminjaman" style="margin-right: 4px;" data-toggle="modal" data-target="#accPeminjamanModal" data-id_proses="<?= $proses['id_proses']; ?>">
                                                <i class="fas fa-check"></i>
                                            </a> -->
                                            <a href="#" class="btn btn-success btn-split btn-sm accPeminjaman" style="margin-right: 4px;" data-toggle="modal" data-target="#accPeminjamanModal" data-id_proses="<?= $proses['id_proses']; ?>">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-split btn-sm tolakPeminjaman" style="margin-right: 4px;" data-toggle="modal" data-target="#tolakPeminjamanModal" data-id_proses="<?= $proses['id_proses']; ?>">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                        <?php
                                }
                            endforeach;
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