<?php

include("conexion.php");
$con=conectar();

$id_pro=$_POST['id_prod'];
$nombre=$_POST['name_pro'];
$referencia=$_POST['referencia'];
$precio=$_POST['precio'];
$peso=$_POST['peso'];
$categoria=$_POST['categoria'];
$stock=$_POST['stock'];
$fecha=$_POST['fecha_creacio'];

$sql="UPDATE producto SET name_pro='$nombre',referencia='$referencia',precio='$precio', peso='$peso', categoria='$categoria', stock='$stock', fecha_creacio='$fecha' WHERE id_prod='$id_pro'";
$query=mysqli_query($con,$sql);

if($query){
    header("location:index.php");
}

?>