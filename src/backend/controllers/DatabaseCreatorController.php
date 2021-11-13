<?php
require_once "../config/Database.php";

class DatabaseCreatorController
{
    public function createDatabase()
    {
        $db = new Database(null);

        // Create database
        $sql = "CREATE DATABASE bdunad301127A_954";
        if ($db->conn->query($sql) === true) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . $db->conn->error;
        }

        $db->conn->close();

    }
}

$databaseCreator = new DatabaseCreatorController();
$databaseCreator->createDatabase();
