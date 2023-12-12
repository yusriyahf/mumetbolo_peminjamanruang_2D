<?php
class StatusRg_model
{
    private $table = 'cek_status';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
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
}
