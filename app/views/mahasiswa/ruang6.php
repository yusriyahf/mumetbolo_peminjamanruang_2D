<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Ruangan Lantai 6</h1>
    <p class="mb-4">Data Ruangan Jurusan Teknik Informatika <b>POLINEMA</b></p>
    <div class="clock"></div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary mb-3">Tabel Ruangan</h6>

            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm tombolTambahData" data-toggle="modal" data-target="#formModal">
                <div id="clock"></div>
            </button>

        </div>
        <img src="<?= BASEURL; ?>/img/6.png" alt="" width="70%" class="mx-auto">

        <div class="card-body">
            <div class="row">
                <?php $i = 1;
                foreach ($data['ruang'] as $ruang) : ?>
                    <div class="col-lg-3 mb-4">
                        <div class="card text-white shadow ruang-card" style="" data-status="<?= $ruang['status']; ?>">
                            <div class="card-body">
                                <?= $ruang['nama_ruang']; ?>
                                <div class="text-white-50 small mb-3">Status <?= $ruang['status']; ?></div>
                                <a href="#" class="btn btn-outline-light btn-sm" data-toggle="modal" data-target="#ruangModal" data-nama="<?= $ruang['nama_ruang']; ?>" data-kapasitas="<?= $ruang['kapasitas']; ?>" data-status="<?= $ruang['status']; ?>" data-lantai="<?= $ruang['lantai']; ?>" data-fasilitas="<?= $ruang['fasilitas']; ?>" data-jenis_ruang="<?= $ruang['jenis_ruang']; ?>">Detail</a>
                                <a href="#" class="btn btn-outline-light btn-sm <?= ($ruang['status'] !== 'tersedia') ? 'disabled' : ''; ?>">Pinjam</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->