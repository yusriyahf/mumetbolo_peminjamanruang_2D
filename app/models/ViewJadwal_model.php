<?php
class ViewJadwal_model
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

        $query = "SELECT * FROM " . $this->table . " WHERE lantai = '$lantai' AND '$tanggal' BETWEEN tgl_mulai AND tgl_selesai";
        if ($sql = $this->db->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function cekJadwal($lantai, $tanggal, $hari)
    {
        $data = null;
        $query = "SELECT $this->table.id_ruang, $this->table.nama_ruang, $this->table.lantai, $this->table.jenis_ruang, $this->table.kapasitas, $this->table.id_jadwal, $this->table.keterangan, $this->table.tgl_mulai, $this->table.tgl_selesai, $this->table.hari, 
            CASE 
            WHEN (
                        SELECT COUNT(*)
                        FROM $this->table AS j
                        WHERE '$tanggal' BETWEEN j.tgl_mulai AND j.tgl_selesai AND j.id_ruang = $this->table.id_ruang
                    ) > 1 THEN 
                        (
                            SELECT j1.status
                            FROM $this->table AS j1
                            WHERE '$tanggal' BETWEEN j1.tgl_mulai AND j1.tgl_selesai AND j1.id_ruang = $this->table.id_ruang
                            ORDER BY j1.id_jadwal DESC
                            LIMIT 1
                        )
                WHEN $this->table.hari != '$hari' AND $this->table.status = 'diproses' THEN 'tersedia'
                ELSE $this->table.status
            END AS status 
            FROM $this->table
            WHERE lantai = '$lantai' AND '$tanggal' BETWEEN tgl_mulai AND tgl_selesai
            GROUP BY id_ruang";

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
