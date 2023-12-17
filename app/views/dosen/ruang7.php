<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Ruangan Lantai 7</h1>
    <p class="mb-4">Data Ruangan Jurusan Teknik Informatika <b>POLINEMA</b></p>
    <a href="<?= BASEURL; ?>/dosen/tanggalPeminjaman" class="btn-primary btn-sm mb-5 text-decoration-none">Pilih Tanggal</a>
    <div class="clock"></div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary mb-3">Anda booking untuk tanggal <b><?= $data['tanggal']; ?></b></h6>
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm tombolTambahData" data-toggle="modal" data-target="#formModal">
                <div id="clock"></div>
            </button>

        </div>
        <img src="<?= BASEURL; ?>/img/7new.png" alt="" width="70%" class="mx-auto">
        <div class="card-body">
            <div class="row">
                <?php $i = 1;
                $sessionHari = $_SESSION['hari'];
                if (!empty($data['ruang']) && is_array($data['ruang'])) {
                    foreach ($data['ruang'] as $ruang) :
                        $status = ($ruang['hari'] == $sessionHari) ? 'kbm' : 'kontol'; ?>
                        <div class="col-lg-3 mb-4">
                            <div class="card text-white shadow bg-success">
                                <div class="card-body">
                                    <?= $ruang['nama_ruang']; ?>
                                    <?= $ruang['hari']; ?>
                                    <div class="text-white-50 small mb-3" data-id_ruang="<?= $ruang['id_ruang']; ?>" data-tgl="<?= $data['tanggal']; ?>">Status <?= $status; ?></div>
                                    <!-- <a href="#" class="btn btn-outline-light btn-sm tampilDetailRuang" data-toggle="modal" data-target="#ruangModal" data-id_ruang="<?= $ruang['id_ruang']; ?>">Detail</a> -->
                                    <a href="#" class="btn btn-outline-light btn-sm tampilFormPinjam" data-toggle="modal" data-target="#formPinjamModal" data-id_ruang="<?= $ruang['id_ruang']; ?>" data-tgl="<?= $data['tanggal']; ?>" data-nama_ruang="<?= $ruang['nama_ruang']; ?>">Pinjam</a>
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