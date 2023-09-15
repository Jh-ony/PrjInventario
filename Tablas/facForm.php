<?php

include_once "conexion.php";
$conexion = new Conexion();
$con = $conexion->conectar();
$sql = "SELECT * from factores_forma";
$respuesta= mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factores de forma</title>
</head>
<body>

    <div>
        <h1>Factores de Forma</h1>
        <h3>Tamaños<a href="Añadires/facForm.html">Añadir Factor de forma</a></h3>
        <div>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
            </tr>
            <?php

            foreach ($respuesta as $mostrar) { ?>
            <tr>

                    <td><?php echo $mostrar ['id']?></td>
                    <td><?php echo $mostrar ['nombre']?></td>
                
                <?php
                    } ?>
            </tr>
        </table>
    </div>

    </div>
    <div><a href="home.php" class=btn>Regresar</a></div>
    
</body>
</html>


