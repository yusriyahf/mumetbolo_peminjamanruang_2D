<?php

class Controller
{
    public function view($view, $data = [])
    {
        if(isset($_SESSION['username'])){
            require_once '../app/views/' . $view . '.php';
        }else{
            require_once '../app/views/auth/index.php';
        }
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    public function getStatusRg($idRuang, $tgl){
        $data= $this->model('JadwalRuang_model')->status($idRuang);
        $status = 'tidak tersedia';

        foreach ($data as $ruang){
            if(($tgl<$ruang['tgl_mulai'] && $tgl<$ruang['tgl_selesai']) || ($tgl>$ruang['tgl_mulai'] && $tgl>$ruang['tgl_selesai'])){
                $status = 'tersedia';
            }else{
                $status = 'tidak tersedia';
            }
        }

        echo $status;
    }
}
