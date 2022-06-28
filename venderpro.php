<?php
include("conexion.php");
$con=conectar();
$id=$_GET['id'];
$sql="SELECT * FROM producto WHERE id_prod='$id'";
$query=mysqli_query($con, $sql);
$row=mysqli_fetch_array($query);

$sqlcatg="SELECT*FROM categoria";
$allcatg=mysqli_query($con,$sqlcatg);

$sqlpro="SELECT*FROM bodega";
$allpro=mysqli_query($con,$sqlpro);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Cafeteria</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Vender productos</h1>
        <form action="venta.php" method="POST">
            <input type="hidden" disabled="true" name="id_venta" value="<?php echo $row['id_prod']?>">
                <label for="formGroupExampleInput">ID</label>
                <input type="text" class="form-control mb-3" disabled="true" name="id_venta" placeholder="nombre del producto" value="<?php echo $row['id_prod']?>">
                <label for="formGroupExampleInput">Nombre del productos</label>
                <input type="text" class="form-control mb-3" disabled="true" name="nombre" placeholder="nombre del producto" value="<?php echo $row['name_pro']?>">
                <label for="formGroupExampleInput">Categoria</label>
                <select class="form-control mb-3" name="categoria" >
                        <?php 
                            while ($categoria = mysqli_fetch_array(
                                $allcatg,MYSQLI_ASSOC)):; 
                        ?>
                        <option class="form-control mb-3" name="categoria" value="<?php echo $categoria["id_categoria"];
                             ?>">
                            <?php echo $categoria["categoria"];?>
                         </option>
                        <?php 
                            endwhile;
                        ?>
                </select>
                <label for="formGroupExampleInput">Stock</label>
                    <select class="form-control mb-3" name="stocks">
                    <?php 
                            while ($prod = mysqli_fetch_array(
                                $allpro,MYSQLI_ASSOC)):; 
                        ?>
                        <option class="form-control mb-3" name="stocks" value="<?php echo $prod["id_bodega"];
                             ?>">
                            <?php echo $prod["id_bodega"];?>
                         </option>
                        <?php 
                            endwhile;
                        ?>
                    </select>
                    <label for="formGroupExampleInput">Precio</label>
                    <input type="text" class="form-control mb-3" disabled="true" name="precio" placeholder="precio" value="<?php echo $row['peso']?>">
                    <label for="formGroupExampleInput">Referencia</label>
                    <input type="text" class="form-control mb-3" disabled="true" name="referencia" placeholder="referencia" value="<?php echo $row['referencia']?>">
                    <label for="formGroupExampleInput">Fecha de creacion</label>
                <input type="text" class="form-control mb-3" name="fecha" placeholder="fecha creacion" value="<?php echo $row['fecha_creacio']?>">
            <input type="submit" class="btn btn-success btn-block" value="Crear Venta">
        </form>

    </div>
</body>
</html>




