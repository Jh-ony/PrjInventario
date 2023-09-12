<?php
include_once "conexion.php";
$conexion = new Conexion();
$con = $conexion->conectar();
$sql = "SELECT * from editoriales";
$respuesta= mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div>
        <h1>Editoriales</h1>
        <h3>¿No hay editoriales? <a href="Añadires/editoriales.html">Añadir Editorial</a></h3>
    </div>

    <div><a href="home.php" class=btn>Regresar</a></div>

    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>Editorial</th>
                <th>Ciudad</th>
            </tr>
         
         <?php

        foreach ($respuesta as $mostrar) { ?>
            <tr>

                    <td><?php echo $mostrar ['id']?></td>
                    <td><?php echo $mostrar ['nombre']?></td>
                    <td><?php echo $mostrar ['idCiudad']?></td>
                
                <?php
                    } ?>
            </tr>
        </table>
    </div>

</body>
</html>


