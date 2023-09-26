<?php

include_once "../conexion.php";
$conexion = new Conexion();
$con = $conexion->conectar();
$sql = "SELECT * from marcas";
$respuesta= mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacion de marcas</title>
</head>
<body>

    <div>
        <h1>Marcas</h1>
        <h3>Presione <a href="../Añadires/marcas.html">aqui</a> para añadir marcas</h3>
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
    <div><a href="../home.php" class=btn>Regresar</a></div>
    
</body>
</html>


