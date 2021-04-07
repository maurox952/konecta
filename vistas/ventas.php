<?php

include '../conexion/conexion.php';

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
                            <th></th>
                            <th></th>
                        </thead>
                        <?php 
                        $sel = $conn ->query("SELECT * FROM tblproducto");
                            $cont=0;
                        while ($fila = $sel -> fetch_assoc()) {
                            $cont++;
                        ?>
                        <tr>
                            <td><?php echo $fila['id'] ?></td>
                            <td><?php echo $fila['nom_producto'] ?></td>
                            <td><?php echo $fila['referencia'] ?></td>
                            <td><?php echo $fila['precio'] ?></td>
                            <td><?php echo $fila['peso'] ?></td>
                            <td><?php echo $fila['categoria'] ?></td>
                            <td><?php echo $fila['stock'] ?></td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal"data-target="#modal<?php echo $cont; ?>" id="comprar">Comprar</button></td>
                        </tr>
                        <!-- modal compras -->
                        <div class="modal" tabindex="-1" role="dialog" id="modal<?php echo $cont; ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Comprar<strong> <?php echo $fila['nom_producto'] ?></strong></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="../controlador/ingresar_venta.php" method="POST">

                                        <input type="text" class="form-control" name="id" value="<?php echo $fila['id'] ?>" hidden>

                                        <br>

                                        <label>Producto:</label>
                                        <input type="text" class="form-control" name="nombre" value="<?php echo $fila['nom_producto'] ?>" required disabled>

                                        <label>Cantidad:</label>
                                        <input type="number" class="form-control" name="cantidad" value="1" required>

                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" type="submit">Actualizar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <!-- fin del modal actualizar  -->
                        <?php } ?>
                    </table>
                    <div class=" text-center mb-5 mt-5">
                        <a href="../index.php" class="btn btn-primary mx-auto">Volver</a>
                    </div>
                </div>
            </div>



        <!-- mensajes sweat alerts  -->

        <?php
        if(isset($_GET['msg'])){
            if($_GET['msg']==1){
        ?>
        <script> Swal.fire('No hay suficiente stock')</script>

        <?php
            }else{
                if($_GET['msg']==2){
        ?>
        <script>
            Swal.fire('Gracias por tu compra')
        </script>

        <?php
                }
            }
        }
        ?>















<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    
</body>
</html>