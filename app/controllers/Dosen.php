<?php

class Dosen extends Controller
{
    public function index()
    {
        if(isset($_SESSION['tipe']) && $_SESSION['tipe'] == 'dosen'){
            $this->view('templates/header');
            $this->view('dosen/index');
            $this->view('templates/footer');
        }else{
            if(isset($_SESSION['tipe'])){
                echo "<script>alert('ANDA TIDAK MEMILIKI AKSES KE HALAMAN INI')</script>";
                header('Refresh: 0; url=' . BASEURL . '/' . $_SESSION['tipe']);
            }else{
                echo "<script>alert('Lakukan Login Terlebih Dahulu')</script>";
                header('Refresh: 0; url=' . BASEURL);
            }
        }
    }
}
