<?php

include_once "conexion.php";
$conexion = new Conexion();
$con = $conexion->conectar();
$sql = "SELECT * from equipos";
$respuesta= mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de equipos</title>
</head>
<body>

    <div>
        <h1>Equipos</h1>
        <h3>Presione <a href="Añadires/facForm.html">Aqui</a> Para añadir equipos</h3>
        <div>
        <table>
            <tr>
                <th>ID</th>
                <th>ID del Modelo</th>
                <th>Fecha de compra</th>
                <th>Codigo patrimonial</th>
                <th>Color</th>
                <th>Observaciones</th>
                <th>Foto</th>
                <th>Valor de la compra</th>
                <th>Numero PECOSA</th>
                <th>Numero de Orden de Compra</th>
                <th>Dimensiones</th>
            </tr>
            <?php

            foreach ($respuesta as $mostrar) { ?>
            <tr>

                    <td><?php echo $mostrar ['id']?></td>
                    <td><?php echo $mostrar ['idModelo']?></td>
                    <td><?php echo $mostrar ['fechaCompra']?></td>
                    <td><?php echo $mostrar ['codigoPatrimonial']?></td>
                    <td><?php echo $mostrar ['color']?></td>
                    <td><?php echo $mostrar ['observaciones']?></td>
                    <td><?php echo $mostrar ['foto']?></td>
                    <td><?php echo $mostrar ['valorCompra']?></td>
                    <td><?php echo $mostrar ['numeroPECOSA']?></td>
                    <td><?php echo $mostrar ['numeroOC']?></td>
                    <td><?php echo $mostrar ['dimensiones']?></td>
                
                <?php
                    } ?>
            </tr>
        </table>
    </div>

    </div>
    <div><a href="home.php" class=btn>Regresar</a></div>
    
</body>
</html>





