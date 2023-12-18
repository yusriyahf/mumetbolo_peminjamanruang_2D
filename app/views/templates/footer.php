<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Peminjaman Ruangan POLINEMA 2023</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>



<!-- Ubah Password mahasiswa Modal-->
<div class="modal fade" id="formEditPasswordModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Ubah Password</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/mahasiswa/ubahPassword" method="post">
                    <div class="mb-3">
                        <label for="nim" class="form-label">Password Lama</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" id="password_edit" name="password_edit" autocomplete="off" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Ubah Password</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Detail Ruang Modal-->
<div class="modal fade" id="ruangModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ruangModalLabel">Detail Ruang</h5>
            </div>
            <div class="modal-body">
                <h5 id="nama_ruang"></h5>
                <h5 id="lantai_ruang"></h5>
                <h5 id="jenis_ruang"></h5>
                <h5 id="fasilitas"></h5>
                <h5 id="kapasitas"></h5>
                <h5 id="status_ruang"></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin untuk logout?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik logout jika anda yakin untuk keluar.</div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= BASEURL; ?>/auth/logOut">Logout</a>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="accPeminjamanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Acc Permintaan Peminjaman</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/admin/accPeminjaman" method="post">
                    <input type="hidden" name="id_proses" id="acc_id_proses" value="">
                    <input type="hidden" name="id_jadwal" id="tolak_id_jadwal" value="">

                    <div class="mb-3">
                        <label for="pesan" class="form-label">Alasan Setuju</label>
                        <input type="text" class="form-control" id="pesan" name="pesan" autocomplete="off" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button class="btn btn-success" name="submit" type="submit">Setuju</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Pesan Penolakan Modal-->
<div class="modal fade" id="pesanPenolakanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alasan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="pesan" class="form-label">Alasan Penolakan</label>
                    <h5 id="alasan"></h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= BASEURL; ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= BASEURL; ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= BASEURL; ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= BASEURL; ?>/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= BASEURL; ?>/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= BASEURL; ?>/js/demo/chart-area-demo.js"></script>
<script src="<?= BASEURL; ?>/js/demo/chart-pie-demo.js"></script>

<!-- Script sendiri -->
<script src="<?= BASEURL; ?>/js/script.js"></script>

<script src="<?= BASEURL; ?>/js/warna.js"></script>

<!-- Pop Up -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>

</html>