<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Peminjaman Ruang Dosen</h1>
    <p class="mb-4">Peminjaman ruangan Jurusan Teknik Informatika <b>POLINEMA</b></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

        </div>
        <div class="card-body">
            <form method="post" action="<?= BASEURL; ?>/dosen/processForm">
                <div class="form-group row">
                    <div class="col-md-2 mb-3">
                        <label for="tanggal" class="form-label">Pilih Tanggal:</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <!-- Tombol Submit (Opsional) -->
                    <div class="form-group row">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
    // Mengatur nilai minimum pada elemen input tanggal menjadi tanggal sekarang
    document.getElementById('tanggal').min = new Date().toISOString().split('T')[0];
</script>