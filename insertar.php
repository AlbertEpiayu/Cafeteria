<?php

include("conexion.php");
$con=conectar();

$id=$_POST['id_prod'];
$nombres=$_POST['name_pro'];
$referencia=$_POST['referencia'];
$precio=$_POST['precio'];
$peso=$_POST['peso'];
$categoria=$_POST['categoria'];
$stock=$_POST['stock'];

$fecha=$_POST['fecha_creacio'];

$sql="INSERT INTO producto VALUES('$id','$nombres','$referencia','$precio','$peso','$categoria','$stock','$fecha')";
$query=mysqli_query($con,$sql);

if($query){

    
    header("location:index.php");

}else{

}
?>