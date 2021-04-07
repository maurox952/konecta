<?php
include '../conexion/conexion.php';


$hoy = date("YmdHis");
$idproducto=$_POST['id'];
$cantidad=$_POST['cantidad'];

//aqui consulto la cantidad del stock que hay en producto para hacer la validacion
$stock=$conn->query("SELECT tblproducto.stock FROM tblproducto WHERE id=$idproducto");
$fila=$stock->fetch_assoc();
$stock=$fila['stock'];

if($cantidad>$stock){
    echo "hola entro";
    echo "<script> location.href='../vistas/ventas.php?msg=1'; </script>";

}else{

    //hago la resta del producto que se vendio antes de guardarla
    $cfinal=$stock=$fila['stock'] - $cantidad;
    //y luego la actualizo en la tabla del prodcuto

    $update=$conn->query("UPDATE tblproducto SET stock='$cfinal' WHERE id=$idproducto");

    //y luego registro la venta

    $venta=$conn->query("INSERT INTO tblventa (id, fecha_venta, cantidad) VALUES ('$idproducto', '$hoy', '$cantidad')");

}

if($venta){
    echo "<script> location.href='../vistas/ventas.php?msg=2'; </script>";
}else{
    echo "<script> location.href='../vistas/ventas.php?msg=3'; </script>";
}

//echo $insertar;

//echo $categoria;

// if($venta){
//     echo "<script> alert('Correcto');</script>";
//     echo "<script> location.href='../index.php?msg=1'; </script>";
// }else{
//     echo "<script> location.href='../index.php?msg=2'; </script>";
// }
?>