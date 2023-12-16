<?php

class Jadwal_model
{
    private $table = 'jadwal';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

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

    public function insert()
    {
        if (isset($_POST['submit'])) {
            if (isset($_POST['id_ruang']) && isset($_POST['nama_rg']) && isset($_POST['jenis_rg']) && isset($_POST['kapasitas']) && isset($_POST['fasilitas']) && isset($_POST['lantai'])) {
                if (!empty($_POST['id_ruang']) && !empty($_POST['nama_rg']) && !empty($_POST['jenis_rg']) && !empty($_POST['kapasitas']) && !empty($_POST['fasilitas']) && !empty($_POST['lantai'])) {

                    $id_ruang = $_POST['id_ruang'];
                    $nama_rg = $_POST['nama_rg'];
                    $jenis_rg = $_POST['jenis_rg'];
                    $kapasitas = $_POST['kapasitas'];
                    $fasilitas = $_POST['fasilitas'];
                    $lantai = $_POST['lantai'];

                    $query = "INSERT INTO " . $this->table . " (id_ruang, nama_ruang, lantai, jenis_ruang, kapasitas, fasilitas) VALUES ('$id_ruang','$nama_rg','$lantai','$jenis_rg','$kapasitas','$fasilitas')";
                    if ($sql = $this->db->conn->query($query)) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        }
    }
}
