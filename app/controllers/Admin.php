<?php

class Admin extends Controller
{
    public function index()
    {
        if (isset($_SESSION['tipe']) && $_SESSION['tipe'] == 'admin') {
            $data['permintaanPeminjaman'] = $this->model('ViewProses_model')->countPermintaanPeminjamanAdmin();
            $data['totalPeminjaman'] = $this->model('ViewProses_model')->countPeminjaman($_SESSION['username']);
            $data['totalDosen'] = $this->model('Dosen_model')->countDosen($_SESSION['username']);
            $data['totalMhs'] = $this->model('Mahasiswa_model')->countMahasiswa($_SESSION['username']);
            $data['totalRuang'] = $this->model('Ruang_model')->countRuang($_SESSION['username']);
            $data['judul'] = 'Admin';
            $this->view('templates/header', $data);
            $this->view('admin/index', $data);
            $this->view('templates/footer');
            $this->view('admin/modal', $data);
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
                header('Refresh: 0; url=' . BASEURL . '/' . $_SESSION['tipe']);
            } else {
                echo "<script>alert('Lakukan Login Terlebih Dahulu')</script>";
                header('Refresh: 0; url=' . BASEURL);
            }
        }
    }

    public function alasanPenolakan($id_ruang)
    {
        $result = $this->model('ViewProses_model')->fetch_single($id_ruang);
        echo json_encode($result);
    }


    public function tolakPeminjaman()
    {
        $id_proses = $_POST['id_proses'];
        $status = 'ditolak';
        $pesan = $_POST['pesan'];

        $this->model('Jadwal_model')->setStatusTolak($_POST['id_jadwal']);
        if ($this->model('Proses_model')->ubahStatus($id_proses, $status, $pesan)) {
            $_SESSION['popuptolak'] = true;
            header('Location: ' . BASEURL . '/admin/peminjaman');
            exit();
        } else {
            header('Location: ' . BASEURL . '/admin/peminjaman');
            exit();
        }
    }

    public function accPeminjaman()
    {
        $id_proses = $_POST['id_proses'];
        $status = 'disetujui';
        $pesan = '';

        $this->model('Jadwal_model')->setStatusAcc($_POST['id_jadwal']);
        if ($this->model('Proses_model')->ubahStatus($id_proses, $status, $pesan)) {
            // $_SESSION['popuptolak'] = true;
            header('Location: ' . BASEURL . '/admin/peminjaman');
            exit();
        } else {
            header('Location: ' . BASEURL . '/admin/peminjaman');
            exit();
        }
    }

    public function peminjaman()
    {
        if (isset($_SESSION['tipe']) && $_SESSION['tipe'] == 'admin') {
            // $data['status'] = $this->model('ViewProses_model')->getStatus();
            $data['proses'] = $this->model('ViewProses_model')->fetch();
            $data['judul'] = 'Peminjaman';
            $this->view('templates/header', $data);
            $this->view('admin/peminjaman', $data);
            $this->view('templates/footer', $data);
            $this->view('admin/modal', $data);

            if (isset($_SESSION['popuptolak']) && $_SESSION['popuptolak'] === true) {
            ?>
                <script>
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Permintaan Peminjaman Ditolak",
                        showConfirmButton: false,
                        showCloseButton: true,
                    });
                </script>
<?php
                $_SESSION['popuptolak'] = false;
            }
        } else {
            if (isset($_SESSION['tipe'])) {
                echo "<script>alert('ANDA TIDAK MEMILIKI AKSES KE HALAMAN INI')</script>";
                header('Refresh: 0; url=' . BASEURL . '/' . $_SESSION['tipe']);
            } else {
                echo "<script>alert('Lakukan Login Terlebih Dahulu')</script>";
                header('Refresh: 0; url=' . BASEURL);
            }
        }
    }
    public function peminjamanDiAcc()
    {
        if (isset($_SESSION['tipe']) && $_SESSION['tipe'] == 'admin') {
            // $data['status'] = $this->model('ViewProses_model')->getStatus();
            $data['proses'] = $this->model('ViewProses_model')->fetchAcc();
            $data['judul'] = 'Peminjaman';
            $this->view('templates/header', $data);
            $this->view('admin/peminjaman', $data);
            $this->view('templates/footer', $data);
            $this->view('admin/modal', $data);
        } else {
            if (isset($_SESSION['tipe'])) {
                echo "<script>alert('ANDA TIDAK MEMILIKI AKSES KE HALAMAN INI')</script>";
                header('Refresh: 0; url=' . BASEURL . '/' . $_SESSION['tipe']);
            } else {
                echo "<script>alert('Lakukan Login Terlebih Dahulu')</script>";
                header('Refresh: 0; url=' . BASEURL);
            }
        }
    }
    public function peminjamanDitolak()
    {
        if (isset($_SESSION['tipe']) && $_SESSION['tipe'] == 'admin') {
            // $data['status'] = $this->model('ViewProses_model')->getStatus();
            $data['proses'] = $this->model('ViewProses_model')->fetchTolak();
            $data['judul'] = 'Peminjaman';
            $this->view('templates/header', $data);
            $this->view('admin/peminjaman', $data);
            $this->view('templates/footer', $data);
            $this->view('admin/modal', $data);
        } else {
            if (isset($_SESSION['tipe'])) {
                echo "<script>alert('ANDA TIDAK MEMILIKI AKSES KE HALAMAN INI')</script>";
                header('Refresh: 0; url=' . BASEURL . '/' . $_SESSION['tipe']);
            } else {
                echo "<script>alert('Lakukan Login Terlebih Dahulu')</script>";
                header('Refresh: 0; url=' . BASEURL);
            }
        }
    }
    public function permintaanPeminjaman()
    {
        if (isset($_SESSION['tipe']) && $_SESSION['tipe'] == 'admin') {
            $data['proses'] = $this->model('ViewProses_model')->fetch();
            // $data['proses'] = $this->model('ViewProses_model')->fetch(null);
            $data['judul'] = 'Permintaan Peminjaman';
            $this->view('templates/header', $data);
            $this->view('admin/permintaanPeminjaman', $data);
            $this->view('templates/footer', $data);
            $this->view('admin/modal', $data);
        } else {
            if (isset($_SESSION['tipe'])) {
                echo "<script>alert('ANDA TIDAK MEMILIKI AKSES KE HALAMAN INI')</script>";
                header('Refresh: 0; url=' . BASEURL . '/' . $_SESSION['tipe']);
            } else {
                echo "<script>alert('Lakukan Login Terlebih Dahulu')</script>";
                header('Refresh: 0; url=' . BASEURL);
            }
        }
    }

    // ADMIN MANAGE MAHASISWA
    public function cariMahasiswa()
    {
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
        $this->view('templates/header', $data);
        $this->view('admin/mahasiswa', $data);
        $this->view('templates/footer');
        $this->view('admin/modal', $data);
    }
    public function cariDosen()
    {
        $data['judul'] = "Cari Dosen";
        $data['dsn'] = $this->model('Dosen_model')->cariDataDosen();
        $this->view('templates/header', $data);
        $this->view('admin/dosen', $data);
        $this->view('templates/footer');
        $this->view('admin/modal', $data);
    }

    public function cariRuang($lantai)
    {
        $data['ruang'] = $this->model('Ruang_model')->cariDataRuang($lantai);
        $this->view('templates/header', $data);
        $this->view('admin/ruang/' . $lantai, $data);
        $this->view('templates/footer');
        $this->view('admin/modal', $data);
    }

    public function mahasiswa()
    {
        if (isset($_SESSION['tipe']) && $_SESSION['tipe'] == 'admin') {
            $data['mhs'] = $this->model('Mahasiswa_model')->fetch();
            $data['judul'] = 'Mahasiswa';
            $this->view('templates/header', $data);
            $this->view('admin/mahasiswa', $data);
            $this->view('templates/footer');
            $this->view('admin/modal', $data);
        } else {
            if (isset($_SESSION['tipe'])) {
                echo "<script>alert('ANDA TIDAK MEMILIKI AKSES KE HALAMAN INI')</script>";
                header('Refresh: 0; url=' . BASEURL . '/' . $_SESSION['tipe']);
            } else {
                echo "<script>alert('Lakukan Login Terlebih Dahulu')</script>";
                header('Refresh: 0; url=' . BASEURL);
            }
        }
    }

    public function hapusMahasiswa($id)
    {
        $delMhs = $this->model('Mahasiswa_model')->delete($id);
        if ($delMhs != null) {
            if ($this->model('User_model')->delete($delMhs)) {
                Flasher::setFlash('berhasil', 'dihapus', 'success', 'Data mahasiswa');
                header('Location: ' . BASEURL . '/admin/mahasiswa');
                exit();
            } else {
                Flasher::setFlash('gagal', 'dihapus', 'danger', 'user mahasiswa');
                header('Location: ' . BASEURL . '/admin/mahasiswa');
                exit();
            }
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger', 'user mahasiswa');
            header('Location: ' . BASEURL . '/admin/mahasiswa');
            exit();
        }
    }

    public function tambahMahasiswa()
    {
        $result = $this->model('User_model')->add($_POST['nama'], $_POST['nim'], 'mahasiswa');
        if ($result != null) {
            $mahasiswaModel = $this->model('Mahasiswa_model');

            // Lakukan penambahan mahasiswa
            if ($mahasiswaModel->insert($result)) {

                Flasher::setFlash('berhasil', 'ditambahkan', 'success', 'Data mahasiswa');
                header('Location: ' . BASEURL . '/admin/mahasiswa');
                exit();
            } else {
                Flasher::setFlash('gagal', 'ditambahkan', 'danger', 'Data mahasiswa');
                header('Location: ' . BASEURL . '/admin/mahasiswa');
                exit();
            }
        }
    }

    public function getUbahMahasiswa($id)
    {
        echo json_encode($this->model('Mahasiswa_model')->fetch_single($id));
    }

    public function ubahMahasiswa()
    {
        if ($this->model('User_model')->ubahUsername($_POST['nama'], $_POST['username'])) {
            if ($this->model('Mahasiswa_model')->update($_POST['id_mahasiswa'])) {
                Flasher::setFlash('berhasil', 'diubah', 'success', 'Data mahasiswa');
                header('Location: ' . BASEURL . '/admin/mahasiswa');
                exit();
            } else {
                Flasher::setFlash('gagal', 'diubah', 'danger', 'Data mahasiswa');
                header('Location: ' . BASEURL . '/admin/mahasiswa');
                exit();
            }
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger', 'Data mahasiswa');
            header('Location: ' . BASEURL . '/admin/mahasiswa');
            exit();
        }
    }

    public function countMahasiswa()
    {
        $mahasiswaModel = $this->model('Mahasiswa_model');
        return $mahasiswaModel->countMahasiswa();
    }

    // ADMIN MANAGE DOSEN
    public function dosen()
    {
        if (isset($_SESSION['tipe']) && $_SESSION['tipe'] == 'admin') {
            $data['dsn'] = $this->model('Dosen_model')->fetch();
            $data['judul'] = 'Dosen';
            $this->view('templates/header', $data);
            $this->view('admin/dosen', $data);
            $this->view('templates/footer');
            $this->view('admin/modal', $data);


            # code...
        } else {
            if (isset($_SESSION['tipe'])) {
                echo "<script>alert('ANDA TIDAK MEMILIKI AKSES KE HALAMAN INI')</script>";
                header('Refresh: 0; url=' . BASEURL . '/' . $_SESSION['tipe']);
            } else {
                echo "<script>alert('Lakukan Login Terlebih Dahulu')</script>";
                header('Refresh: 0; url=' . BASEURL);
            }
        }
    }

    public function hapusDosen($id)
    {
        $delDsn = $this->model('Dosen_model')->delete($id);
        if ($delDsn != null) {
            if ($this->model('User_model')->delete($delDsn)) {
                Flasher::setFlash('berhasil', 'dihapus', 'success', 'Data dosen');
                header('Location: ' . BASEURL . '/admin/dosen');
                exit();
            } else {
                Flasher::setFlash('gagal', 'dihapus', 'danger', 'Data dosen');
                header('Location: ' . BASEURL . '/admin/dosen');
                exit();
            }
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger', 'user dosen');
            header('Location: ' . BASEURL . '/admin/dosen');
            exit();
        }
    }

    public function tambahDosen()
    {
        $result = $this->model('User_model')->add($_POST['nama'], $_POST['nip'], 'dosen');
        if (isset($result)) {
            if ($this->model('Dosen_model')->insert($result)) {
                Flasher::setFlash('berhasil', 'ditambahkan', 'success', 'Data dosen');
                header('Location: ' . BASEURL . '/admin/dosen');
                exit();
            } else {
                Flasher::setFlash('gagal', 'ditambahkan', 'danger', 'Data dosen');
                header('Location: ' . BASEURL . '/admin/dosen');
                exit();
            }
        }
    }

    public function getUbahDosen($id)
    {
        echo json_encode($this->model('Dosen_model')->fetch_single($id));
    }

    public function ubahDosen()
    {
        if ($this->model('User_model')->ubahUsername($_POST['nama'], $_POST['username'])) {
            if ($this->model('Dosen_model')->update($_POST['id_dosen'])) {
                Flasher::setFlash('berhasil', 'diubah', 'success', 'Data dosen');
                header('Location: ' . BASEURL . '/admin/dosen');
                exit();
            } else {
                Flasher::setFlash('gagal', 'diubah', 'danger', 'Data dosen');
                header('Location: ' . BASEURL . '/admin/dosen');
                exit();
            }
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger', 'Data dosen');
            header('Location: ' . BASEURL . '/admin/dosen');
            exit();
        }
    }

    public function countDosen()
    {
        $dosenModel = $this->model('Dosen_model');
        return $dosenModel->countDosen();
    }

    // ADMIN MANAGE RUANGAN 6

    public function ruang($lantai)
    {
        if (isset($_SESSION['tipe']) && $_SESSION['tipe'] == 'admin') {
            $data['ruang'] = $this->model('Ruang_model')->fetch($lantai);
            $data['judul'] = 'Lantai ' . $lantai;
            $data['lantai'] = $lantai;
            $this->view('templates/header', $data);
            $this->view('admin/ruang', $data);
            $this->view('templates/footer', $data);
            $this->view('admin/modal', $data);
        } else {
            if (isset($_SESSION['tipe'])) {
                echo "<script>alert('ANDA TIDAK MEMILIKI AKSES KE HALAMAN INI')</script>";
                header('Refresh: 0; url=' . BASEURL . '/' . $_SESSION['tipe']);
            } else {
                echo "<script>alert('Lakukan Login Terlebih Dahulu')</script>";
                header('Refresh: 0; url=' . BASEURL);
            }
        }
    }

    public function tambahRuang($lantai)
    {
        if ($this->model('Ruang_model')->insert()) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success', 'Data ruangan');
            header('Location: ' . BASEURL . '/admin/ruang/' . $lantai);
            exit();
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger', 'Data ruangan');
            header('Location: ' . BASEURL . '/admin/ruang/' . $lantai);
            exit();
        }
    }

    public function hapusRuang($id, $lantai)
    {
        if ($this->model('Ruang_model')->delete($id) == true) {
            Flasher::setFlash('berhasil', 'dihapus', 'success', 'Data ruangan');
            header('Location: ' . BASEURL . '/admin/ruang/' . $lantai);
            exit();
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger', 'Data ruangan');
            header('Location: ' . BASEURL . '/admin/ruang/' . $lantai);
            exit();
        }
    }

    public function getUbahRuang($id)
    {
        echo json_encode($this->model('Ruang_model')->fetch_single($id));
    }


    public function countRuang()
    {
        $ruangModel = $this->model('Ruang_model');
        return $ruangModel->countRuang();
    }

    public function ubahRuang($lantai)
    {
        if ($this->model('Ruang_model')->update($_POST['id_ruang_lama'])) {
            Flasher::setFlash('berhasil', 'diubah', 'success', 'Data ruangan');
            header('Location: ' . BASEURL . '/admin/ruang/' . $lantai);
            exit();
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger', 'Data ruangan');
            header('Location: ' . BASEURL . '/admin/ruang/' . $lantai);
            exit();
        }
    }

    //ADMIN MANAGE JADWAL
    public function jadwal()
    {
        if (isset($_SESSION['tipe']) && $_SESSION['tipe'] == 'admin') {
            $data['jd'] = $this->model('ViewJadwal_model')->fetchAdmin();
            $data['judul'] = 'Jadwal';
            $this->view('templates/header', $data);
            $this->view('admin/jadwal', $data);
            $this->view('templates/footer');
            # code...
        } else {
            if (isset($_SESSION['tipe'])) {
                echo "<script>alert('ANDA TIDAK MEMILIKI AKSES KE HALAMAN INI')</script>";
                header('Refresh: 0; url=' . BASEURL . '/' . $_SESSION['tipe']);
            } else {
                echo "<script>alert('Lakukan Login Terlebih Dahulu')</script>";
                header('Refresh: 0; url=' . BASEURL);
            }
        }
    }

    public function tambahJadwal()
    {
        if ($this->model('Jadwal_model')->insert()) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success', 'Data jadwal');
            header('Location: ' . BASEURL . '/admin/jadwal/');
            exit();
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger', 'Data jadwal');
            header('Location: ' . BASEURL . '/admin/jadwal/');
            exit();
        }
    }

    public function getRuangAll()
    {
        echo json_encode($this->model('Ruang_model')->fetchAll());
    }

    public function hapusJadwal($id)
    {
        if ($this->model('Jadwal_model')->delete($id)) {
            Flasher::setFlash('berhasil', 'dihapus', 'success', 'Data jadwal');
            header('Location: ' . BASEURL . '/admin/jadwal/');
            exit();
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger', 'Data jadwal');
            header('Location: ' . BASEURL . '/admin/jadwal/');
            exit();
        }
    }

    public function ubahJadwal()
    {
        if ($this->model('Jadwal_model')->update($_POST['id_jadwal'])) {
            Flasher::setFlash('berhasil', 'diubah', 'success', 'Data jadwal');
            header('Location: ' . BASEURL . '/admin/jadwal/');
            exit();
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger', 'Data jadwal');
            header('Location: ' . BASEURL . '/admin/jadwal/');
            exit();
        }
    }

    public function cariJadwal()
    {
        $data['jd'] = $this->model('ViewJadwal_model')->cariDataJadwal();
        $data['judul'] = 'Jadwal';
        $this->view('templates/header', $data);
        $this->view('admin/jadwal', $data);
        $this->view('templates/footer');
    }
}
