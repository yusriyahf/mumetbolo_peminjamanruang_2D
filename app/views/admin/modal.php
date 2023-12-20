<!-- Tambah Data Mahasiswa Modal-->
<div class="modal fade" id="formTambahModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/admin/tambahMahasiswa" method="post">
                    <input type="hidden" name="id_mahasiswa" id="id_mahasiswa">
                    <div class="mb-3">
                        <label for="nim" class="form-label">Nim</label>
                        <input type="text" class="form-control" id="nim" name="nim" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="no_tlp" class="form-label">No Telpon</label>
                        <input type="text" class="form-control" id="no_tlp" name="no_tlp" autocomplete="off" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="kelas" class="form-label">Kelas:</label>
                        <select name="kelas" id="kelas" class="form-control">
                            <option value="1A">1A</option>
                            <option value="1B">1B</option>
                            <option value="1C">1C</option>
                            <option value="1D">1D</option>
                            <option value="1E">1E</option>
                            <option value="1F">1F</option>
                            <option value="1G">1G</option>
                            <option value="1H">1H</option>
                            <option value="1I">1I</option>
                            <option value="2A">2A</option>
                            <option value="2B">2B</option>
                            <option value="2C">2C</option>
                            <option value="2D">2D</option>
                            <option value="2E">2E</option>
                            <option value="2F">2F</option>
                            <option value="2G">2G</option>
                            <option value="2H">2H</option>
                            <option value="2I">2I</option>
                        </select>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="prodi" class="form-label">Prodi:</label>
                        <select name="prodi" id="prodi" class="form-control">
                            <option value="D-IV TI">D-IV TI</option>
                            <option value="DI-IV SIB">D-IV SIB</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Tambah Data Dosen Modal-->
<div class="modal fade" id="formTambahDosenModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data Dosen</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/admin/tambahDosen" method="post">
                    <input type="hidden" name="id_dosen" id="id_dosen">
                    <div class="mb-3">
                        <label for="nip" class="form-label">Nip</label>
                        <input type="text" class="form-control" id="nip" name="nip" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="jabatan" class="form-label">Jabatan:</label>
                        <select name="jabatan" id="jabatan" class="form-control">
                            <option value="kajur">Ketua Jurusan</option>
                            <option value="sekjur">Sekretaris Jurusan</option>
                            <option value="dosen">Dosen</option>
                        </select>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="prodi" class="form-label">Prodi:</label>
                        <select name="prodi" id="prodi" class="form-control">
                            <option value="D-IV TI">D-IV TI</option>
                            <option value="DI-IV SIB">D-IV SIB</option>
                        </select>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="no_tlp" class="form-label">No Telepon</label>
                        <input type="text" class="form-control" id="no_tlp" name="no_tlp" autocomplete="off" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Tambah Data Ruang Modal-->
<div class="modal fade" id="formTambahRuang" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data Ruangan Lantai <?= $data['lantai']; ?></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/admin/tambahRuang/<?= $data['lantai']; ?>" method="post">
                    <input type="hidden" name="lantai" id="lantai" value="<?= $data['lantai']; ?>">
                    <div class="mb-3">
                        <label for="id_ruang" class="form-label">ID Ruangan</label>
                        <input type="text" class="form-control" id="id_ruang" name="id_ruang" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_rg" class="form-label">Nama Ruangan</label>
                        <input type="text" class="form-control" id="nama_rg" name="nama_rg" autocomplete="off" required>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="jenis_rg" class="form-label">Jenis Ruangan:</label>
                        <select name="jenis_rg" id="rg" class="form-control">
                            <option value="Teori">Teori</option>
                            <option value="Praktikum">Praktikum</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="kapasitas" class="form-label">Kapasitas</label>
                        <input type="number" class="form-control" id="kapasitas" name="kapasitas" min="1" max="100" autocomplete="off" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Ubah Data Ruang Modal-->
