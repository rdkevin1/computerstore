<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Inventario - Todos los productos</title>
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
                    <a href="agrega-producto.php" class="btn btn-primary">Registrar un producto</a>
                    <h1>Inventario</h1>
                    <p>Buscar por nombre o id de producto</p>
                    <input type="text" name="buscar" id="buscar" class="form-control my-2">
                    <!--<button class="btn btn-info mb-2" id="boton">Buscar</button>-->
                </div>
                <div class="modal fade" id="mimodal" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Registrar nuevo producto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form action="" method="post" id="frm">
                                    <div class="mb-3">
                                        <input type="hidden" name="idp" id="idp">
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <input type="button" value="Registrar" id="registrar" class="btn btn-primary">
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container mt-5">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Código:</th>
                                <th>Nombre</th>
                                <th>Marca</th>
                                <th>Precio de Compra</th>
                                <th>Cantidad Comprada</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody  id="resultado">
                            
                        </tbody>
                    </table>
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
    function ListarProductos(busq) {
        fetch("listar.php", {
            method: "POST",
            body: busq
        }).then(response => response.text()).then(response => {
            resultado.innerHTML = response;
        })
    }

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
        console.log(result.isConfirmed="true");
        if (result.isConfirmed) {
            console.log("fetch a eliminar id: "+id);
            fetch("eliminar.php", {
                method: "POST",
                body: id
            }).then(response => response.text()).then(response => {
                console.log(response);
                if (response == "ok") {
                   ListarProductos();
                   Swal.fire({
                       icon: 'success',
                       title: 'Eliminado',
                       showConfirmButton: false,
                       timer: 1500
                   })
                }else{
                    /*Swal.fire({
                       icon: 'error',
                       title: 'No se pudo eliminar o no existe en la base de datos',
                       showConfirmButton: false,
                       timer: 1500
                   })*/
                }
                
            })
            
        }
    })
}

buscar.addEventListener("keyup", () => {
    const valor = buscar.value;
    if (valor == "") {
        ListarProductos();
    }else{
        ListarProductos(valor);
    }
});

    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</html>