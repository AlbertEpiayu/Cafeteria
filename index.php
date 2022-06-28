<?php
    include("conexion.php");
    $con=conectar();

    $sql="SELECT * FROM producto";
    $query=mysqli_query($con, $sql);

    $sqlcatg="SELECT*FROM categoria";
    $allcatg=mysqli_query($con,$sqlcatg);

    $sqlpro="SELECT*FROM bodega";
    $allpro=mysqli_query($con,$sqlpro);

    $sqlventa="SELECT*FROM venta_producto";
    $queryventa=mysqli_query($con,$sqlventa);

   
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Cafeteria</title>
</head>
<body>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <h1>Ingresar productos</h1>
                <form action="insertar.php" method="POST">
                <label for="formGroupExampleInput">ID</label>
                    <input type="text" class="form-control mb-3" disabled="true" name="id_prod" placeholder="ID productos">
                    <label for="formGroupExampleInput">Nombre</label>
                    <input type="text" class="form-control mb-3" name="name_pro" placeholder="Nombre producto *">
                    <label for="formGroupExampleInput">Referencia</label>
                    <input type="text" class="form-control mb-3" name="referencia" placeholder="Referencia *">
                    <label for="formGroupExampleInput">Precio</label>
                    <input type="text" class="form-control mb-3" name="precio" placeholder="Precio *">
                    <label for="formGroupExampleInput">Peso</label>
                    <input type="text" class="form-control mb-3" name="peso" placeholder="peso *">
                    <label for="formGroupExampleInput">Categoria *</label>
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
                    <label for="formGroupExampleInput">Stock *</label>
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
                    <label for="formGroupExampleInput">Fecha creacion</label>
                    <input type="date" class="form-control mb-3" name="fecha_creacio" placeholder="MM/DD/AAAA" id="">

                    <input type="submit" class="btn btn-primary" value="Crear productos">
                    <br>
                    

                </form>
            </div>

            <div class="col md-8">
                <h2>Listados de productos</h2>
                <table  class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Referencia</th>
                            <th>Precio</th>
                            <th>Peso</th>
                            <th>Categoria</th>
                            <th>Stock</th>
                            <th>Fecha Creacion</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row=mysqli_fetch_array($query)){
                        ?>
                             <tr>
                                 <th><?php echo $row['id_prod']?></th>
                                 <th><?php echo $row['name_pro']?></th>
                                 <th><?php echo $row['referencia']?></th>
                                 <th><?php echo $row['precio']?></th>
                                 <th><?php echo $row['peso']?></th>
                                 <th><?php echo $row['categoria']?></th>
                                 <th><?php echo $row['stock']?></th>
                                 <th><?php echo $row['fecha_creacio']?></th>
                                 <th> <a href="actualizar.php?id=<?php echo $row['id_prod']?>" class="btn btn-info">Editar</a></th>
                                 <th> <a href="delete.php?id=<?php echo $row['id_prod']?>" class="btn btn-danger">Eliminar</a></th>
                                 <th> <a href="venderpro.php?id=<?php echo $row['id_prod']?>" class="btn btn-success">Vender Producto</a></th>
                             </tr>
                        <?php
                            }
                        ?>

                    </tbody>

                </table>

            </div>
            <div class="col md-8">
                <h1>listado de ventas</h1>
                <table class="table">
                <thead class="table-success table-striped">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>

                            <th>Categoria</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Referencia</th>
                            <th>Fecha Creacion</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                        <?php
                            while($rowv=mysqli_fetch_array($queryventa)){
                        ?>
                             <tr>
                                 <th><?php echo $rowv['id_venta']?></th>
                                 <th><?php echo $rowv['nombre']?></th>
                                 <th><?php echo $rowv['categoria']?></th>
                                 <th><?php echo $rowv['stocks']?></th>
                                 <th><?php echo $rowv['precio']?></th>
                                 <th><?php echo $rowv['referencia']?></th>
                                 <th><?php echo $rowv['fecha']?></th>
                                 
                             </tr>
                        <?php
                            }
                        ?>


                    </tbody>

                </table>

            </div>
        </div>
    </div>
</body>
</html>