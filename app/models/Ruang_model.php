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
            if (isset($_POST['nama']) && isset($_POST['stok']) && isset($_POST['deskripsi'])) {
                if (!empty($_POST['nama']) && !empty($_POST['stok']) && !empty($_POST['deskripsi'])) {

                    $nama = $_POST['nama'];
                    $deskripsi = $_POST['deskripsi'];
                    $stok = $_POST['stok'];

                    $query = "INSERT INTO barang (nama,stok,deskripsi) VALUES ('$nama','$stok','$deskripsi')";
                    if ($sql = $this->db->conn->query($query)) {
                        echo "<script>alert('records added successfully');</script>";
                        echo "<script>window.location.href = 'admin.php';</script>";
                    } else {
                        echo "<script>alert('failed');</script>";
                        echo "<script>window.location.href = 'admin.php';</script>";
                    }
                } else {
                    echo "<script>alert('empty');</script>";
                    echo "<script>window.location.href = 'admin.php';</script>";
                }
            }
        }
    }

    public function fetch($lantai)
    {
        $data = null;

        $query = "SELECT * FROM " . $this->table . " WHERE lantai = " . $lantai;
        if ($sql = $this->db->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function delete($id)
    {

        $query = "DELETE FROM ruang where id_barang = '$id'";
        if ($sql = $this->db->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function fetch_single($id)
    {

        $data = null;

        $query = "SELECT * FROM " . $this->table . " WHERE id_barang = '$id'";
        if ($sql = $this->db->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }

    public function edit($id)
    {

        $data = null;
        $query = "SELECT * FROM barang WHERE id_barang = '$id'";
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


