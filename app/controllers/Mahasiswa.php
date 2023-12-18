<?php

class Mahasiswa extends Controller
{
    public function index()
    {
        if (isset($_SESSION['tipe']) && $_SESSION['tipe'] == 'mahasiswa') {
            $data['totalPeminjaman'] = $this->model('Proses_model')->countPeminjamanMHS($_SESSION['username']);
            $data['permintaanPeminjaman'] = $this->model('Proses_model')->countPermintaanPeminjaman($_SESSION['username']);
            $data['totalDiacc'] = $this->model('Proses_model')->countDiacc($_SESSION['username']);
            $data['totalDitolak'] = $this->model('Proses_model')->countDitolak($_SESSION['username']);
            $data['judul'] = 'Mahasiswa';
            $this->view('templates/header', $data);
            $this->view('mahasiswa/index', $data);
            $this->view('templates/footer');
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
                // Atur ulang variabel sesi first_login agar pesan tidak ditampilkan lagi pada login berikutnya
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
    public function peminjaman()
    {
        $data['judul'] = 'Peminjaman';
        $data['proses'] = $this->model('Proses_model')->fetch();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/peminjaman', $data);
        $this->view('templates/footer');
    }

    public function peminjamanDiAcc()
    {
        $data['judul'] = 'Peminjaman';
        $data['proses'] = $this->model('Proses_model')->fetchAcc();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/peminjaman', $data);
        $this->view('templates/footer');
    }

    public function peminjamanDiTolak()
    {
        $data['judul'] = 'Peminjaman';
        $data['proses'] = $this->model('Proses_model')->fetchTolak();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/peminjaman', $data);
        $this->view('templates/footer');
    }
    public function prosesPinjam()
    {
        $data['judul'] = 'Peminjaman';
        $data['proses'] = $this->model('Proses_model')->fetch();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/prosesPinjam', $data);
        $this->view('templates/footer');
        if (isset($_SESSION['popuppinjam']) && $_SESSION['popuppinjam'] === true) {
            ?>
            <script>
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Berhasil Pinjam Ruangan",
                    showConfirmButton: false,
                    showCloseButton: true,
                });
            </script>
        <?php
            $_SESSION['popuppinjam'] = false;
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
            // Atur ulang variabel sesi popupberhasil agar pesan tidak ditampilkan lagi pada login berikutnya
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
                $this->model('Proses_model')->insert($idRuang, $username, $tanggalPeminjam);

                header('Location: ' . BASEURL . '/mahasiswa/prosesPinjam');
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
        $this->view('mahasiswa/tanggalPeminjaman');
        $this->view('templates/footer');
    }

    public function ubahPassword()
    {
        if ($this->model('User_model')->validasi($_SESSION['username'], $_POST['password'])) {
            if ($this->model('User_model')->ubah($_POST['password_edit'])) {
                $_SESSION['popuppw'] = true;
                header('Refresh: 0; url=' . BASEURL . '/' . $_SESSION['tipe'] . '/profile');
            } else {
                echo "GAGAL UBAH";
            }
        } else {
            echo "GAGAL, pass lama salah";
        }
    }

    public function profile()
    {
        $data['judul'] = 'Profile';
        $data['profile'] = $this->model('Mahasiswa_model')->fetch_profile($_SESSION['username']);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/profile', $data);
        $this->view('templates/footer');
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
        // var_dump($_POST['id_jadwal']);

        $this->model('Jadwal_model')->setStatusPinjam($_POST['id_jadwal']);

        if ($this->model('Proses2_model')->insert()) {
            $_SESSION['popuppinjam'] = true;
            header('Location: ' . BASEURL . '/mahasiswa/prosesPinjam');
            exit();
        } else {
            echo "SEK GAGAL";
        }
    }

    public function uploadFile($id_proses)
    {
        // var_dump($_FILES); die;
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
                        if ($this->model('Proses_model')->upFile($id_proses, $nama)) {
                            $_SESSION['popupberhasil'] = true;
                            header('Refresh: 0; url=' . BASEURL . '/mahasiswa/prosesPinjam');
                        }
                    } else {
                        $_SESSION['popupgagal'] = true;
                        header('Refresh: 0; url=' . BASEURL . '/mahasiswa/prosesPinjam');
                    }
                } else {
                    $_SESSION['filetidaksesuai'] = true;
                    header('Refresh: 0; url=' . BASEURL . '/mahasiswa/prosesPinjam');
                }
            } else if ($error === 4) {
                $_SESSION['popupbelumpilihfile'] = true;
                header('Refresh: 0; url=' . BASEURL . '/mahasiswa/prosesPinjam');
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

            header('Location: ' . BASEURL . '/mahasiswa/ruang' . $_SESSION['ruang']);
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

    public function ruang5()
    {
        $_SESSION['ruang'] = 5;
        if (isset($_SESSION['tanggal'])) {

            $this->model('Jadwal_model')->setStatus($_SESSION['hari'], $_SESSION['tanggal']);
            $data['ruang'] = $this->model('JadwalRuang_model')->fetch(5, $_SESSION['tanggal']);
            $data['judul'] = 'Lantai 5';
            $data['tanggal'] = $_SESSION['tanggal'];
            $this->view('templates/header', $data);
            $this->view('mahasiswa/ruang5', $data);
            $this->view('templates/footer');
        } else {
            header('Location: ' . BASEURL . '/mahasiswa/tanggalPeminjaman');
            exit();
        }
    }

    public function ruang6()
    {
        $_SESSION['ruang'] = 6;
        if (isset($_SESSION['tanggal'])) {
            $data['ruang'] = $this->model('JadwalRuang_model')->fetch(6);
            $data['judul'] = 'Lantai 6';
            $data['tanggal'] = $_SESSION['tanggal'];
            // var_dump($data['tanggal']);
            $this->view('templates/header', $data);
            $this->view('mahasiswa/ruang6', $data);
            $this->view('templates/footer');
            // unset($_SESSION['tanggal']);
        } else {
            header('Location: ' . BASEURL . '/mahasiswa/tanggalPeminjaman');
            exit();
        }
    }

    public function ruang7()
    {
        $_SESSION['ruang'] = 7;
        if (isset($_SESSION['tanggal'])) {
            $data['ruang'] = $this->model('Ruang_model')->fetch(7);
            $data['judul'] = 'Lantai 7';
            $data['tanggal'] = $_SESSION['tanggal'];
            $this->view('templates/header', $data);
            $this->view('mahasiswa/ruang7', $data);
            $this->view('templates/footer');
            unset($_SESSION['tanggal']);
        } else {
            header('Location: ' . BASEURL . '/mahasiswa/tanggalPeminjaman');
            exit();
        }
    }

    public function ruang8()
    {
        $_SESSION['ruang'] = 8;
        if (isset($_SESSION['tanggal'])) {
            $data['ruang'] = $this->model('Ruang_model')->fetch(8);
            $data['judul'] = 'Lantai 8';
            $data['tanggal'] = $_SESSION['tanggal'];
            $this->view('templates/header', $data);
            $this->view('mahasiswa/ruang8', $data);
            $this->view('templates/footer');
            unset($_SESSION['tanggal']);
        } else {
            header('Location: ' . BASEURL . '/mahasiswa/tanggalPeminjaman');
            exit();
        }
    }

    //menampilkan detail ruangan
    public function detailRuang($id_ruang)
    {
        echo json_encode($this->model('Ruang_model')->fetch_single($id_ruang));
    }
}
