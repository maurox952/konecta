<?php
include '../conexion/conexion.php';


$hoy = date("Ymd");

$producto=$_POST['producto'];
$referencia=$_POST['referencia'];
$precio=$_POST['precio'];
$peso=$_POST['peso'];
$categoria=$_POST['categoria'];
$stock=$_POST['stock'];

$insertar=$conn->query("INSERT INTO tblproducto (nom_producto, referencia, precio, peso, categoria, stock, fecha, fecha_venta) VALUES ('$producto', '$referencia', '$precio', '$peso', '$categoria', '$stock', '$hoy', null)");
//echo $insertar;

//echo $categoria;

if($insertar){
    //echo "<script> alert('Correcto');</script>";
    echo "<script> location.href='../index.php?msg=1'; </script>";
}else{
    echo "<script> location.href='../index.php?msg=2'; </script>";
}
?>