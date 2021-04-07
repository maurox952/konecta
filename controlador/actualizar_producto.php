<?php
include '../conexion/conexion.php';


$hoy = date("Ymd");

$id=$_GET['id'];

$producto=$_POST['producto'];
$referencia=$_POST['referencia'];
$precio=$_POST['precio'];
$peso=$_POST['peso'];
$categoria=$_POST['categoria'];
$stock=$_POST['stock'];

$actu=$conn->query("UPDATE tblproducto SET nom_producto='$producto', referencia='$referencia', precio=$precio, peso=$peso, categoria='$categoria', stock=$stock, fecha='$hoy' WHERE id='$id'");

if ($actu) {
    //echo "<script> 	alert('Se Actualizo Correctamente') </script>";
    echo "<script> 	location.href='../index.php?msg=3';</script>";
}
else{
	echo "<script> 	location.href='../index.php?msg=2';</script>";
}

?>