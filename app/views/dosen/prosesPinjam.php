<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Proses Peminjaman</h1>
    <p class="mb-4">Proses Peminjaman Ruang Jurusan Teknik Informatika <b>POLINEMA</b></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary mb-3">Tabel Data Proses Peminjaman</h6>
            <a href="<?= BASEURL; ?>/file/suratIzin.pdf" class="btn btn-primary btn-sm" target="_blank"><i class="fas fa-download fa-sm text-white-50"></i> Cetak Surat Pinjam</a>
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
                            <th>Peminjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Upload Surat Peminjaman</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        if (!empty($data['proses']) && is_array($data['proses'])) {
                            foreach ($data['proses'] as $proses) :
                                if ($proses['status'] == 'diproses' && $proses['username'] == $_SESSION['username']) {
                        ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $proses['id_ruang']; ?></td>
                                        <td><?= $proses['username']; ?></td>
                                        <td><?= $proses['tanggal_pinjam']; ?></td>
                                        <td>
                                            <?php if($proses['file'] == NULL ){?>
                                            <form action="<?= BASEURL; ?>/dosen/uploadFile/<?= $proses['id_proses']; ?>" method="post" enctype="multipart/form-data">
                                            <div class="input-group">
                                                <input type="file" name="suratPinjam" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                                <button class="btn btn-outline-secondary" type="submit" name="submit" id="inputGroupFileAddon04">Upload</button>
                                            </div>
                                            </form>
                                        <?php }else{ ?>
                                            <a href="<?= BASEURL; ?>/uploadFile/<?= $proses['file']; ?>">Sudah upload Surat Pengajuan Peminjaman</a>
                                        <?php } ?>
                                        </td>
                                        
                                        
                                        <!-- <td>
                                            <form action="<?= BASEURL; ?>/dosen/uploadFile/<?= $proses['id_proses']; ?>" method="post" enctype="multipart/form-data">
                                                <div class="input-group">
                                                    <input type="file" name="suratPinjam" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                                    <button class="btn btn-outline-secondary" type="submit" name="submit" id="inputGroupFileAddon04">Upload</button>
                                                </div>
                                            </form>
                                        </td> -->

                                        <td><?= $proses['status']; ?></td>
                                        </form>
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