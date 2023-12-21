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
                if (isset($_POST['id_ruang']) && isset($_POST['jenis_kegiatan']) && isset($_POST['hari']) && isset($_POST['keterangan'])) {
                    if (!empty($_POST['id_ruang']) && !empty($_POST['jenis_kegiatan']) && !empty($_POST['hari']) && !empty($_POST['keterangan'])) {

                        $id_ruang = $_POST['id_ruang'];
                        $jenis_kegiatan = $_POST['jenis_kegiatan'];
                        $hari = $_POST['hari'];
                        $keterangan = $_POST['keterangan'];

                        $query = "INSERT INTO " . $this->table . " (id_ruang, jenis_kegiatan, hari, keterangan) VALUES ('$id_ruang','$jenis_kegiatan','$hari','$keterangan')";
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

            $query = "DELETE FROM " . $this->table . " WHERE id_jadwal = '$id'";
            if ($sql = $this->db->conn->query($query)) {
                return true;
            } else {
                return false;
            }
        }

        public function update($id)
        {
            if (isset($_POST['submit'])) {
                if (isset($_POST['id_ruang']) && isset($_POST['jenis_kegiatan']) && isset($_POST['hari']) && isset($_POST['keterangan'])) {
                    if (!empty($_POST['id_ruang']) && !empty($_POST['jenis_kegiatan']) && !empty($_POST['hari']) && !empty($_POST['keterangan'])) {

                        $id_jadwal = $_POST['id_jadwal'];
                        $id_ruang = $_POST['id_ruang'];
                        $jenis_kegiatan = $_POST['jenis_kegiatan'];
                        $hari = $_POST['hari'];
                        $keterangan = $_POST['keterangan'];

                        $query = "UPDATE " . $this->table . " SET id_ruang='$id_ruang', jenis_kegiatan='$jenis_kegiatan', hari='$hari' , keterangan='$keterangan' WHERE id_jadwal='$id'";
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

        public function setStatus($hari, $tanggal)
        {
            $data = null;

            $query = "UPDATE " . $this->table . " SET status = CASE WHEN hari = '$hari' AND '$tanggal' BETWEEN tgl_mulai AND tgl_selesai THEN 'kbm' 
            ELSE 'tersedia' 
        END 
    WHERE status != 'dibooking' and status != 'diproses'";

            if ($sql = $this->db->conn->query($query)) {
                return true;
            } else {
                return false;
            }
        }

        public function setStatusPinjam($id)
        {
            $data = null;

            $query = "UPDATE " . $this->table . " SET status = 'diproses' where id_jadwal = $id";
            if ($sql = $this->db->conn->query($query)) {
                return true;
            } else {
                return false;
            }
        }

        public function setStatusTolak($id)
        {
            $query = "UPDATE " . $this->table . " SET status = 'tersedia' where id_jadwal = $id";
            if ($sql = $this->db->conn->query($query)) {
                return true;
            } else {
                return false;
            }
        }
        public function setStatusAcc($id)
        {
            $query = "UPDATE " . $this->table . " SET status = 'dibooking' where id_jadwal = $id";
            if ($sql = $this->db->conn->query($query)) {
                return true;
            } else {
                return false;
            }
        }
    }
