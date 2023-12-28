<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="judul" style="margin-left : 15px; margin-top : 15px">
            <h5 class="m-0 font-weight-bold text-primary mb-3 mr-5">Profil Dosen</h5>
        </div>


        <div class="isi">
            <div class="baris">
                <table>
                    <tr>
                        <td style="border: 0px; ">
                            <img src="<?= BASEURL; ?>/img/profile.png" width=175 style="margin-left : 15px">
                        </td>
                        <td style="border: 0px; ">
                            <h6 class="m-0 font-weight-bold text-primary mb-3 ml-4 mt-4">Nama </h6>
                            <h6 class="m-0 font-weight-bold text-primary mb-3 ml-4">Nip </h6>
                            <h6 class="m-0 font-weight-bold text-primary mb-3 ml-4">Jabatan </h6>
                            <h6 class="m-0 font-weight-bold text-primary mb-3 ml-4">Jenis Kelamin </h6>
                            <h6 class="m-0 font-weight-bold text-primary mb-3 ml-4">No Telp </h6>
                            <h6 class="m-0 font-weight-bold text-primary mb-3 ml-4">Prodi </h6>
                        </td>
                        <td style="border: 0px;">
                            <h6 class="m-0 font-weight-bold text-primary mb-3 ml-2 mr-2 mt-4"> : </h6>
                            <h6 class="m-0 font-weight-bold text-primary mb-3 ml-2 mr-2"> : </h6>
                            <h6 class="m-0 font-weight-bold text-primary mb-3 ml-2 mr-2"> : </h6>
                            <h6 class="m-0 font-weight-bold text-primary mb-3 ml-2 mr-2"> : </h6>
                            <h6 class="m-0 font-weight-bold text-primary mb-3 ml-2 mr-2"> : </h6>
                            <h6 class="m-0 font-weight-bold text-primary mb-3 ml-2 mr-2"> : </h6>
                        </td>
                        <td style="border: 0px;">
                            <h6 class="m-0 font-weight-bold text-primary mb-3 mt-4"> <?= $data['profile']['nama']; ?></h6>
                            <h6 class="m-0 font-weight-bold text-primary mb-3"> <?= $data['profile']['nip']; ?></h6>
                            <h6 class="m-0 font-weight-bold text-primary mb-3"> <?= $data['profile']['jabatan']; ?></h6>
                            <h6 class="m-0 font-weight-bold text-primary mb-3"><?= $data['profile']['jenis_kelamin']; ?></h6>
                            <h6 class="m-0 font-weight-bold text-primary mb-3"> <?= $data['profile']['no_tlp']; ?></h6>
                            <h6 class="m-0 font-weight-bold text-primary mb-3"> <?= $data['profile']['prodi']; ?></h6>
                        </td>
                    </tr>
                </table>
                <div class="tombol" style="margin-top : 5px;">
                    <a href="<?= BASEURL; ?>/dosen" class="card-link btn btn-sm btn-primary" style="margin-left : 15px; margin-bottom : 15px;">Kembali</a>
                    <a href="<?= BASEURL; ?>/dosen/ubahPassword/<?= $data['profile']['id_dosen']; ?>" class="btn btn-warning btn-split btn-sm tampilModalUbahPassword" style="margin-right: 4px; margin-bottom : 15px;" data-toggle="modal" data-target="#formEditPasswordModal" data-id="<?= $data['profile']['id_dosen']; ?>">
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