<div class="modal fade" id="formEditRuang" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Ubah Data Ruangan Lantai <?= $data['lantai']; ?></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/admin/ubahRuang/<?= $data['lantai']; ?>" method="post">
                    <input type="hidden" name="lantai" id="lantai" value="<?= $data['lantai']; ?>">
                    <input type="hidden" name="id_ruang_lama" id="id_ruang_lama" value="">
                    <div class="mb-3">
                        <label for="id_ruang" class="form-label">ID Ruangan</label>
                        <input type="text" class="form-control" id="id_ruang_edit" name="id_ruang_edit" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_rg" class="form-label">Nama Ruangan</label>
                        <input type="text" class="form-control" id="nama_rg_edit" name="nama_rg" autocomplete="off" required>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="jenis_rg" class="form-label">Jenis Ruangan:</label>
                        <select name="jenis_rg" id="jenis_rg_edit" class="form-control">
                            <option value="Teori">Teori</option>
                            <option value="Praktikum">Praktikum</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="kapasitas" class="form-label">Kapasitas</label>
                        <input type="number" class="form-control" id="kapasitas_edit" name="kapasitas" min="1" max="100" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="fasilitas" class="form-label">Fasilitas</label>
                        <input type="text" class="form-control" id="fasilitas_edit" name="fasilitas" autocomplete="off" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Ubah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Ubah Data Mahasiswa Modal-->
<div class="modal fade" id="formEditModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Ubah Data Mahasiswa</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/admin/ubahMahasiswa" method="post">
                    <input type="hidden" name="id_mahasiswa" id="id_mahasiswa_edit" value="">
                    <input type="hidden" name="username" id="usernameMhs" value="">
                    <div class="mb-3">
                        <label for="nim" class="form-label">Nim</label>
                        <input type="text" class="form-control" id="nim_edit" name="nim" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama_edit" name="nama" autocomplete="off" required>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                        <select name="jenis_kelamin" id="jenis_kelamin_edit" class="form-control">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="no_tlp" class="form-label">No Telpon</label>
                        <input type="text" class="form-control" id="no_tlp_edit" name="no_tlp" autocomplete="off" required>
                    </div>
                    <!-- <div class="mb-3">
                            <label for="prodi" class="form-label">prodi</label>
                            <input type="text" class="form-control" id="prodi_edit" name="prodi" autocomplete="off" required>
                        </div> -->
                    <div class="mb-3 form-group">
                        <label for="kelas" class="form-label">Kelas:</label>
                        <select name="kelas" id="kelas_edit" class="form-control">
                            <option value="1A">1A</option>
                            <option value="1B">1B</option>
                            <option value="1C">1C</option>
                            <option value="1D">1D</option>
                            <option value="1E">1E</option>
                            <option value="1F">1F</option>
                            <option value="1G">1G</option>
                            <option value="1H">1H</option>
                            <option value="1I">1I</option>
                            <option value="2A">2A</option>
                            <option value="2B">2B</option>
                            <option value="2C">2C</option>
                            <option value="2D">2D</option>
                            <option value="2E">2E</option>
                            <option value="2F">2F</option>
                            <option value="2G">2G</option>
                            <option value="2H">2H</option>
                            <option value="2I">2I</option>
                        </select>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="prodi" class="form-label">Prodi:</label>
                        <select name="prodi" id="prodi_edit" class="form-control">
                            <option value="D-IV TI">D-IV TI</option>
                            <option value="DI-IV SIB">D-IV SIB</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Ubah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Ubah Data Dosen Modal-->
