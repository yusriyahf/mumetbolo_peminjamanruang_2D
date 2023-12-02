<?php

class Mahasiswa extends Controller
{
    public function index()
    {
        if (isset($_SESSION['tipe']) && $_SESSION['tipe'] == 'mahasiswa') {
            $data['judul'] = 'Mahasiswa';
            $this->view('templates/header', $data);
            $this->view('mahasiswa/index');
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
        $this->view('templates/header');
        $this->view('mahasiswa/peminjaman');
        $this->view('templates/footer');
    }


    // ADMIN MANAGE RUANGAN 6
    public function ruang5()
    {
        $data['ruang'] = $this->model('Ruang_model')->fetch(5);
        $data['judul'] = 'Lantai 5';
        $this->view('templates/header', $data);
        $this->view('mahasiswa/ruang5', $data);
        $this->view('templates/footer');
    }

    public function ruang6()
    {
        $data['ruang'] = $this->model('Ruang_model')->fetch(6);
        $data['judul'] = 'Lantai 6';
        $this->view('templates/header', $data);
        $this->view('mahasiswa/ruang6', $data);
        $this->view('templates/footer');
    }

    public function ruang7()
    {
        $data['ruang'] = $this->model('Ruang_model')->fetch(7);
        $data['judul'] = 'Lantai 7';
        $this->view('templates/header', $data);
        $this->view('mahasiswa/ruang7', $data);
        $this->view('templates/footer');
    }

    public function ruang8()
    {
        $data['ruang'] = $this->model('Ruang_model')->fetch(8);
        $data['judul'] = 'Lantai 8';
        $this->view('templates/header', $data);
        $this->view('mahasiswa/ruang8', $data);
        $this->view('templates/footer');
    }
}
