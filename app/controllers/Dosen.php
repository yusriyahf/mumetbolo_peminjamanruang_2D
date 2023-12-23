<?php

class dosen extends Controller
{
    public function index()
    {
        if (isset($_SESSION['tipe']) && $_SESSION['tipe'] == 'dosen') {
            $data['totalPeminjaman'] = $this->model('ViewProses_model')->countPeminjamanMHS($_SESSION['username']);
            $data['permintaanPeminjaman'] = $this->model('ViewProses_model')->countPermintaanPeminjaman($_SESSION['username']);
            $data['totalDiacc'] = $this->model('ViewProses_model')->countDiacc($_SESSION['username']);
            $data['totalDitolak'] = $this->model('ViewProses_model')->countDitolak($_SESSION['username']);
            $data['judul'] = 'dosen';
            $this->view('templates/header', $data);
            $this->view('dosen/index', $data);
            $this->view('templates/footer');
            $this->view('dosen/modal', $data);
            if (isset($_SESSION['first_login']) && $_SESSION['first_login'] === true) {
?>
                <script>
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "<?= $_SESSION['username']; ?> Berhasil Login",
                        showConfirmButton: false,
                        showCloseButton: true,
                    });
                </script>
            <?php
                $_SESSION['first_login'] = false;
            }
        } else {
            if (isset($_SESSION['tipe'])) {
                echo "<script>alert('ANDA TIDAK MEMILIKI AKSES KE HALAMAN INI')</script>";
                header('Refresh: 0; url=' . BASEURL . '/' . $_SESSION['tipe'] . '/');
            } else {
                echo "<script>alert('Lakukan Login Terlebih Dahulu')</script>";
                header('Refresh: 0; url=' . BASEURL);
            }
        }
    }
    public function peminjaman($filter = null)
    {
        $data['judul'] = 'Peminjaman';
        if ($filter == null) {
            $data['proses'] = $this->model('ViewProses_model')->fetch();
        } else if ($filter == 'diacc') {
            $data['proses'] = $this->model('ViewProses_model')->fetchAcc();
        } else if ($filter == 'ditolak') {
            $data['proses'] = $this->model('ViewProses_model')->fetchTolak();
        }
        $this->view('templates/header', $data);
        $this->view('dosen/peminjaman', $data);
        $this->view('templates/footer');
        $this->view('dosen/modal', $data);
    }

    public function prosesPinjam()
    {
        $data['judul'] = 'Peminjaman';
        $data['proses'] = $this->model('ViewProses_model')->fetch();
        $this->view('templates/header', $data);
        $this->view('dosen/prosesPinjam', $data);
        $this->view('templates/footer');
        $this->view('dosen/modal', $data);
        if (isset($_SESSION['gabole']) && $_SESSION['gabole'] === true) {
            ?>
            <script>
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Anda Masih Memiliki Peminjaman Yang Menunggu Diproses",
                    showConfirmButton: false,
                    showCloseButton: true,
                });
            </script>
        <?php
            $_SESSION['gabole'] = false;
        } else if (isset($_SESSION['popuppw']) && $_SESSION['popuppw'] === true) {
        ?>
            <script>
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Password berhasil diubah",
                    showConfirmButton: false,
                    showCloseButton: true,
                });
            </script>
        <?php
            $_SESSION['popuppw'] = false;
        } else if (isset($_SESSION['popupberhasil']) && $_SESSION['popupberhasil'] === true) {
        ?>
            <script>
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Berhasil Upload File",
                    showConfirmButton: false,
                    showCloseButton: true,
                });
            </script>
        <?php
            $_SESSION['popupberhasil'] = false;
        } else if (isset($_SESSION['popupgagal']) && $_SESSION['popupgagal'] === true) {
        ?>
            <script>
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Gagal Upload File",
                    showConfirmButton: false,
                    showCloseButton: true,
                });
            </script>
        <?php
            $_SESSION['popupbelumpillihfile'] = false;
        } else if (isset($_SESSION['popupbelumpilihfile']) && $_SESSION['popupbelumpilihfile'] === true) {
        ?>
            <script>
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Belum pilih file",
                    showConfirmButton: false,
                    showCloseButton: true,
                });
            </script>
        <?php
            $_SESSION['popupbelumpilihfile'] = false;
        } else if (isset($_SESSION['filetidaksesuai']) && $_SESSION['filetidaksesuai'] === true) {
        ?>
            <script>
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "File Tidak Sesuai Format pdf",
                    showConfirmButton: false,
                    showCloseButton: true,
                });
            </script>
        <?php
            $_SESSION['filetidaksesuai'] = false;
        }
    }

    public function pinjamRuang($id, $tanggal)
    {
        if (isset($_SESSION['username'])) {
            $idRuang = $id;
            $tanggalPeminjam = $tanggal;

            if ($idRuang && $tanggalPeminjam) {
                $username = $_SESSION['username'];
                $this->model('ViewProses_model')->insert($idRuang, $username, $tanggalPeminjam);

                header('Location: ' . BASEURL . '/dosen/prosesPinjam');
                exit();
            } else {
                header('Location: gagalcok.php');
                exit();
            }
        } else {
            header('Location: halaman_login.php');
            exit();
        }
    }

    public function tanggalPeminjaman()
    {
        $data['judul'] = 'Tanggal Peminjaman';
        $this->view('templates/header', $data);
        $this->view('dosen/tanggalPeminjaman');
        $this->view('templates/footer');
        $this->view('dosen/modal', $data);
    }

    public function ubahPassword()
    {
        if ($this->model('User_model')->validasi($_SESSION['username'], $_POST['password'])) {
            if ($this->model('User_model')->ubah($_POST['password_edit'])) {
                $_SESSION['popuppw'] = true;
                header('Refresh: 0; url=' . BASEURL . '/' . $_SESSION['tipe'] . '/profile');
            } else {
                echo "<script>alert('Gagal Ubah')</script>";
                header('Refresh: 0; url=' . BASEURL . '/' . $_SESSION['tipe'] . '/profile');
            }
        } else {
            echo "<script>alert('Password lama salah')</script>";
            header('Refresh: 0; url=' . BASEURL . '/' . $_SESSION['tipe'] . '/profile');
        }
    }

    public function profile()
    {
        $data['judul'] = 'Profile';
        $data['profile'] = $this->model('dosen_model')->fetch_profile($_SESSION['username']);
        $this->view('templates/header', $data);
        $this->view('dosen/profile', $data);
        $this->view('templates/footer');
        $this->view('dosen/modal', $data);

        if (isset($_SESSION['popuppw']) && $_SESSION['popuppw'] === true) {
        ?>
            <script>
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Password berhasil diubah",
                    showConfirmButton: false,
                    showCloseButton: true,
                });
            </script>
