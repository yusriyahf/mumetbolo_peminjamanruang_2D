<?php

class User_model{
    private $table = 'user';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function validasi($username, $pass){
        $result = $this->fetch_single($username);

        if($result != null){
            $salt = $result['salt'];
            $password = $result['password'];

            if($salt !== null && $password !== null){
                $combined_password = $salt . $pass;
                if(password_verify($combined_password, $password)){
                    return true;
                }else{
                    return false; //password salah
                }
            }else{
                return false; //di database, kolom salt dan password kosong
            }
        }else{
            return false; //Username tidak ditemukan
        }
    }

    //menambah user
    public function add($username, $pass, $tipe){
        $salt = bin2hex(random_bytes(16));
        $combined_password = $salt . $pass;
        $hashed_password = password_hash($combined_password, PASSWORD_BCRYPT);
        $query = "INSERT INTO " . $this->table . " (username, password, salt, tipe) VALUES ('$username', '$hashed_password', '$salt', '$tipe')";
        if ($sql = $this->db->conn->query($query)) {
            return $username;
        } else {
            return null;
        }
    }
    
    //menghapus user
    public function delete($username){
        $query = "DELETE from " . $this->table . " where username = '$username'";
        if ($sql = $this->db->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function fetch_single($username)
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