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

    public function edit($id)
    {
        if (isset($_POST['update'])) {
            if (isset($_POST['nama']) && isset($_POST['deskripsi']) && isset($_POST['stok'])) {
                if (!empty($_POST['nama']) && !empty($_POST['deskripsi']) && !empty($_POST['stok'])) {

                    $data['id_barang'] = $id;
                    $data['nama'] = $_POST['nama'];
                    $data['stok'] = $_POST['stok'];
                    $data['deskripsi'] = $_POST['deskripsi'];
                    $update = $this->update($data);

                    if ($update) {
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

    // public function edit($id)
    // {

    //     $data = null;
    //     $query = "SELECT * FROM " . $this->table . " WHERE id_mahasiswa = '$id'";
    //     if ($sql = $this->db->conn->query($query)) {
    //         while ($row = $sql->fetch_assoc()) {
    //             $data = $row;
    //         }
    //     }
    //     return $data;
    // }

    // 

}
