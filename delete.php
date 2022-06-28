<?php 

include("conexion.php");
$con=conectar();

$id_alumn=$_GET['id'];

$sql="DELETE FROM producto WHERE id_prod='$id_alumn'";
$query=mysqli_query($con, $sql);

if($query){
   
    header("location:index.php");
}

?>