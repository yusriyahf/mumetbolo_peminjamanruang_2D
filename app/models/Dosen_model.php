<?php

class Dosen_model
{
    private $table = 'dosen';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function cariDataDosen()
    {
        $data = null;

        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM " . $this->table . " WHERE nama LIKE '%$keyword%' or nip LIKE '$keyword%'";

        $result = $this->db->conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }


    public function insert($username)
    {
        if (isset($_POST['submit'])) {
            if (isset($_POST['nip']) && isset($_POST['nama']) && isset($_POST['jenis_kelamin']) && isset($_POST['no_tlp']) && isset($_POST['prodi']) && isset($_POST['jabatan']) && isset($username)) {
                if (!empty($_POST['nip']) && !empty($_POST['nama']) && !empty($_POST['jenis_kelamin']) && !empty($_POST['no_tlp']) && !empty($_POST['prodi']) && !empty($_POST['jabatan']) && !empty($username)) {

                    $nip = $_POST['nip'];
                    $nama = $_POST['nama'];
                    $jenis_kelamin = $_POST['jenis_kelamin'];
                    $no_tlp = $_POST['no_tlp'];
                    $jabatan = $_POST['jabatan'];
                    $prodi = $_POST['prodi'];

                    $query = "INSERT INTO " . $this->table . " (nip, nama, jabatan, prodi, jenis_kelamin, no_tlp, username) VALUES ('$nip','$nama','$jabatan', '$prodi','$jenis_kelamin','$no_tlp', '$username')";
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
            if (isset($_POST['nip']) && isset($_POST['nama']) && isset($_POST['jenis_kelamin']) && isset($_POST['no_tlp']) && isset($_POST['prodi'])) {
                if (!empty($_POST['nip']) && !empty($_POST['nama']) && !empty($_POST['jenis_kelamin']) && !empty($_POST['no_tlp']) && !empty($_POST['prodi'])) {

                    $nim = $_POST['nip'];
                    $nama = $_POST['nama'];
                    $jenis_kelamin = $_POST['jenis_kelamin'];
                    $no_tlp = $_POST['no_tlp'];
                    $prodi = $_POST['prodi'];
                    $jabatan = $_POST['jabatan'];

                    $query = "UPDATE " . $this->table . " SET nip='$nim', nama='$nama', jenis_kelamin='$jenis_kelamin', jabatan='$jabatan' , no_tlp='$no_tlp', prodi='$prodi' WHERE id_dosen='$id'";
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
        $delete = $this->fetch_single($id);
        $query = "DELETE FROM " . $this->table . " where id_dosen = '$id'";
        if ($sql = $this->db->conn->query($query)) {
            return $delete['username'];
        } else {
            return null;
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
    public function fetch_profile($username)
    {
        $data = null;

        $query = "SELECT * FROM " . $this->table . " WHERE username = '$username'";
        if ($sql = $this->db->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }
}
