<?php

class Mahasiswa extends Controller
{
    public function index()
    {
        if (isset($_SESSION['tipe']) && $_SESSION['tipe'] == 'mahasiswa') {
            $data['totalPeminjaman'] = $this->model('Proses_model')->countPeminjaman();
            $data['totalDiacc'] = $this->model('Proses_model')->countDiacc();
            $data['totalDitolak'] = $this->model('Proses_model')->countDitolak();
            $data['judul'] = 'Mahasiswa';
            $this->view('templates/header', $data);
            $this->view('mahasiswa/index', $data);
            $this->view('templates/footer');
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
    public function prosesPinjam()
    {
        $data['judul'] = 'Peminjaman';
        $data['proses'] = $this->model('Proses_model')->fetch();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/prosesPinjam', $data);
        $this->view('templates/footer');
    }

    public function pinjamRuang($id, $tanggal)
    {
        // Pastikan user telah login dan sesi username sudah ada
        if (isset($_SESSION['username'])) {
            // Ambil informasi dari query string
            $idRuang = $id;
            $tanggalPeminjam = $tanggal;
            // var_dump($tanggalPeminjam);

            // Jika id_ruang dan tanggalPeminjam ada, panggil model untuk menyimpan data peminjaman
            if ($idRuang && $tanggalPeminjam) {
                $username = $_SESSION['username'];
                $this->model('Proses_model')->insert($idRuang, $username, $tanggalPeminjam);

                // Redirect atau lakukan tindakan lainnya
                header('Location: ' . BASEURL . '/mahasiswa/prosesPinjam');
                exit();
            } else {
                // Jika id_ruang atau tanggalPeminjam tidak ada, arahkan ke halaman sebelumnya
                header('Location: gagalcok.php');
                exit();
            }
        } else {
            // Jika user tidak login, arahkan ke halaman login atau tindakan lainnya
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
                echo "<script>alert('Berhasil Ubah Password')</script>";
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
    }

    public function formPinjam()
    {
        // $_SESSION['tujuan'] = $_POST['tujuan'];
        if ($this->model('Proses_model')->insert()) {
            header('Location: ' . BASEURL . '/mahasiswa/prosesPinjam');
            exit();
        } else {
            echo "SEK GAGAL";
        }
    }

    public function processForm()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil nilai input dari formulir
            $tanggal = $_POST['tanggal'];

            // Simpan nilai input ke dalam session
            $_SESSION['tanggal'] = $tanggal;
            // var_dump($_SESSION['tanggal']);

            // Redirect atau lakukan tindakan lainnya
            header('Location: ' . BASEURL . '/mahasiswa/ruang' . $_SESSION['ruang']);
            unset($_SESSION['ruang']);
            exit();
        }
    }

    public function uploadFile($id_proses){
        // var_dump($_FILES); die;
        if(isset($_POST['submit'])){
            $nama_file = $_FILES['suratPinjam']['name'];
            $ukuran = $_FILES['suratPinjam']['size'];
            $error = $_FILES['suratPinjam']['error'];
            $tmp = $_FILES['suratPinjam']['tmp_name'];
            $size = $_FILES['suratPinjam']['size'];

            $maxFileSize = 10 * 1024 * 1024; //10mb

            if($error === 0){
                $ekstensi = ['pdf'];
                $ekstensiFile = explode( '.' , $nama_file );
                $ekstensiFile = strtolower(end($ekstensiFile));
                if(in_array($ekstensiFile, $ekstensi) && $ukuran <= $maxFileSize){
                    $nama = $id_proses . '-' . $_SESSION['username'] . '.' . $ekstensiFile;
                    if(move_uploaded_file($tmp, '../public/uploadFile/' . $nama)){
                        if($this->model('Proses_model')->upFile($id_proses, $nama)){
                            echo "<script> alert('berhasil nambah ke db'); </script>";
                            header('Refresh: 0; url=' . BASEURL . '/mahasiswa/prosesPinjam');
                        }
                    }else{
                        echo "<script> alert('gagal upload'); </script>";
                        header('Refresh: 0; url=' . BASEURL . '/mahasiswa/prosesPinjam');
                    }
                }else{
                    echo "<script> alert('file tidak sesuai, periksa ekstensi dan ukuran file'); </script>";
                    header('Refresh: 0; url=' . BASEURL . '/mahasiswa/prosesPinjam');
                }
            }
            else if($error === 4){
                echo "<script> alert('belum pilih file'); </script>";
                header('Refresh: 0; url=' . BASEURL . '/mahasiswa/prosesPinjam');
            }
        }
    }

    // ruangan
    public function ruang5()
    {
        $_SESSION['ruang'] = 5;
        if (isset($_SESSION['tanggal'])) {
            # code...
            // $data['ruang'] = $this->model('Ruang_model')->fetch(5);
            $data['ruang'] = $this->model('StatusRg_model')->fetch(5);
            $data['judul'] = 'Lantai 5';
            $data['tanggal'] = $_SESSION['tanggal'];
            $this->view('templates/header', $data);
            $this->view('mahasiswa/ruang5', $data);
            $this->view('templates/footer');
            // unset($_SESSION['tanggal']);
        } else {
            header('Location: ' . BASEURL . '/mahasiswa/tanggalPeminjaman');
            exit();
        }
    }

    public function ruang6()
    {
        $_SESSION['ruang'] = 6;
        if (isset($_SESSION['tanggal'])) {
            $data['ruang'] = $this->model('Ruang_model')->fetch(6);
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
