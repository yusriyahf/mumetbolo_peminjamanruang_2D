<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Peminjaman</h1>
    <p class="mb-4">Data Peminjaman Ruang Jurusan Teknik Informatika <b>POLINEMA</b></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary mb-3">Tabel Data Peminjaman</h6>
            <!-- <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm tambah" data-toggle="modal" data-target="#formTambahModal">
                <i class="fas fa-download fa-sm text-white-50"></i> Cetak Data Peminjaman
            </button> -->
            <!-- <a href="#" data-toggle="modal" class="btn btn-sm btn-primary" data-target="#formTambahModal">Tambah Data Dosen</a> -->
            <!-- <form action="<?= BASEURL; ?>/admin/cariDosen" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" name="keyword" placeholder="Cari Data" aria-label="Search" aria-describedby="basic-addon2" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form> -->

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
                            <!-- <th>Lantai</th> -->
                            <th>Peminjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Surat</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <!-- <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nip</th>
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
                                if ($proses['status'] != 'diproses' && $proses['username'] == $_SESSION['username']) {
                        ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $proses['id_ruang']; ?></td>
                         
                                        <td><?= $proses['username']; ?></td>
                                        <td><?= $proses['tanggal_pinjam']; ?></td>
                                        <td><a href="<?= BASEURL; ?>/uploadFile/<?= $proses['file']; ?>" class="btn btn-primary btn-sm" target="_blank"><i class="fas fa-download fa-sm text-white-50"></i> Surat Peminjaman</a></td>
                                        <td>
                                            <a href="#" class="alasanPenolakan" data-toggle="modal" data-target="#pesanPenolakanModal" data-id_ruang="<?= $proses['id_ruang']; ?>" data-pesan="<?= $proses['pesan']; ?>" data-status="<?= $proses['status'];?>">
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