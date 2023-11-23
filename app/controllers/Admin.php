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

    public function ruang()
    {
        $data['judul'] = 'Ruang';
        $this->view('templates/header', $data);
        $this->view('admin/ruang');
        $this->view('templates/footer');
    }

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

    public function getMahasiswaById($id)
    {
        header('Content-Type: application/json');
        $data = $this->model('Mahasiswa_model')->getById($id);
        echo json_encode($data);
    }
}
