<?php

class Admin extends Controller
{
    public function index()
    {
        $data['judul'] = 'Admin';
        $this->view('templates/header', $data);
        $this->view('admin/index');
        $this->view('templates/footer');
    }

    // ADMIN MANAGE MAHASISWA

    public function mahasiswa()
    {
        $data['mhs'] = $this->model('Mahasiswa_model')->fetch();
        $data['judul'] = 'Mahasiswa';
        $this->view('templates/header', $data);
        $this->view('admin/mahasiswa', $data);
        $this->view('templates/footer');
    }

    public function hapusMahasiswa($id)
    {
        if ($this->model('Mahasiswa_model')->delete($id) == true) {
            // Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/admin/mahasiswa');
            exit();
        } else {
            // Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/admin/mahasiswa');
            exit();
        }
    }

    public function tambahMahasiswa()
    {
        if ($this->model('Mahasiswa_model')->insert($_POST)) {
            // Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/admin/mahasiswa');
            exit();
        } else {
            // Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/admin/mahasiswa');
            exit();
        }
    }

    public function getUbahMahasiswa()
    {
        echo json_encode($this->model('Mahasiswa_model')->fetch_single($_POST['id_mahasiswa']));
    }

    public function ubahMahasiswa($id)
    {
        if ($this->model('Mahasiswa_model')->edit($id)) {
            // Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/admin/mahasiswa');
            exit();
        } else {
            // Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/admin/mahasiswa');
            exit();
        }
    }


    // ADMIN MANAGE DOSEN
    public function dosen()
    {
        $data['dsn'] = $this->model('Dosen_model')->fetch();
        $data['judul'] = 'Dosen';
        $this->view('templates/header', $data);
        $this->view('admin/dosen', $data);
        $this->view('templates/footer');
    }


    // ADMIN MANAGE RUANGAN 6
    public function ruang5()
    {
        $data['ruang'] = $this->model('Ruang_model')->fetch();
        $data['judul'] = 'Lantai 5';
        $this->view('templates/header', $data);
        $this->view('admin/ruang5', $data);
        $this->view('templates/footer');
    }

    public function ruang6()
    {
        $data['ruang'] = $this->model('Ruang_model')->fetch();
        $data['judul'] = 'Lantai 6';
        $this->view('templates/header', $data);
        $this->view('admin/ruang6', $data);
        $this->view('templates/footer');
    }

    public function ruang7()
    {
        $data['ruang'] = $this->model('Ruang_model')->fetch();
        $data['judul'] = 'Lantai 7';
        $this->view('templates/header', $data);
        $this->view('admin/ruang7', $data);
        $this->view('templates/footer');
    }

    public function ruang8()
    {
        $data['ruang'] = $this->model('Ruang_model')->fetch();
        $data['judul'] = 'Lantai 8';
        $this->view('templates/header', $data);
        $this->view('admin/ruang8', $data);
        $this->view('templates/footer');
    }
}
