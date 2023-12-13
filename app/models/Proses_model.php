<?php

class Proses_model
{
    private $table = 'proses';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // public function insert($idRuang, $username, $tanggalPeminjam)
    // {
    //     $idRuang = $idRuang;
    //     $username = $username;
    //     $tanggalPeminjam = $tanggalPeminjam;

    //     $query = "INSERT INTO " . $this->table . " (id_ruang,username, tanggal_pinjam) VALUES ('$idRuang','$username', '$tanggalPeminjam')";
    //     if ($sql = $this->db->conn->query($query)) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    public function insert()
    {
        $id_ruang = $_POST['id_ruang'];
        $username = $_POST['nama'];
        $tgl_pinjam = $_POST['tgl_pinjam'];
        $tujuan = $_POST['tujuan'];
        $mulai = $_POST['tgl'] . ' ' . $_POST['mulai'];
        $selesai = $_POST['tgl'] . ' ' . $_POST['selesai'];
        $status = 'diproses';
        $query = "INSERT INTO " . $this->table . " (id_ruang, username, tanggal_pinjam, tujuan, mulai, selesai, status) VALUES ('$id_ruang','$username', '$tgl_pinjam', '$tujuan', '$mulai', '$selesai', '$status')";

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

        $query = "SELECT * FROM " . $this->table;
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
        $query = "SELECT COUNT(*) as total FROM " . $this->table;
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
}
