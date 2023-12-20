<?php

class ViewProses_model
{
    private $table = 'proses_ruang';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
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



    public function countPeminjaman($username)
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
    public function countPermintaanPeminjaman($username)
    {
        $query = "SELECT COUNT(*) as total FROM " . $this->table . " WHERE status = 'diproses' AND username = '$username'";
        $result = $this->db->conn->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        } else {
            return 0;
        }
    }
    public function countPermintaanPeminjamanAdmin()
    {
        $query = "SELECT COUNT(*) as total FROM " . $this->table . " WHERE status = 'diproses' ";
        $result = $this->db->conn->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        } else {
            return 0;
        }
    }

    public function countDiacc($username)
    {
        $query = "SELECT COUNT(*) as total FROM " . $this->table . " WHERE status = 'disetujui' AND username = '$username'";
        $result = $this->db->conn->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        } else {
            return 0;
        }
    }

    public function countDitolak($username)
    {
        $query = "SELECT COUNT(*) as total FROM " . $this->table . " WHERE status = 'ditolak' AND username = '$username'";
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
