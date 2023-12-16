<?php
class JadwalRuang_model
{
    private $table = 'jadwal_ruang';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function fetch($lantai, $hari)
    {
        $data = null;

        $query = "SELECT * FROM " . $this->table . " WHERE lantai = '$lantai'";
        if ($sql = $this->db->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function status($id)
    {
        $data = null;

        $query = "SELECT * FROM " . $this->table . " WHERE id_ruang='$id' ORDER BY tgl_mulai";
        if ($sql = $this->db->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }
}
