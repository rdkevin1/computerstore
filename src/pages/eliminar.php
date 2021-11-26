<?php
//insertar y editar productos
require_once "../backend/config/Database.php";
require_once "../backend/controllers/ProductController.php";
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $producto= new ProductController();
    $resultado = $producto->getProduct($id);
    echo "ok";
}
?>