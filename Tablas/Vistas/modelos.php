<?php

include_once "../conexion.php";
$conexion = new Conexion();
$con = $conexion->conectar();
$sql = "SELECT * from modelos";
$respuesta= mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelos</title>
</head>
<body>

    <div>
        <h1>Modelo</h1>
        <h3>¿No hay Modelos? <a href="../Añadires/modelos.html">Añadir Modelos</a></h3>
        <div>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Detalles</th>
                <th>Marca (ID)</th>
            </tr>
            <?php

            foreach ($respuesta as $mostrar) { ?>
            <tr>

                    <td><?php echo $mostrar ['id']?></td>
                    <td><?php echo $mostrar ['nombre']?></td>
                    <td><?php echo $mostrar ['detalles']?></td>
                    <td><?php echo $mostrar ['idMarca']?></td>
                
                <?php
                    } ?>
            </tr>
        </table>
    </div>

    </div>
    <div><a href="../home.php" class=btn>Regresar</a></div>
    
</body>
</html>

