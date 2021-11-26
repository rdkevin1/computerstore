<?php

$sql = "";

class ProductController {
    
    public function newProduct($nombre,$marca, $precio, $cantidad,$fecha) {
        /*$db = new Database();
        // sql para insert
        $sql = "INSERT INTO tabla301127A_954 (name, mark, price, quantity, created_at, updated_at)
        VALUES (".$nombre.", ".$marca.", ".$precio.", ".$cantidad.", $fecha->getTimestamp(), $fecha->getTimestamp())";

        if ($db->conn->query($sql) === true) {
            return "ok";
        } else {
            echo "Error: " . $db->conn->error;
        }

        $db->conn->close();*/

        $mysqli = new mysqli("localhost", "root", "", "bdunad301127A_954");
        $query = "INSERT INTO tabla301127A_954 (name, mark, price, quantity, created_at, updated_at)
        VALUES (".$nombre.", ".$marca.", ".$precio.", ".$cantidad.", $fecha->getTimestamp(), $fecha->getTimestamp())";
        $resultado = $mysqli->query($query);
        if ($resultado) {
           return "ok";
        }             
        $mysqli->close();
    }

    public function listProduct() {
        $mysqli = new mysqli("localhost", "root", "", "bdunad301127A_954");
        $query = "SELECT * FROM tabla301127A_954 ORDER BY id DESC"; 
        $resultado = $mysqli->query($query);
        if ($resultado) {
           return $resultado;
        }             
        $mysqli->close();
    }

    public function getProduct($id) {
        $mysqli = new mysqli("localhost", "root", "", "bdunad301127A_954");
        $query = "SELECT * FROM tabla301127A_954 WHERE id=".$id.""; 
        if ($resultado = $mysqli->query($query)) {
           return $resultado;
        }             
        $mysqli->close();
    }

    

    public function deleteProduct($id) {
        $mysqli = new mysqli("localhost", "root", "", "bdunad301127A_954");
        $query = "SELECT * FROM tabla301127A_954 WHERE id=".$id.""; 
        if ($resultado = $mysqli->query($query)) {
           return $resultado;
        }             
        $mysqli->close();
    }
}