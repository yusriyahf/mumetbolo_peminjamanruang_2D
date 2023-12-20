<?php

class Mahasiswa_model
{
    private $table = 'mahasiswa';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function cariDataMahasiswa()
    {
        $data = null;

        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM " . $this->table . " WHERE nama LIKE '%$keyword%' or nim LIKE '$keyword%'";

        $result = $this->db->conn->query($query);

        if ($result->num_rows > 0) {
            // Fetch data and store it in the $data variable
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    public function insert($username)
    {

        if (isset($_POST['submit'])) {
            if (isset($_POST['nim']) && isset($_POST['nama']) && isset($_POST['jenis_kelamin']) && isset($_POST['no_tlp']) && isset($_POST['prodi'])  && isset($_POST['kelas']) && isset($username)) {
                if (!empty($_POST['nim']) && !empty($_POST['nama']) && !empty($_POST['jenis_kelamin']) && !empty($_POST['no_tlp']) && !empty($_POST['prodi']) && !empty($_POST['kelas']) && !empty($username)) {

                    $nim = $_POST['nim'];
                    $nama = $_POST['nama'];
                    $jenis_kelamin = $_POST['jenis_kelamin'];
                    $no_tlp = $_POST['no_tlp'];
                    $prodi = $_POST['prodi'];
                    $kelas = $_POST['kelas'];

                    $query = "INSERT INTO " . $this->table . " (nim,nama,jenis_kelamin, no_tlp, prodi, username, kelas) VALUES ('$nim','$nama','$jenis_kelamin','$no_tlp','$prodi', '$username', '$kelas')";
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
            if (isset($_POST['nim']) && isset($_POST['nama']) && isset($_POST['jenis_kelamin']) && isset($_POST['no_tlp']) && isset($_POST['prodi']) && isset($_POST['kelas'])) {
                if (!empty($_POST['nim']) && !empty($_POST['nama']) && !empty($_POST['jenis_kelamin']) && !empty($_POST['no_tlp']) && !empty($_POST['prodi']) && !empty($_POST['kelas'])) {

                    $nim = $_POST['nim'];
                    $nama = $_POST['nama'];
                    $jenis_kelamin = $_POST['jenis_kelamin'];
                    $no_tlp = $_POST['no_tlp'];
                    $prodi = $_POST['prodi'];
                    $kelas = $_POST['kelas'];

                    $query = "UPDATE " . $this->table . " SET nim='$nim', nama='$nama', jenis_kelamin='$jenis_kelamin' , no_tlp='$no_tlp', prodi='$prodi', kelas='$kelas' WHERE id_mahasiswa='$id'";
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

    // Ngitung jml mhs
    public function countMahasiswa()
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
        $query = "DELETE FROM " . $this->table . " where id_mahasiswa = '$id'";
        if ($sql = $this->db->conn->query($query)) {
            return $delete['username'];
        } else {
            return null;
        }
    }

    public function fetch_single($id)
    {

        $data = null;

        $query = "SELECT * FROM " . $this->table . " WHERE id_mahasiswa = '$id'";
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
