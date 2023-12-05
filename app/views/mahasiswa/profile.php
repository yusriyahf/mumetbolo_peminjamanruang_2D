<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Data Ruangan Lantai 5</h1>
    <p class="mb-4">Data Ruangan Jurusan Teknik Informatika <b>POLINEMA</b></p> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary mb-3">Data Profile Mahasiswa</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <h6 class="m-0 font-weight-bold text-primary mb-3">Username : <?= $data['profile']['username']; ?></h6>
                <h6 class="m-0 font-weight-bold text-primary mb-3">Nama : <?= $data['profile']['nama']; ?></h6>
                <h6 class="m-0 font-weight-bold text-primary mb-3">Nim : <?= $data['profile']['nim']; ?></h6>
                <h6 class="m-0 font-weight-bold text-primary mb-3">Jenis Kelamin : <?= $data['profile']['jenis_kelamin']; ?></h6>
                <h6 class="m-0 font-weight-bold text-primary mb-3">No Telp : <?= $data['profile']['no_tlp']; ?></h6>
                <h6 class="m-0 font-weight-bold text-primary mb-3">Kelas : <?= $data['profile']['kelas']; ?></h6>
                <h6 class="m-0 font-weight-bold text-primary mb-3">Prodi : <?= $data['profile']['prodi']; ?></h6>

                <a href="<?= BASEURL; ?>/mahasiswa" class="card-link">Kembali</a>

                <a href="<?= BASEURL; ?>/mahasiswa/ubahPassword/<?= $data['profile']['id_mahasiswa']; ?>" class="btn btn-warning btn-split btn-sm tampilModalUbahPassword" style="margin-right: 4px;" data-toggle="modal" data-target="#formEditPasswordModal" data-id="<?= $data['profile']['id_mahasiswa']; ?>">
                    <i class="fas fa-edit"></i>
                </a>

            </div>
        </div>

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->