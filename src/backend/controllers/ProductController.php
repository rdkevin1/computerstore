<?php

$sql = "";

class ProductController {
    
    public function newProduct($nombre,$marca, $precio, $cantidad,$fecha) {
        $db = new Database();
        // sql para insert
        $sql = "INSERT INTO tabla301127A_954 (name, mark, price, quantity, created_at)
        VALUES ('".$nombre."', '".$marca."', '".$precio."', '".$cantidad."', $fecha)";

        if ($db->conn->query($sql) === true) {
            return "ok";
        } else {
            return "Error: " . $db->conn->error;
        }

        $db->conn->close();
    }

    public function listProduct($buscar="") {
        $mysqli = new mysqli("localhost", "root", "", "bdunad301127A_954");
        if ($buscar){
            $query = "SELECT * FROM tabla301127A_954 WHERE name LIKE '%$buscar%' OR id LIKE '%$buscar%' ORDER BY id DESC";
        }else{
            $query = "SELECT * FROM tabla301127A_954 ORDER BY id DESC";
        }
         
        $resultado = $mysqli->query($query);
        if ($resultado) {
           return $resultado;
        }             
        $mysqli->close();
    }

    public function getProduct($id) {
        $mysqli = new mysqli("localhost", "root", "", "bdunad301127A_954");
        $query = "SELECT * FROM tabla301127A_954 WHERE id='".$id."'"; 
        
        if ($resultado = $mysqli->query($query)) {
            return $resultado->fetch_object();

        }             
        $mysqli->close();
    }

    public function saveProduct($id, $nombre,$marca, $precio, $cantidad,$fecha) {
        if ($id<0){
            $db = new Database();
            // sql para update
            $sql ="UPDATE tabla301127A_954 SET name='".$nombre."', mark = '".$marca."', price = '".$precio."', quantity = '".$cantidad."' WHERE id=".$id."";
            

            if ($db->conn->query($sql) === true) {
                return "ok";
            } else {
                return "Error: " . $db->conn->error;
            }

            $db->conn->close();
        }else{
            return "error";
        }
    }

    

    public function deleteProduct($id) {
        $mysqli = new mysqli("localhost", "root", "", "bdunad301127A_954");
        $query = "DELETE FROM tabla301127A_954 WHERE id=".$id.""; 
        if ($resultado = $mysqli->query($query)) {
           return "ok";
        }else{
            return "error";
        }             
        $mysqli->close();
    }
}