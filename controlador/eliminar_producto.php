<?php 

include '../conexion/conexion.php';


$id=$_GET['id'];

//echo $id;

//aqui estoy borrando las ventas que se hicieron con le prodcuto por la relacion que tengo en la base de datos
$del=$conn->query("DELETE FROM tblventa WHERE id=$id");

if($del){ //si se cumple la primera consulta, me ejecuta la siguiente
    $del2=$conn->query("DELETE FROM tblproducto WHERE id=$id");
}



if($del2){
    echo "<script> alert ('Eliminado correctamente') </script>";
    echo "<script> 	location.href='../index.php'; </script>";
}else{
    echo "<script> alert ('Error') </script>";
    echo "<script> 	location.href='../index.php'; </script>";

}

?>