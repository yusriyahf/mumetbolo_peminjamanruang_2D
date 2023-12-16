<?php

class Admin extends Controller
{
    public function index()
    {
        if (isset($_SESSION['tipe']) && $_SESSION['tipe'] == 'admin') {
            $data['permintaanPeminjaman'] = $this->model('Proses_model')->countPeminjaman();
            $data['totalPeminjaman'] = $this->model('Proses_model')->countPeminjaman();
            $data['totalDosen'] = $this->model('Dosen_model')->countDosen();
            $data['totalMhs'] = $this->model('Mahasiswa_model')->countMahasiswa();
            $data['totalRuang'] = $this->model('Ruang_model')->countRuang();
            $data['judul'] = 'Admin';
            $this->view('templates/header', $data);
            $this->view('admin/index', $data);
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
        $result = $this->model('Proses_model')->fetch_single($id_ruang);
        echo json_encode($result);
    }


    public function tolakPeminjaman()
    {
        $id_proses = $_POST['id_proses'];
        $status = 'ditolak';
        $pesan = $_POST['pesan'];

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
        $pesan = $_POST['pesan'];
        if ($this->model('Proses_model')->ubahStatus($id_proses, $status, $pesan)) {
            $_SESSION['popupacc'] = true;
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
            // $data['status'] = $this->model('Proses_model')->getStatus();
            $data['proses'] = $this->model('Proses_model')->fetch();
            $data['judul'] = 'Peminjaman';
            $this->view('templates/header', $data);
            $this->view('admin/peminjaman', $data);
            $this->view('templates/footer', $data);
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
            // $data['status'] = $this->model('Proses_model')->getStatus();
            $data['proses'] = $this->model('Proses_model')->fetchAcc();
            $data['judul'] = 'Peminjaman';
            $this->view('templates/header', $data);
            $this->view('admin/peminjaman', $data);
            $this->view('templates/footer', $data);
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
            // $data['status'] = $this->model('Proses_model')->getStatus();
            $data['proses'] = $this->model('Proses_model')->fetchTolak();
            $data['judul'] = 'Peminjaman';
            $this->view('templates/header', $data);
            $this->view('admin/peminjaman', $data);
            $this->view('templates/footer', $data);
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
            $data['proses'] = $this->model('Proses_model')->fetch();
            // $data['proses'] = $this->model('Proses_model')->fetch(null);
            $data['judul'] = 'Permintaan Peminjaman';
            $this->view('templates/header', $data);
            $this->view('admin/permintaanPeminjaman', $data);
            $this->view('templates/footer', $data);
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
    }
    public function cariDosen()
    {
        $data['judul'] = "Cari Dosen";
        $data['dsn'] = $this->model('Dosen_model')->cariDataDosen();
        $this->view('templates/header', $data);
        $this->view('admin/dosen', $data);
        $this->view('templates/footer');
    }

    public function cariRuang($lantai)
    {
        $data['ruang'] = $this->model('Ruang_model')->cariDataRuang($lantai);
        $this->view('templates/header', $data);
        $this->view('admin/ruang/' . $lantai, $data);
        $this->view('templates/footer');
    }

    public function mahasiswa()
    {
        if (isset($_SESSION['tipe']) && $_SESSION['tipe'] == 'admin') {
            $data['mhs'] = $this->model('Mahasiswa_model')->fetch();
            $data['judul'] = 'Mahasiswa';
            $this->view('templates/header', $data);
            $this->view('admin/mahasiswa', $data);
            $this->view('templates/footer');
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
            // $data['ruang'] = $this->model('StatusRg_model')->fetch(5);
            $data['ruang'] = $this->model('Ruang_model')->fetch($lantai);
            $data['judul'] = 'Lantai ' . $lantai;
            $data['lantai'] = $lantai;
            $this->view('templates/header', $data);
            $this->view('admin/ruang', $data);
            $this->view('templates/footer', $data);
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

    // public function ruang6()
    // {
    //     $data['ruang'] = $this->model('Ruang_model')->fetch(6);
    //     $data['judul'] = 'Lantai 6';
    //     $data['lantai'] = '6';
    //     $this->view('templates/header', $data);
    //     $this->view('admin/ruang6', $data);
    //     $this->view('templates/footer', $data);
    // }

    // public function ruang7()
    // {
    //     $data['ruang'] = $this->model('Ruang_model')->fetch(7);
    //     $data['judul'] = 'Lantai 7';
    //     $data['lantai'] = '7';
    //     $this->view('templates/header', $data);
    //     $this->view('admin/ruang7', $data);
    //     $this->view('templates/footer', $data);
    // }

    // public function ruang8()
    // {
    //     $data['ruang'] = $this->model('Ruang_model')->fetch(8);
    //     $data['judul'] = 'Lantai 8';
    //     $data['lantai'] = '8';
    //     $this->view('templates/header', $data);
    //     $this->view('admin/ruang8', $data);
    //     $this->view('templates/footer', $data);
    // }

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
            $data['jd'] = $this->model('JadwalRuang_model')->fetchAdmin();
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
        $data['jd'] = $this->model('JadwalRuang_model')->cariDataJadwal();
        $data['judul'] = 'Jadwal';
        $this->view('templates/header', $data);
        $this->view('admin/jadwal', $data);
        $this->view('templates/footer');
    }
}
