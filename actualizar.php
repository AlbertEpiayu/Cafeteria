<?php
include("conexion.php");
$con=conectar();
$id=$_GET['id'];
$sql="SELECT * FROM producto WHERE id_prod='$id'";
$query=mysqli_query($con, $sql);

$sqlcatg="SELECT*FROM categoria";
$allcatg=mysqli_query($con,$sqlcatg);

$sqlpro="SELECT*FROM bodega";
$allpro=mysqli_query($con,$sqlpro);

$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Actulizar Datos</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Actualizar Datos</h1>
        <form action="update.php" method="POST">
            <input type="hidden" name="id_prod" value="<?php echo $row['id_prod']?>">
                <input type="text" class="form-control mb-3" name="name_pro" placeholder="nombre del producto" value="<?php echo $row['name_pro']?>">
                <input type="text" class="form-control mb-3" name="referencia" placeholder="referencia" value="<?php echo $row['referencia']?>">
                <input type="text" class="form-control mb-3" name="precio" placeholder="precio" value="<?php echo $row['precio']?>">
                <input type="text" class="form-control mb-3" name="peso" placeholder="peso" value="<?php echo $row['peso']?>">
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
                    <select class="form-control mb-3" name="stock">
                    <?php 
                            while ($prod = mysqli_fetch_array(
                                $allpro,MYSQLI_ASSOC)):; 
                        ?>
                        <option class="form-control mb-3" name="stock" value="<?php echo $prod["id_bodega"];
                             ?>">
                            <?php echo $prod["id_bodega"];?>
                         </option>
                        <?php 
                            endwhile;
                        ?>
                    </select>
                <input type="text" class="form-control mb-3" name="fecha_creacio" placeholder="fecha creacion" value="<?php echo $row['fecha_creacio']?>">
            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
        </form>

    </div>
</body>
</html>