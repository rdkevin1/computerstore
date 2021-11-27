<?php
//Editar productos

echo "guardar.php";

if (isset($_POST) ) {
    require_once "../backend/config/Database.php";
    require_once "../backend/controllers/ProductController.php";
    $producto = new ProductController();
    var_dump($_POST);
    $fecha = new DateTime();

    $id = $_POST['idp'];
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $date = $fecha->getTimestamp();
    
    if (empty($_POST['idp'])){
        echo "ok";
        $producto->saveProduct($id, $nombre, $marca, $precio, $cantidad, $date, $date);
    }else{
        echo "error";
    }
    
}