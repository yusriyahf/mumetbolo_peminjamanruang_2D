<?php
class auth extends Controller
{
    public function index()
    {
        $data['judul'] = 'Login';
        // $this->view('templates/header', $data);
        $this->view('auth/index');
        // $this->view('templates/footer');
    }
}
