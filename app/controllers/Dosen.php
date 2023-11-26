<?php

class Dosen extends Controller
{
    public function index()
    {
        $this->view('templates/header');
        $this->view('dosen/index');
        $this->view('templates/footer');
    }
}
