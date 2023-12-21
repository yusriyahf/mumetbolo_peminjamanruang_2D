<?php

class Ruang_model
{
    private $table = 'ruang';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function cariDataRuang($lantai)
    {
        $data = null;

        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM " . $this->table . " WHERE nama_ruang LIKE '%$keyword%' AND lantai = '$lantai'";

        $result = $this->db->conn->query($query);

        if ($result->num_rows > 0) {
            // Fetch data and store it in the $data variable
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }


    public function insert()
    {
        if (isset($_POST['submit'])) {
            if (isset($_POST['id_ruang']) && isset($_POST['nama_rg']) && isset($_POST['jenis_rg']) && isset($_POST['kapasitas']) && isset($_POST['lantai'])) {
                if (!empty($_POST['id_ruang']) && !empty($_POST['nama_rg']) && !empty($_POST['jenis_rg']) && !empty($_POST['kapasitas']) && !empty($_POST['lantai'])) {

                    $id_ruang = $_POST['id_ruang'];
                    $nama_rg = $_POST['nama_rg'];
                    $jenis_rg = $_POST['jenis_rg'];
                    $kapasitas = $_POST['kapasitas'];
                    $lantai = $_POST['lantai'];

                    $query = "INSERT INTO " . $this->table . " (id_ruang, nama_ruang, lantai, jenis_ruang, kapasitas) VALUES ('$id_ruang','$nama_rg','$lantai','$jenis_rg','$kapasitas')";
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

    public function update($id)
    {
        if (isset($_POST['submit'])) {
            if (isset($_POST['nama_rg']) && isset($_POST['jenis_rg']) && isset($_POST['kapasitas']) && isset($_POST['lantai']) && isset($_POST['id_ruang'])) {
                if (!empty($_POST['nama_rg']) && !empty($_POST['jenis_rg']) && !empty($_POST['kapasitas']) && !empty($_POST['lantai']) && !empty($_POST['id_ruang'])) {

                    $id_ruang = $_POST['id_ruang'];
                    $nama_rg = $_POST['nama_rg'];
                    $jenis_rg = $_POST['jenis_rg'];
                    $kapasitas = $_POST['kapasitas'];
                    $lantai = $_POST['lantai'];

                    $query = "UPDATE " . $this->table . " SET id_ruang='$id_ruang', nama_ruang='$nama_rg', jenis_ruang='$jenis_rg', kapasitas='$kapasitas' WHERE id_ruang='$id'";
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

    public function delete($id)
    {

        $query = "DELETE FROM " . $this->table . " WHERE id_ruang = '$id'";
        if ($sql = $this->db->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function fetch($lantai)
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

    public function fetch2($lantai, $hari)
    {
        $data = null;

        $query = "SELECT *, CASE WHEN hari = '$hari' THEN 'kbm' ELSE 'tersedia' END AS status FROM " . $this->table . " WHERE lantai = '$lantai'";
        if ($sql = $this->db->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
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

    //Ngitung jml Ruangan
    public function countRuang()
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

    public function fetchAll()
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

    public function upGambar($id_ruang, $namaGambar)
    {
        $query = "UPDATE " . $this->table . " SET gambar = '$namaGambar' WHERE id_ruang = '$id_ruang'";
        if ($sql = $this->db->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }
}
