<?php
//Listar
$buscar="";
$buscar = file_get_contents("php://input");
require_once "../backend/config/Database.php";
require_once "../backend/controllers/ProductController.php";
$producto= new ProductController();
$resultado = $producto->listProduct($buscar);
if ($resultado->num_rows>0){
foreach ($resultado as $data) {
    echo "<tr>
            <td>" . $data['id'] . "</td>
            <td>" . $data['name'] . "</td>
            <td>" . $data['mark'] . "</td>
            <td>" . $data['price'] . "</td>
            <td>" . $data['quantity'] . "</td>
            <td>
                <a href='edita-producto.php?id=" . $data['id'] . "' class='btn btn-primary'>Editar</a>
                <button type='button' class='btn btn-danger' onclick=Eliminar('" . $data['id'] . "')>Eliminar</button>
            </td>        
        </tr>";
}
}else{
    echo "<tr>
            <td></td>
            <td>Sin resultados</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>        
        </tr>";
}
