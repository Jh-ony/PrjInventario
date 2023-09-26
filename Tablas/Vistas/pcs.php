<?php
include_once("../conexion.php");
$conexion = new Conexion();
$con = $conexion->conectar();
$sql = "SELECT * from pcs";
$respuesta= mysqli_query($con, $sql);

// CREATE - Agregar un nuevo registro de PC
if (isset($_POST["agregar"])) {
    $idTipoProcesador = $_POST["idTipoProcesador"];
    $detallesSO = $_POST["detallesSO"];
    $idSO = $_POST["idSO"];
    $detallesTipoProcesador = $_POST["detallesTipoProcesador"];
    $idEstado = $_POST["idEstado"];
    $idFactorForma = $_POST["idFactorForma"];
    $detallesFactorForma = $_POST["detallesFactorForma"];
    $observaciones = $_POST["observaciones"];
    $direccionIP = $_POST["direccionIP"];
    $mascaraRed = $_POST["mascaraRed"];
    $PuertaEnlace = $_POST["PuertaEnlace"];
    $DNS1 = $_POST["DNS1"];
    $DNS2 = $_POST["DNS2"];
    $numeroSerie = $_POST["numeroSerie"];
    $nombrePC = $_POST["nombrePC"];
    $usuarioPC = $_POST["usuarioPC"];
    $clavePC = $_POST["clavePC"];
    $foto = $_POST["foto"];

    $sql = "INSERT INTO pcs (idTipoProcesador, detallesSO, idSO, detallesTipoProcesador, idEstado, idFactorForma, detallesFactorForma, observaciones, direccionIP, mascaraRed, PuertaEnlace, DNS1, DNS2, numeroSerie, nombrePC, usuarioPC, clavePC, foto) 
    VALUES ('$idTipoProcesador', '$detallesSO', '$idSO', '$detallesTipoProcesador', '$idEstado', '$idFactorForma', '$detallesFactorForma', '$observaciones', '$direccionIP', '$mascaraRed', '$PuertaEnlace', '$DNS1', '$DNS2', '$numeroSerie', '$nombrePC', '$usuarioPC', '$clavePC', '$foto')";
    
    if ($con->query($sql) === TRUE) {
        echo "Registro de PC agregado correctamente";
    } else {
        echo "Error al agregar el registro de PC: " . $conn->error;
    }
}

// READ - Mostrar todos los registros de PC
//$result = $conn->query("SELECT * FROM pcs");
if ($respuesta->num_rows > 0) {
    while ($row = $respuesta->fetch_assoc()) {
        // Aquí puedes mostrar los campos según tu necesidad
        echo "ID: " . $row["id"] . " - Nombre PC: " . $row["nombrePC"] . " - Usuario PC: " . $row["usuarioPC"] . "<br>";
    }
} else {
    echo "No hay registros de PC registrados.";
}

// UPDATE - Actualizar un registro de PC
if (isset($_POST["actualizar"])) {
    $id = $_POST["id"];
    $nuevoUsuarioPC = $_POST["nuevoUsuarioPC"];

    $sql = "UPDATE pcs SET usuarioPC='$nuevoUsuarioPC' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Registro de PC actualizado correctamente";
    } else {
        echo "Error al actualizar el registro de PC: " . $conn->error;
    }
}

// DELETE - Eliminar un registro de PC
if (isset($_POST["eliminar"])) {
    $id = $_POST["id"];

    $sql = "DELETE FROM pcs WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Registro de PC eliminado correctamente";
    } else {
        echo "Error al eliminar el registro de PC: " . $conn->error;
    }
}

//$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Agregar Nuevo PC</title>
</head>
<body>
    <h2>Agregar Nuevo PC</h2>
    <form action="pcs.php" method="POST">
        <label for="nombrePC">Nombre del PC:</label>
        <input type="text" id="nombrePC" name="nombrePC" required><br><br>

        <label for="usuarioPC">Usuario del PC:</label>
        <input type="text" id="usuarioPC" name="usuarioPC" required><br><br>

        <label for="idTipoProcesador">ID Tipo de Procesador:</label>
        <input type="text" id="idTipoProcesador" name="idTipoProcesador"><br><br>

        <label for="detallesSO">Detalles del Sistema Operativo:</label>
        <input type="text" id="detallesSO" name="detallesSO"><br><br>

        <label for="idSO">ID SO Índice:</label>
        <input type="text" id="idSO" name="idSO"><br><br>

        <label for="detallesTipoProcesador">Detalles del Tipo de Procesador:</label>
        <input type="text" id="detallesTipoProcesador" name="detallesTipoProcesador"><br><br>

        <label for="idEstado">ID Estado Índice:</label>
        <input type="text" id="idEstado" name="idEstado"><br><br>

        <label for="idFactorForma">ID Factor de Forma:</label>
        <input type="text" id="idFactorForma" name="idFactorForma"><br><br>

        <label for="detallesFactorForma">Detalles del Factor de Forma:</label>
        <input type="text" id="detallesFactorForma" name="detallesFactorForma"><br><br>

        <label for="observaciones">Observaciones:</label>
        <input type="text" id="observaciones" name="observaciones"><br><br>

        <label for="direccionIP">Dirección IP:</label>
        <input type="text" id="direccionIP" name="direccionIP"><br><br>

        <label for="mascaraRed">Máscara de Red:</label>
        <input type="text" id="mascaraRed" name="mascaraRed"><br><br>

        <label for="PuertaEnlace">Puerta de Enlace:</label>
        <input type="text" id="PuertaEnlace" name="PuertaEnlace"><br><br>

        <label for="DNS1">DNS 1:</label>
        <input type="text" id="DNS1" name="DNS1"><br><br>

        <label for="DNS2">DNS 2:</label>
        <input type="text" id="DNS2" name="DNS2"><br><br>

        <label for="numeroSerie">Número de Serie:</label>
        <input type="text" id="numeroSerie" name="numeroSerie"><br><br>

        <label for="clavePC">Clave del PC:</label>
        <input type="text" id="clavePC" name="clavePC"><br><br>

        <label for="foto">Foto:</label>
        <input type="text" id="foto" name="foto"><br><br>

        <input type="submit" name="agregar" value="Agregar PC">
    </form>
</body>
</html>