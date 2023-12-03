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

                header('Location: ' . BASEURL . '/' . $_SESSION['tipe']);
            } else {
                echo "<script>alert('Login Gagal. Periksa kembali username dan password Anda.')</script>";
                header('Refresh: 0; url=' . BASEURL); // Redirect ke halaman login
            }
        }
    }

    public function logOut()
    {
        session_destroy();
        header('location: ' . BASEURL);
    }
}
