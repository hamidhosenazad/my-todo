<?php
namespace MyApp;

use mysqli;

class Database{
    protected $db_name='wedevs';
    protected $db_user='root';
    protected $db_pass='';
    protected $db_host='localhost';
    public function connect()
    {   
        $conn= new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
        if(mysqli_connect_errno()){
            printf("Connection fialed: %s",mysqli_connect_error());
            exit();
        }
        return $conn;
    }
}