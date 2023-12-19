    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Peminjaman</h1>
        <p class="mb-4">Data Peminjaman Ruang Jurusan Teknik Informatika <b>POLINEMA</b></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary mb-3">Tabel Data Peminjaman</h6>
                <div class="row mt-3">
                    <div class="col-lg-4">
                        <?php Flasher::flash() ?>
                    </div>
                </div>
            </div>


            <div class="card-body">
                <div class="btn-group mb-3">
                    <a href="<?= BASEURL; ?>/admin/peminjaman" class="btn btn-primary">Semua</a>
                    <a href="<?= BASEURL; ?>/admin/peminjamanDiacc" class="btn btn-primary">Disetujui</a>
                    <a href="<?= BASEURL; ?>/admin/peminjamanDiTolak" class="btn btn-primary">Ditolak</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTablehistori" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama ruang</th>
                                <th>Peminjam</th>
                                <th>Tanggal Pinjam</th>
                                <th>Surat</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            if (!empty($data['proses']) && is_array($data['proses'])) {
                                foreach ($data['proses'] as $proses) :
                                    if ($proses['status'] != 'diproses') {
                                        $class = ($proses['status'] == 'disetujui') ? 'text-success' : 'text-danger';
                            ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $proses['nama_ruang']; ?></td>
                                            <td><?= $proses['username']; ?></td>
                                            <td><?= date('d-m-Y', strtotime($proses['tanggal_pinjam'])); ?></td>
                                            <td><?php if ($proses['file'] == NULL) { ?>
                                                    <a href="#" class="text-danger text-decoration-none">File belum diunggah</a>
                                                <?php } else { ?>
                                                    <a href="<?= BASEURL; ?>/uploadFile/<?= $proses['file']; ?>"><?= $proses['file']; ?></a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="#" class="alasanPenolakan <?= $class; ?> text-decoration-none" data-toggle="modal" data-target="#pesanPenolakanModal" data-id_ruang="<?= $proses['id_ruang']; ?>" data-pesan="<?= $proses['pesan']; ?>" data-status="<?= $proses['status']; ?>">
                                                    <?= $proses['status']; ?>
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