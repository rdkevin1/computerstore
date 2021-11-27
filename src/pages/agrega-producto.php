<?php
if (isset($_POST['nombre'])){
if ($_POST['nombre']!="" && $_POST['marca']!="" && $_POST['precio']!="" && $_POST['cantidad']!=""){
    require_once "../backend/config/Database.php";
    require_once "../backend/controllers/ProductController.php";
    echo ".--.";
    $fecha = new DateTime();
    $date = $fecha->getTimestamp();
    $nombre=$_POST['nombre'];
    $marca=$_POST['marca'];
    $precio=$_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $producto= new ProductController();
    $ok=$producto->newProduct($nombre,$marca, $precio, $cantidad,$date);
}}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Agregar producto al inventario</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <?php include_once("menuppal.php"); ?>

    <div class="container-fluid h-100">
        <div class="row h-100">
            <!-- sidebar -->
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 280px; background-color: #343A40;">
                <ul class="nav nav-pills flex-column mb-auto">
                    <!--<li class="nav-item">
                        <a href="./index.html" class="nav-link text-white" aria-current="page">
                            <i class="fa fa-home mx-3" aria-hidden="true"></i>Home
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <i class="fa fa-user mx-3" aria-hidden="true"></i>Administración
                        </a>
                    </li>-->
                    <li>
                        <a href="productos_i.php" class="nav-link text-white">
                            <i class="fa fa-shopping-cart mx-3" aria-hidden="true"></i>Inventario (select)
                        </a>
                    </li>
                    <li>
                        <a href="agrega-producto.php" class="nav-link text-white">
                            <i class="fa fa-shopping-cart mx-3" aria-hidden="true"></i>Registrar producto (insert)
                        </a>
                    </li>
                    <!--<li>
                        <a href="#" class="nav-link text-white">
                            <i class="fa fa-bell mx-3" aria-hidden="true"></i>Servicios
                        </a>
                    </li>
                    <li>
                        <a href="./src/pages/utilities.html" class="nav-link text-white">
                            <i class="fa fa-anchor mx-3" aria-hidden="true"></i>Utilidades
                        </a>
                    </li>-->
                </ul>
            </div>
            <!--Contains the main content of the webpage-->
            <div class="col-8" style="text-align: justify;">

            <div class="container mt-5">
                    <a href="productos_i.php" class="btn btn-warning"><-Atras</a>
                    <h1>Registrar un producto</h1>
                </div>

                <div class="container mt-5">
                    <form action="agrega-producto.php" method="post" id="frm">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>

                        <div class="mb-3">
                            <label for="marca" class="form-label">Marca:</label>
                            <input type="text" class="form-control" id="marca" name="marca">
                        </div>

                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio de Compra:</label>
                            <input type="number" class="form-control" id="precio" name="precio">
                        </div>

                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad Comprada:</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad">
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Registrar">
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
    <?php 
    ?>
const respuesta = "<?php echo $ok; ?>";
if (respuesta=="ok"){
    Swal.fire({
        icon: 'success',
        title: 'Producto guardado',
        showConfirmButton: false,
        timer: 1500
    })
}else{
    Swal.fire({
        icon: 'error',
        title: 'Ocurrio un error al guardar',
        showConfirmButton: false,
        timer: 1500
    })
}



    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</html>