<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Data Ruangan Lantai 5</h1>
    <p class="mb-4">Data Ruangan Jurusan Teknik Informatika <b>POLINEMA</b></p> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="judul">
            <h4 class="m-0 font-weight-bold text-primary mb-3" >Profil Dosen</h4>
        </div>

      

        <div class="isi">
            <div class="baris">
            <table >
                <tr>
                    <!-- <td style="border: 0px;">
                        <img src="../img/foto.png" width=100>
                    </td> -->
                    <td style="border: 0px;">
                        <h6 class="m-0 font-weight-bold text-primary mb-3">Nama </h6>
                        <h6 class="m-0 font-weight-bold text-primary mb-3">Nip </h6>
                        <h6 class="m-0 font-weight-bold text-primary mb-3">Jabatam </h6>
                        <h6 class="m-0 font-weight-bold text-primary mb-3">Jenis Kelamin </h6>
                        <h6 class="m-0 font-weight-bold text-primary mb-3">No Telp </h6>
                        <h6 class="m-0 font-weight-bold text-primary mb-3">Prodi </h6>
                    </td>
                    <td style="border: 0px;">
                        <h6 class="m-0 font-weight-bold text-primary mb-3"> : </h6>
                        <h6 class="m-0 font-weight-bold text-primary mb-3"> : </h6>
                        <h6 class="m-0 font-weight-bold text-primary mb-3"> : </h6>
                        <h6 class="m-0 font-weight-bold text-primary mb-3"> : </h6>
                        <h6 class="m-0 font-weight-bold text-primary mb-3"> : </h6>
                        <h6 class="m-0 font-weight-bold text-primary mb-3"> : </h6>
                    </td>
                    <td style="border: 0px;">
                    <h6 class="m-0 font-weight-bold text-primary mb-3"> <?= $data['profile']['nama']; ?></h6>
                        <h6 class="m-0 font-weight-bold text-primary mb-3"> <?= $data['profile']['nip']; ?></h6>
                        <h6 class="m-0 font-weight-bold text-primary mb-3"> <?= $data['profile']['jabatan']; ?></h6>
                        <h6 class="m-0 font-weight-bold text-primary mb-3"><?= $data['profile']['jenis_kelamin']; ?></h6>
                        <h6 class="m-0 font-weight-bold text-primary mb-3"> <?= $data['profile']['no_tlp']; ?></h6>
                        <h6 class="m-0 font-weight-bold text-primary mb-3"> <?= $data['profile']['prodi']; ?></h6>
                    </td>
                </tr>
            </table>
            <div class="tombol">
                <a href="<?= BASEURL; ?>/dosen" class="card-link btn btn-sm btn-primary">Kembali</a>
                <a href="<?= BASEURL; ?>/dosen/ubahPassword/<?= $data['profile']['id_dosen']; ?>" class="btn btn-warning btn-split btn-sm tampilModalUbahPassword" style="margin-right: 4px;" data-toggle="modal" data-target="#formEditPasswordModal" data-id="<?= $data['profile']['id_dosen']; ?>">
                    Ubah Password
                </a>
            </div>
            </div>
        </div>

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->