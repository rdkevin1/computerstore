<?php
//eliminar producto
$id = file_get_contents("php://input");
if (isset($id)){
    require_once "../backend/config/Database.php";
    require_once "../backend/controllers/ProductController.php";
    $producto= new ProductController();
    $resultado = $producto->deleteProduct($id);
    echo "ok";
}else{
    echo "error";
}
?>