<?php
            $_SESSION['popuppw'] = false;
        }
    }

    public function formPinjam()
    {
        $_SESSION['tujuan'] = $_POST['tujuan'];

        if ($this->model('Proses_model')->cekPinjam($_SESSION['username'])) {
            $this->model('Jadwal_model')->setStatusPinjam($_POST['id_jadwal']);
            if ($this->model('Proses_model')->insert()) {
                $_SESSION['popuppinjam'] = true;
                header('Location: ' . BASEURL . '/dosen/prosesPinjam');
                exit();
            } else {
                echo "SEK GAGAL";
            }
        } else {
            $_SESSION['gabole'] = true;
            header('Location: ' . BASEURL . '/dosen/prosesPinjam');
        }
    }

    public function uploadFile($id_proses)
    {

        if (isset($_POST['submit'])) {
            $nama_file = $_FILES['suratPinjam']['name'];
            $ukuran = $_FILES['suratPinjam']['size'];
            $error = $_FILES['suratPinjam']['error'];
            $tmp = $_FILES['suratPinjam']['tmp_name'];
            $size = $_FILES['suratPinjam']['size'];

            $maxFileSize = 10 * 1024 * 1024; //10mb

            if ($error === 0) {
                $ekstensi = ['pdf'];
                $ekstensiFile = explode('.', $nama_file);
                $ekstensiFile = strtolower(end($ekstensiFile));
                if (in_array($ekstensiFile, $ekstensi) && $ukuran <= $maxFileSize) {
                    $nama = $id_proses . '-' . $_SESSION['username'] . '.' . $ekstensiFile;
                    if (move_uploaded_file($tmp, '../public/uploadFile/' . $nama)) {
                        if ($this->model('ViewProses_model')->upFile($id_proses, $nama)) {
                            $_SESSION['popupberhasil'] = true;
                            header('Refresh: 0; url=' . BASEURL . '/dosen/prosesPinjam');
                        }
                    } else {
                        $_SESSION['popupgagal'] = true;
                        header('Refresh: 0; url=' . BASEURL . '/dosen/prosesPinjam');
                    }
                } else {
                    $_SESSION['filetidaksesuai'] = true;
                    header('Refresh: 0; url=' . BASEURL . '/dosen/prosesPinjam');
                }
            } else if ($error === 4) {
                $_SESSION['popupbelumpilihfile'] = true;
                header('Refresh: 0; url=' . BASEURL . '/dosen/prosesPinjam');
            }
        }
    }

    public function processForm()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tanggal = $_POST['tanggal'];

            $_SESSION['tanggal'] = $tanggal;

            $hari = $this->getIndonesianDayName($tanggal);

            $_SESSION['hari'] = $hari;

            header('Location: ' . BASEURL . '/dosen/ruang/' . $_SESSION['ruang']);
            unset($_SESSION['ruang']);
        }
    }

    private function getIndonesianDayName($tanggal)
    {
        $days = array(
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        );

        $dayInEnglish = date('l', strtotime($tanggal));

        return isset($days[$dayInEnglish]) ? $days[$dayInEnglish] : $dayInEnglish;
    }

    public function ruang($lantai)
    {
        $_SESSION['ruang'] = $lantai;
        if (isset($_SESSION['tanggal'])) {
            $this->model('Jadwal_model')->setStatus($_SESSION['hari'], $_SESSION['tanggal']);
            $data['ruang'] = $this->model('ViewJadwal_model')->cekJadwal($lantai, $_SESSION['tanggal'], $_SESSION['hari']);
            $data['judul'] = 'Lantai ' . $lantai;
            $data['lantai'] = $lantai;
            $data['tanggal'] = $_SESSION['tanggal'];
            $this->view('templates/header', $data);
            $this->view('dosen/ruang', $data);
            $this->view('templates/footer');
            $this->view('dosen/modal', $data);
        } else {
            header('Location: ' . BASEURL . '/dosen/tanggalPeminjaman');
            exit();
        }
    }

    //menampilkan detail ruangan
    public function detailRuang($id_ruang)
    {
        echo json_encode($this->model('Ruang_model')->fetch_single($id_ruang));
    }

    public function surat($id_proses)
    {
        $data['judul'] = 'Cetak Surat';
        $data['proses'] = $this->model('ViewProses_model')->fetch_IdProses($id_proses);
        $data['profil'] = $this->model('Dosen_model')->fetch_profile($_SESSION['username']);
        // echo $data['profil']['nim']; die;
        $this->view('templates/header', $data);
        $this->view('dosen/pdf', $data);
        $this->view('templates/footer');
    }
}
