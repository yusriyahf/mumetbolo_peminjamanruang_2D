<!-- Pinjam Ruangan Modal-->
<div class="modal fade" id="formPinjamModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Pinjam Ruangan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/dosen/formPinjam" method="post">
                    <input type="hidden" name="id_ruang" id="id_ruang" value="">
                    <input type="hidden" name="id_jadwal" id="id_jadwal" value="">
                    <input type="hidden" name="tglSekarang" id="tglSekarang" value="">

                    <div class="mb-3">
                        <label for="nama" class="form-label">Peminjam</label>
                        <div id="username-display"><?= $_SESSION['username'] ?></div>
                        <input type="hidden" class="form-control" id="nama" name="nama" value="<?= $_SESSION['username'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                        <div id="username-display"><?= $_SESSION['hari']; ?>, <?= $_SESSION['tanggal'] ?></div>
                        <input type="hidden" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?= $_SESSION['tanggal']; ?>" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="tujuan" class="form-label">Tujuan Peminjaman</label>
                        <input type="text" class="form-control" id="tujuan" name="tujuan" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="instansi" class="form-label">Instansi</label>
                        <input type="text" class="form-control" id="instansi" name="instansi" autocomplete="off" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Pinjam</button>
                </form>
            </div>
        </div>
    </div>
</div>