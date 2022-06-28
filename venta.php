<?php

include("conexion.php");
$con=conectar();

$id_venta=$_POST['id_venta'];
$nombres=$_POST['nombre'];
$categoria=$_POST['categoria'];
$stock=$_POST['stocks'];
$precio=$_POST['precio'];
$referencia=$_POST['referencia'];
$fecha=$_POST['fecha'];

$sql="INSERT INTO venta_producto VALUES('$id_venta','$nombres','$categoria','$stock','$precio','$referencia','$fecha')";
$query=mysqli_query($con,$sql);

if($query){
    header("location:index.php");

}else{

}
?>