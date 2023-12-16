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
}
