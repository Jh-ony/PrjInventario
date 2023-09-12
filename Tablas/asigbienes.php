<?php
include("conexion.php");

// CREATE - Agregar una nueva asignación de bien
if (isset($_POST["agregar"])) {
    $bien_id = $_POST["bien_id"];
    $usuario_id = $_POST["usuario_id"];
    $fecha_asignacion = $_POST["fecha_asignacion"];

    $sql = "INSERT INTO asignaciones_bienes (bien_id, usuario_id, fecha_asignacion) VALUES ('$bien_id', '$usuario_id', '$fecha_asignacion')";
    if ($conn->query($sql) === TRUE) {
        echo "Asignación de bien agregada correctamente";
    } else {
        echo "Error al agregar la asignación de bien: " . $conn->error;
    }
}

// READ - Mostrar todas las asignaciones de bien
$result = $conn->query("SELECT * FROM asignaciones_bienes");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Bien ID: " . $row["bien_id"] . " - Usuario ID: " . $row["usuario_id"] . " - Fecha de Asignación: " . $row["fecha_asignacion"] . "<br>";
    }
} else {
    echo "No hay asignaciones de bienes registradas.";
}

// UPDATE - Actualizar una asignación de bien
if (isset($_POST["actualizar"])) {
    $id = $_POST["id"];
    $nuevo_usuario_id = $_POST["nuevo_usuario_id"];

    $sql = "UPDATE asignaciones_bienes SET usuario_id='$nuevo_usuario_id' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Asignación de bien actualizada correctamente";
    } else {
        echo "Error al actualizar la asignación de bien: " . $conn->error;
    }
}

// DELETE - Eliminar una asignación de bien
if (isset($_POST["eliminar"])) {
    $id = $_POST["id"];

    $sql = "DELETE FROM asignaciones_bienes WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Asignación de bien eliminada correctamente";
    } else {
        echo "Error al eliminar la asignación de bien: " . $conn->error;
    }
}

$conn->close();
?>