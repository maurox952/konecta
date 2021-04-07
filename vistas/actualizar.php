<?php

include '../conexion/conexion.php';

//consulta para obtener el prodcuto por get

$id=$_GET['id'];

$prodcuctos=$conn->query("SELECT * FROM tblproducto WHERE id=$id");
$fila=$prodcuctos->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Producto</title>

    <!--importacion boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Sweet alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>

                <div class="container-fluid">
                    <h1 class="mt-4">Actualizar Producto</h1>
                        <form action="../controlador/actualizar_producto.php?id=<?php echo $fila['id'] ?>" name="add_form" method="POST">
                            <div class="form-group">
                                <label>Nombre Producto</label>
                                
                                    <input type="text" id="producto" name="producto" class="form-control" placeholder="Nombre del Prodcuto" value="<?php echo $fila['nom_producto'] ?>" required>
                            </div>
                            <div class="form-group">
                            <label>Rerefencia del producto</label>
                            <input type="text" id="referencia" name="referencia" class="form-control" placeholder="COD 0123" value="<?php echo $fila['referencia'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Precio</label>
                                    <input type="number" id="precio" name="precio" class="form-control" placeholder="20000" value="<?php echo $fila['precio'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Peso en Kilos</label>
                                    <input type="number" id="peso" name="peso" class="form-control" placeholder="2" value="<?php echo $fila['peso'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Categoria</label>
                                <select class="form-control form-control-lg" name="categoria" value="<?php echo $fila['categoria'] ?>">
                                <option value="Granos">Granos</option>
                                <option value="Aseo">Aseo</option>
                                <option value="Mekato">mekato</option>
                                <option value="Harinas">harinas</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Stock</label>
                                    <input type="number" id="stock" name="stock" class="form-control" placeholder="50" value="<?php echo $fila['stock'] ?>" required>
                            </div>

                            <div class="form-group text-center mb-5">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                            
                        </form>
                </div>















<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<!-- pregunta antes de eliminar sweat alert -->
<script type="text/javascript">
            function preguntar(id){
            Swal
                .fire({
                    title: "¿Eliminar producto?",
                    text: "¿Estas seguro de eliminar prodcuto?",
                    icon: 'error',            
                    showCancelButton: true,
                    confirmButtonText: "Sí, eliminar",
                    cancelButtonText: "Cancelar",
                })
                .then(resultado => {
                    if (resultado.value) {
                        // Hicieron click en "Sí"
                        //console.log("*se elimina la venta*");
                        window.location.href="controlador/eliminar_producto.php?id="+id
                    } else {
                        // Dijeron que no
                        console.log("*NO se elimina*");
                    }
                });

            }
        </script>
    
</body>
</html>