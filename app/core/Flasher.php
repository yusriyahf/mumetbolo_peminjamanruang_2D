<?php

class Flasher
{
    public static function setFlash($pesan, $aksi, $tipe, $user)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe,
            'user' => $user
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' .  $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
            Data ' . $_SESSION['flash']['user'] . '<strong> ' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
          </div>';
            unset($_SESSION['flash']);
        }
    }
}
