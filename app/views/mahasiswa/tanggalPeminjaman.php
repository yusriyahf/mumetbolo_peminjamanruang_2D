<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Peminjaman Ruang Mahasiswa</h1>
    <p class="mb-4">Peminjaman ruangan Jurusan Teknik Informatika <b>POLINEMA</b></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary mb-3">Tata Tertib peminjaman ruangan</h6>
            <a href="<?= BASEURL; ?>/file/tatib.pdf" class="btn btn-primary btn-sm" target="_blank">Download File</a>
        </div>
        <div class="card-body">
            <form method="post" action="<?= BASEURL; ?>/mahasiswa/processForm">
                <div class="form-group row">
                    <label for="tanggal" class="col-md-2 col-form-label">Pilih Tanggal:</label>
                    <div class="col-md-2">
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                </div>

                <!-- Tombol Submit (Opsional) -->
                <div class="form-group row">
                    <div class="col-md-6 offset-md-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->