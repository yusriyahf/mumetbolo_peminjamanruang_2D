<?php

class Proses_model
{
    private $table = 'proses';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function insert($idRuang, $username, $tanggalPeminjam)
    {
        $idRuang = $idRuang;
        $username = $username;
        $tanggalPeminjam = $tanggalPeminjam;

        $query = "INSERT INTO " . $this->table . " (id_ruang,username, tanggal_pinjam) VALUES ('$idRuang','$username', '$tanggalPeminjam')";
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

    public function ubahStatus($id, $status)
    {
        // Lakukan query untuk mengubah status berdasarkan ID
        $query = "UPDATE proses SET status = '$status' WHERE id_proses = 84";

        if ($sql = $this->db->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }
}
