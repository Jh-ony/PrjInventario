<?php
include_once "conexion.php";
$conexion = new Conexion();
$con = $conexion->conectar();
$sql = "SELECT * from idiomas";
$respuesta= mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idiomas Disponibles</title>
</head>
<body>

    <div>
        <h1>Idiomas Disponibles</h1>
        <h3>¿No hay idiomas? <a href="Añadires/idiomas.html">Añadir Idiomas</a></h3>
    </div>
    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>Idioma</th>
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

    <div><a href="home.php" class=btn>Regresar</a></div>

</body>
</html>

