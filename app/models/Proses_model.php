<?php

class Proses_model
{
    private $table = 'proses';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function insert()
    {
        $id_ruang = $_POST['id_ruang'];
        $username = $_POST['nama'];
        $tgl_pinjam = $_POST['tglSekarang'];
        $mulai = $_POST['tgl_pinjam'];
        $selesai = $_POST['tgl_pinjam'];
        $tujuan = $_POST['tujuan'];
        $status = 'diproses';
        $query = "INSERT INTO " . $this->table . " (id_ruang, username, tanggal_pinjam, mulai, selesai, tujuan, status) VALUES ('$id_ruang','$username','$tgl_pinjam', '$mulai', '$selesai', '$tujuan','$status')";

        if ($sql = $this->db->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    // fetch semuanya
    public function fetch()
    {
        $data = null;

        $query = "SELECT * FROM " . $this->table . " ORDER BY id_proses DESC";
        if ($sql = $this->db->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function fetchAcc()
    {
        $data = null;

        $query = "SELECT * FROM " . $this->table . " WHERE status = 'disetujui' ORDER BY id_proses DESC";
        if ($sql = $this->db->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function fetchTolak()
    {
        $data = null;

        $query = "SELECT * FROM " . $this->table . " WHERE status = 'ditolak' ORDER BY id_proses DESC ";
        if ($sql = $this->db->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function getStatus()
    {
        $data = null;

        $query = "SELECT status FROM " . $this->table;
        if ($sql = $this->db->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function ubahStatus($id, $status, $pesan)
    {
        // Lakukan query untuk mengubah status berdasarkan ID
        $query = "UPDATE " . $this->table . " SET status = '$status', pesan = '$pesan' WHERE id_proses = $id";

        if ($sql = $this->db->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function countPeminjaman()
    {
        $query = "SELECT COUNT(*) as total FROM " . $this->table . " WHERE status != 'diproses'";
        $result = $this->db->conn->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        } else {
            return 0;
        }
    }

    public function countPeminjamanMHS($username)
    {
        $query = "SELECT COUNT(*) as total FROM " . $this->table . " WHERE status != 'diproses' AND username = '$username'";
        $result = $this->db->conn->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        } else {
            return 0;
        }
    }
    public function countPermintaanPeminjaman()
    {
        $query = "SELECT COUNT(*) as total FROM " . $this->table . " WHERE status = 'diproses'";
        $result = $this->db->conn->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        } else {
            return 0;
        }
    }

    public function countDiacc()
    {
        $query = "SELECT COUNT(*) as total FROM " . $this->table . " WHERE status = 'disetujui'";;
        $result = $this->db->conn->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        } else {
            return 0;
        }
    }

    public function countDitolak()
    {
        $query = "SELECT COUNT(*) as total FROM " . $this->table . " WHERE status = 'ditolak'";;
        $result = $this->db->conn->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        } else {
            return 0;
        }
    }

    public function fetch_single($id)
    {

        $data = null;

        $query = "SELECT * FROM " . $this->table . " WHERE id_ruang = '$id'";
        if ($sql = $this->db->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }

    public function upFile($id_proses, $namaFile)
    {
        $query = "UPDATE " . $this->table . " SET file = '$namaFile' WHERE id_proses = $id_proses";
        if ($sql = $this->db->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function cekPinjam($username)
    {
        $query = "SELECT COUNT(*) AS jumlah_peminjaman_diproses
                  FROM proses
                  WHERE username = '$username' AND status = 'diproses'";

        if ($result = $this->db->conn->query($query)) {
            $row = $result->fetch_assoc();
            $jumlah_peminjaman_diproses = $row['jumlah_peminjaman_diproses'];
            // var_dump($jumlah_peminjaman_diproses);

            // Mengembalikan nilai true jika jumlah peminjaman dengan status 'diproses' lebih dari 0
            return $jumlah_peminjaman_diproses < 1;
        } else {
            // Mengembalikan nilai false jika terdapat error dalam menjalankan query
            return false;
        }
    }
}
