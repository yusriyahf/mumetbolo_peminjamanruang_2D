<?php
class auth extends Controller
{
    public function index()
    {
        if (isset($_SESSION['username'])) {
            header('Location: ' . BASEURL . '/' . $_SESSION['tipe']);
        } else {
            $data['judul'] = 'Login';
            $this->view('auth/index', $data);
        }
    }

    public function prosesLogin()
    {

        if (isset($_POST['submit'])) {
            $usn = $_POST['username'];
            $pw = $_POST['password'];

            if ($this->model('User_model')->validasi($usn, $pw)) {
                $data = $this->model('User_model')->fetch_single($usn);
                $_SESSION['username'] = $data['username'];
                $_SESSION['tipe'] = $data['tipe'];
                $_SESSION['first_login'] = true;

                header('Location: ' . BASEURL . '/' . $_SESSION['tipe']);
            } else {
                Flasher::setFlash('Login Gagal', 'Periksa kembali username dan password Anda!', 'danger', ' ');
                header('Location: ' . BASEURL);
            }
        }
    }

    public function logOut()
    {
        session_destroy();
        header('location: ' . BASEURL);
    }
}
