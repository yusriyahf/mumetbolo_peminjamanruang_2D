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

    public function hapus($id)
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
}
