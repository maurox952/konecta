<?php

include 'conexion/conexion.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario Konecta</title>

    <!--importacion boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Sweet alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>

                <div class="container-fluid">
                    <h1 class="mt-4">Ingresar Producto</h1>
                        <form action="controlador/ingresar_producto.php" name="add_form" method="POST">
                            <div class="form-group">
                                <label>Nombre Producto</label>
                                    <input type="text" id="producto" name="producto" class="form-control" placeholder="Nombre del Prodcuto" required>
                            </div>
                            <div class="form-group">
                            <label>Rerefencia del producto</label>
                            <input type="text" id="referencia" name="referencia" class="form-control" placeholder="COD 0123" required>
                            </div>
                            <div class="form-group">
                                <label>Precio</label>
                                    <input type="number" id="precio" name="precio" class="form-control" placeholder="20000" required>
                            </div>

                            <div class="form-group">
                                <label>Peso en Kilos</label>
                                    <input type="number" id="peso" name="peso" class="form-control" placeholder="2" required>
                            </div>

                            <div class="form-group">
                                <label>Categoria</label>
                                <select class="form-control form-control-lg" name="categoria">
                                <option value="Granos">Granos</option>
                                <option value="Aseo">Aseo</option>
                                <option value="Mekato">mekato</option>
                                <option value="Harinas">harinas</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Stock</label>
                                    <input type="number" id="stock" name="stock" class="form-control" placeholder="50" required>
                            </div>
                            <div class="form-group text-center mb-5">
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                        </form>
                </div>

                <div class="container-fluid">
                <h1 class="mt-4">Lista de Productos</h1>
                <div class="mt-4">
                    <table class="table table-hover">
                        <thead class="thead">
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>referencia</th>
                            <th>precio</th>
                            <th>peso</th>
                            <th>categoria</th>
                            <th>stock</th>
                            <th>fecha ingreso</th>
                            <th>ultima venta</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <?php 
                        $sel = $conn ->query("SELECT `tblproducto`.`id`, `tblproducto`.`nom_producto`, `tblproducto`.`referencia`, `tblproducto`.`precio`, `tblproducto`.`peso`, `tblproducto`.`categoria`, `tblproducto`.`stock`, `tblproducto`.`fecha`, `tblventa`.`fecha_venta`
                        FROM `tblproducto` 
                            LEFT JOIN `tblventa` ON `tblventa`.`id` = `tblproducto`.`id`;");
                            //$cont=0;
                        while ($fila = $sel -> fetch_assoc()) {
                            //$cont++;
                        ?>
                        <tr>
                            <td><?php echo $fila['id'] ?></td>
                            <td><?php echo $fila['nom_producto'] ?></td>
                            <td><?php echo $fila['referencia'] ?></td>
                            <td><?php echo $fila['precio'] ?></td>
                            <td><?php echo $fila['peso'] ?></td>
                            <td><?php echo $fila['categoria'] ?></td>
                            <td><?php echo $fila['stock'] ?></td>
                            <td><?php echo $fila['fecha'] ?></td>
                            <td><?php echo $fila['fecha_venta'] ?></td>
                            <td><a href="vistas/actualizar.php?id=<?php echo $fila['id']  ?>"><button class="btn btn-warning" >Actualizar</button></td></a>
                            <td><a href="#" onclick="preguntar(<?php echo $fila['id']?>)"><button class="btn btn-danger" >Eliminar</button></a></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>

            <div class="form-group text-center mb-5 mt-5">
                <a href="vistas/ventas.php"><button type="submit" class="btn btn-primary">Ir a Comprar</button></a>
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


        <!-- mensajes sweat alerts  -->

        <?php
        if(isset($_GET['msg'])){
            if($_GET['msg']==1){
        ?>
        <script> Swal.fire('Ingresado Con Exito')</script>

        <?php
            }else{
                if($_GET['msg']==2){
        ?>
        <script>
            Swal.fire('Hubo un error, intentalo de nuevo')
        </script>

        <?php
            }else{
                if($_GET['msg']==3){
        ?>
        <script>
        Swal.fire('Actualizado correctamente')
        </script>
                        <?php
                            
                    }
                }
            }
        }
        ?>
    
</body>
</html>