<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Ruangan Lantai <?= $data['lantai']; ?></h1>
    <p class="mb-4">Data Ruangan Jurusan Teknik Informatika <b>POLINEMA</b></p>

    <div class="clock"></div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= BASEURL; ?>/mahasiswa/ta=nggalPeminjaman" class=" btn btn-success btn-md mb-3 text-decoration-none">Ganti Tanggal</a>

            <div class="btn-group mb-3">
                <a href="<?= BASEURL; ?>/mahasiswa/ruang/5" class="btn btn-primary">Lantai 5</a>
                <a href="<?= BASEURL; ?>/mahasiswa/ruang/6" class="btn btn-primary">Lantai 6</a>
                <a href="<?= BASEURL; ?>/mahasiswa/ruang/7" class="btn btn-primary">Lantai 7</a>
                <a href="<?= BASEURL; ?>/mahasiswa/ruang/8" class="btn btn-primary mr-1">Lantai 8</a>
                <a href="<?= BASEURL; ?>/file/tatib.pdf" class="btn btn-success" target="_blank">Download File</a>
            </div>
            <h6 class="m-0 font-weight-bold text-primary mb-3">Anda booking untuk <b><?= $_SESSION['hari']; ?> <?= $data['tanggal']; ?></b></h6>
            <br>

            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm tombolTambahData" data-toggle="modal" data-target="#formModal">
                <div id="clock"></div>
            </button>

        </div>
        <img src="<?= BASEURL; ?>/img/<?= $data['lantai']; ?>.jpg" alt="" width="70%" class="mx-auto">
        <div class="card-body">
            <div class="row grid">
                <?php $i = 1;
                if (!empty($data['ruang']) && is_array($data['ruang'])) {
                    foreach ($data['ruang'] as $ruang) :
                        $bgClass = '';
                        if ($ruang['status'] == 'tersedia') {
                            $bgClass = 'bg-success';
                        } elseif ($ruang['status'] == 'kbm') {
                            $bgClass = 'bg-danger';
                        } elseif ($ruang['status'] == 'dibooking') {
                            $bgClass = 'bg-dark';
                        } elseif ($ruang['status'] == 'diproses') {
                            $bgClass = 'bg-secondary';
                        } ?>
                        <div class="col-lg-3 mb-4 grid-item">
                            <div class="card text-white shadow <?= $bgClass; ?>">
                                <div class="card-body">
                                    <?= $ruang['nama_ruang']; ?>
                                    <div class="text-white-50 small"><?= $ruang['arah'] ?></div>
                                    <div class="text-white-50 small mb-3" data-id_ruang="<?= $ruang['id_ruang']; ?>" data-tgl="<?= $data['tanggal']; ?>">Status <?= $ruang['status']; ?></div>

                                    <a href="#" class="btn btn-outline-light btn-sm tampilDetailRuang" data-toggle="modal" data-target="#ruangModal" data-id_ruang="<?= $ruang['id_ruang']; ?>" data-status="<?= $ruang['status']; ?>">Detail</a>
                                    <a href="#" class="btn btn-outline-light btn-sm tampilFormPinjam <?php echo ($ruang['status'] !== 'tersedia') ? 'disabled' : ''; ?>" data-toggle="modal" data-target="#formPinjamModal" data-id_ruang="<?= $ruang['id_ruang']; ?>" data-id_jadwal="<?= $ruang['id_jadwal']; ?>" data-tgl="<?= $data['tanggal']; ?>" data-nama_ruang="<?= $ruang['nama_ruang']; ?>">Pinjam</a>
                                </div>
                            </div>
                        </div>
                <?php endforeach;
                } else {
                    echo "No data available.";
                } ?>
            </div>
        </div>

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->