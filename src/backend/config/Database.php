<?php

class Database
{
    protected $host = "localhost";
    protected $user = "root";
    protected $password = "";
    protected $db = "";

    public $conn = null;

    public function __construct($db = "bdunad301127A_954")
    {

        //Set db to connect
        $this->db = $db;

        // Create connection
        if ($this->db == null) {
            $this->conn = new mysqli($this->host, $this->user, $this->password);
        } else {
            $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db);
        }

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}
