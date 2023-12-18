<?php
class JadwalRuang_model
{
    private $table = 'jadwal_ruang';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function fetchAdmin()
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

    public function fetch($lantai, $tanggal)
    {
        $data = null;

        $query = "SELECT * FROM " . $this->table . " WHERE lantai = '$lantai'
        AND '$tanggal' BETWEEN tgl_mulai AND tgl_selesai";

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

    public function cariDataJadwal()
    {
        $data = null;
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM " . $this->table . " WHERE id_ruang LIKE '%$keyword%' OR nama_ruang LIKE '%$keyword%'";

        $result = $this->db->conn->query($query);

        if ($result->num_rows > 0) {
            // Fetch data and store it in the $data variable
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }
}
