<?php
require_once "../config/Database.php";
class TableCreatorController
{
    public function createTable()
    {
        $db = new Database();
        // sql to create table
        $sql = "CREATE TABLE tabla301127A_954 (
          id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          name VARCHAR(100) NOT NULL,
          mark VARCHAR(100) NOT NULL,
          price INT NOT NULL,
          quantity INT NOT NULL,
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
          updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        if ($db->conn->query($sql) === true) {
            echo "Table tabla301127A_954 created successfully";
        } else {
            echo "Error creating table: " . $db->conn->error;
        }

        $db->conn->close();
    }
}

$tableCreator = new TableCreatorController();
$tableCreator->createTable();
