<?php
require_once "../backend/config/Database.php";
require_once "../backend/controllers/ProductController.php";
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $producto= new ProductController();
    $resultado = $producto->getProduct($id);
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
    <title>inventario</title>
</head>

<body>
    <?php include_once("menuppal.php"); ?>

    <div class="container-fluid h-100">
        <div class="row h-100">
            <!-- sidebar -->
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 280px; background-color: #343A40;">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="../../index.html" class="nav-link text-white" aria-current="page">
                            <i class="fa fa-home mx-3" aria-hidden="true"></i>Home
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <i class="fa fa-user mx-3" aria-hidden="true"></i>Administración
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <i class="fa fa-shopping-cart mx-3" aria-hidden="tr ue"></i>Productos
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <i class="fa fa-bell mx-3" aria-hidden="true"></i>Servicios
                        </a>
                    </li>
                    <li>
                        <a href="./utilities.html" class="nav-link text-white">
                            <i class="fa fa-anchor mx-3" aria-hidden="true"></i>Utilidades
                        </a>
                    </li>
                </ul>
            </div>
            <!--Contains the main content
                    of the webpage-->
            <div class="col-8" style="text-align: justify;">

                
                <?php
                    var_dump($resultado);
                ?>

                <div class="container mt-5">
                    <form action="" method="post" id="frm">
                        <div class="mb-3">
                            <input type="hidden" name="idp" id="idp" value="<?php echo $resultado; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre">
                        </div>

                        <div class="mb-3">
                            <label for="marca" class="form-label">Marca:</label>
                            <input type="text" class="form-control" id="marca">
                        </div>

                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio de Compra:</label>
                            <input type="text" class="form-control" id="precio">
                        </div>

                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad Comprada:</label>
                            <input type="text" class="form-control" id="cantidad">
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
    const formulario = document.querySelector('#formulario');
    const boton = document.querySelector('#boton');

    const filtrar = () => {
        console.log(formulario.value)
    }

    boton.addEventListener('click', filtrar)
</script>


<script>
    ListarProductos();
    function ListarProductos(busqueda) {
        fetch("listar.php", {
            method: "POST",
            body: busqueda
        }).then(response => response.text()).then(response => {
            resultado.innerHTML = response;
        })
    }

    registrar.addEventListener("click", () => {
        fetch("insert.php", {
            method: "POST",
            body: new FormData(frm)
        }).then(response => response.text()).then(response => {
            if (response == "ok") {
                Swal.fire({
                    icon: 'success',
                    title: 'Registrado',
                    showConfirmButton: false,
                    timer: 1500
                })
                frm.reset();
                ListarProductos();
            }else{
                if (response == "modificado") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Modificado',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    registrar.value = "Registrar";
                    idp.value = "";
                    ListarProductos();
                    frm.reset();
                }else{
                    alert(frm);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al crear el producto',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        })
    });


function Eliminar(id) {
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'NO'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch("eliminar.php", {
                method: "POST",
                body: id
            }).then(response => response.text()).then(response => {
                if (response == TRUE) {
                   ListarProductos();
                   Swal.fire({
                       icon: 'success',
                       title: 'Eliminado',
                       showConfirmButton: false,
                       timer: 1500
                   })
                }
            })
        }
    })
}

/*buscar.addEventListener("keyup", () => {
    const valor = buscar.value;
    if (valor == "") {
        ListarProductos();
    }else{
        ListarProductos(valor);
    }
});*/

    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</html>