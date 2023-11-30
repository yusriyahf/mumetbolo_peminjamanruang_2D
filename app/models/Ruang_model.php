<?php

class Ruang_model
{
    private $table = 'ruang';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function insert()
    {
        if (isset($_POST['submit'])) {
            if (isset($_POST['nama_rg']) && isset($_POST['jenis_rg']) && isset($_POST['kapasitas']) && isset($_POST['fasilitas']) && isset($_POST['status']) && isset($_POST['lantai'])) {
                if (!empty($_POST['nama_rg']) && !empty($_POST['jenis_rg']) && !empty($_POST['kapasitas']) && !empty($_POST['fasilitas']) && !empty($_POST['status']) && !empty($_POST['lantai'])) {

                    $nama_rg = $_POST['nama_rg'];
                    $jenis_rg = $_POST['jenis_rg'];
                    $kapasitas = $_POST['kapasitas'];
                    $fasilitas = $_POST['fasilitas'];
                    $status = $_POST['status'];
                    $lantai = $_POST['lantai'];

                    $query = "INSERT INTO " . $this->table . " (nama_ruang, lantai, jenis_ruang, kapasitas, fasilitas, status) VALUES ('$nama_rg','$lantai','$jenis_rg','$kapasitas','$fasilitas','$status')";
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
            if (isset($_POST['nama_rg']) && isset($_POST['jenis_rg']) && isset($_POST['kapasitas']) && isset($_POST['fasilitas']) && isset($_POST['status']) && isset($_POST['lantai'])) {
                if (!empty($_POST['nama_rg']) && !empty($_POST['jenis_rg']) && !empty($_POST['kapasitas']) && !empty($_POST['fasilitas']) && !empty($_POST['status']) && !empty($_POST['lantai'])) {

                    $nama_rg = $_POST['nama_rg'];
                    $jenis_rg = $_POST['jenis_rg'];
                    $kapasitas = $_POST['kapasitas'];
                    $fasilitas = $_POST['fasilitas'];
                    $status = $_POST['status'];
                    $lantai = $_POST['lantai'];

                    $query = "UPDATE " . $this->table . " SET nama_ruang='$nama_rg', jenis_ruang='$jenis_rg', kapasitas='$kapasitas' , fasilitas='$fasilitas', status='$status' WHERE id_ruang='$id'";
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

    public function delete($id)
    {

        $query = "DELETE FROM " . $this->table . " WHERE id_ruang = '$id'";
        if ($sql = $this->db->conn->query($query)) {
            return true;
        } else {
            return false;
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


    public function update($data)
    {

        $query = "UPDATE barang SET nama='$data[nama]', deskripsi='$data[deskripsi]', stok='$data[stok]' WHERE id_barang='$data[id_barang] '";

        if ($sql = $this->db->conn->query($query)) {
            return true;
        } else {
            return false;
        }
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

}


