<?php

//!------------------------------------------|Dont do in here|------------------------------------------------
class User {
    // attributes
    protected $userName;
    protected $password;
    protected $contactNo;
    protected $email;
    protected $db;
    public function __construct(){
        $this->db = new DBConnection();
        $this->db->connect(); 
    }

    public function logIn($userName,$password){
        $this->db->getConnection();
        $queary = "select * from ";
    }
}
?>