<div class="modal fade" id="formEditModalDosen" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Ubah Data Dosen</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/admin/ubahDosen" method="post">
                    <input type="hidden" name="id_dosen" id="id_dosen_edit" value="">
                    <input type="hidden" name="username" id="usernameDsn" value="">
                    <div class="mb-3">
                        <label for="nim" class="form-label">Nip</label>
                        <input type="text" class="form-control" id="nip_edit" name="nip" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="namaDsn_edit" name="nama" autocomplete="off" required>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="jabatan" class="form-label">Jabatan:</label>
                        <select name="jabatan" id="jabatan_edit" class="form-control">
                            <option value="kajur">Ketua Jurusan</option>
                            <option value="sekjur">Sekretaris Jurusan</option>
                            <option value="dosen">Dosen</option>
                        </select>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="prodi" class="form-label">Prodi:</label>
                        <select name="prodi" id="prodiDsn_edit" class="form-control">
                            <option value="D-IV TI">D-IV TI</option>
                            <option value="DI-IV SIB">D-IV SIB</option>
                        </select>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                        <select name="jenis_kelamin" id="jkDosen_edit" class="form-control">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="no_tlp" class="form-label">No Telpon</label>
                        <input type="text" class="form-control" id="tlpDosen_edit" name="no_tlp" autocomplete="off" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Ubah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Acc Permintaan Peminjaman Modal-->
<div class="modal fade" id="accPeminjamanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Setujui Permintaan Peminjaman</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/admin/accPeminjaman" method="post">
                    <input type="hidden" name="id_proses" id="acc_id_proses" value="">
                    <input type="hidden" name="id_jadwal" id="acc_id_jadwal" value="">

                    <div class="mb-3">
                        <label for="pesan" class="form-label">Setujui Permintaan?</label>
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

<!-- Tolak Permintaan Peminjaman Modal-->
<div class="modal fade" id="tolakPeminjamanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tolak Permintaan Peminjaman</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/admin/tolakPeminjaman" method="post">
                    <input type="hidden" name="id_proses" id="tolak_id_proses" value="">
                    <input type="hidden" name="id_jadwal" id="tolak_id_jadwal" value="">
                    <div class="mb-3">
                        <label for="pesan" class="form-label">Alasan Penolakan</label>
                        <input type="text" class="form-control" id="pesan" name="pesan" autocomplete="off" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button class="btn btn-danger" name="submit" type="submit">Tolak</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Tambah Data Jadwal Modal-->
<div class="modal fade" id="formTambahJadwalModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data Jadwal</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/admin/tambahJadwal" method="post">
                    <div class="mb-3">
                        <label for="id_ruang" class="form-label">Ruang:</label>
                        <select name="id_ruang" id="id_ruang" class="form-control">
                            <?php foreach ($data['ruang'] as $ruang): ?>
                                <option value="<?= $ruang['id_ruang']; ?>"><?= $ruang['nama_ruang']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="tanggal" class="form-label">Tanggal Mulai:</label>
                        <input type="date" class="form-control" id="mulai" name="mulai" required>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="tanggal" class="form-label">Tanggal Selesai:</label>
                        <input type="date" class="form-control" id="selesai" name="selesai" required>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="hari" class="form-label">Hari:</label>
                        <select name="hari" id="hari" class="form-control">
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                        </select>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="keterangan" class="form-label">Matakuliah:</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" autocomplete="off" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Ubah Data Jadwal Modal-->
<div class="modal fade" id="formEditModalJadwal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Ubah Data Jadwal</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/admin/ubahJadwal" method="post">
                    <input type="hidden" name="id_jadwal" id="id_jadwal" value="">
                    <div class="mb-3">
                        <label for="id_ruang" class="form-label">Id Ruang</label>
                        <input type="text" class="form-control" id="id_ruang" name="id_ruang" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kegiatan" class="form-label">Jenis Kegiatan</label>
                        <input type="text" class="form-control" id="jenis_kegiatan" name="jenis_kegiatan" autocomplete="off" required value="KBM">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="hari" class="form-label">Hari:</label>
                        <select name="hari" id="hari" class="form-control">
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                        </select>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="keterangan" class="form-label">Keterangan:</label>
                        <select name="keterangan" id="keterangan" class="form-control">
                            <option value="Manajemen Proyek">Manajemen Proyek</option>
                            <option value="Desain Pemrograman Web">Desain Pemrograman Web</option>
                            <option value="Aritificial Intelligence">Aritificial Intelligence</option>
                            <option value="Pemrograman Berbasis Objek">Pemrograman Berbasis Objek</option>
                            <option value="Matematika">Matematika</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Ubah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>