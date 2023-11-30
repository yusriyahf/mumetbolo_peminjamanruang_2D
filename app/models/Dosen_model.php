<?php

class Dosen_model
{
    private $table = 'dosen';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function insert()
    {

        if (isset($_POST['submit'])) {
            if (isset($_POST['nip']) && isset($_POST['nama']) && isset($_POST['jenis_kelamin']) && isset($_POST['no_tlp']) && isset($_POST['alamat'])) {
                if (!empty($_POST['nip']) && !empty($_POST['nama']) && !empty($_POST['jenis_kelamin']) && !empty($_POST['no_tlp']) && !empty($_POST['alamat'])) {

                    $nip = $_POST['nip'];
                    $nama = $_POST['nama'];
                    $jenis_kelamin = $_POST['jenis_kelamin'];
                    $no_tlp = $_POST['no_tlp'];
                    $alamat = $_POST['alamat'];

                    $query = "INSERT INTO " . $this->table . " (nip,nama,jenis_kelamin, no_tlp, alamat) VALUES ('$nip','$nama','$jenis_kelamin','$no_tlp','$alamat')";
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
            if (isset($_POST['nip']) && isset($_POST['nama']) && isset($_POST['jenis_kelamin']) && isset($_POST['no_tlp']) && isset($_POST['alamat'])) {
                if (!empty($_POST['nip']) && !empty($_POST['nama']) && !empty($_POST['jenis_kelamin']) && !empty($_POST['no_tlp']) && !empty($_POST['alamat'])) {

                    $nim = $_POST['nip'];
                    $nama = $_POST['nama'];
                    $jenis_kelamin = $_POST['jenis_kelamin'];
                    $no_tlp = $_POST['no_tlp'];
                    $alamat = $_POST['alamat'];

                    $query = "UPDATE " . $this->table . " SET nip='$nim', nama='$nama', jenis_kelamin='$jenis_kelamin' , no_tlp='$no_tlp', alamat='$alamat' WHERE id_dosen='$id'";
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


    public function update($data)
    {

        $query = "UPDATE " . $this->table . " SET nim='$data[nim]', nama='$data[nama]', jenis_kelamin='$data[jenis_kelamin]' , no_tlp='$data[no_tlp]', alamat='$data[alamat]' WHERE id_mahasiswa='$data[id_mahasiswa] '";

        if ($sql = $this->db->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    //Ngitung jml dosen
    public function countDosen()
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

    public function delete($id)
    {

        $query = "DELETE FROM " . $this->table . " where id_dosen = '$id'";
        if ($sql = $this->db->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function fetch_single($id)
    {

        $data = null;

        $query = "SELECT * FROM " . $this->table . " WHERE id_dosen = '$id'";
        if ($sql = $this->db->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }

}
