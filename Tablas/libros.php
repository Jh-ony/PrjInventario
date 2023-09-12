


<?php
include("conexion.php");

$conexion = new Conexion();
$con = $conexion->conectar();
$sql = "SELECT * from libros";
$respuesta= mysqli_query($con, $sql);



if (isset($_POST["agregar"])) {
    $codigo = $_POST["codigo"];
    $titulo = $_POST["titulo"];
    $edicion = $_POST["edicion"];
    $numeroCopias = $_POST["numeroCopias"];
    $idEditorial = $_POST["idEditorial"];
    $cantidadConsultas = $_POST["cantidadConsultas"];
    $cantidadFavoritos = $_POST["cantidadFavoritos"];
    $portada = $_POST["portada"];
    $sinopsis = $_POST["psinopsis"]; 
    $url = $_POST["url"];
    $numeroPaginas = $_POST["numeroPaginas"];
    $ano_edicion = $_POST["ano_edicion"];
    $idIdioma = $_POST["idIdioma"];
    $volumen = $_POST["volumen"];
    $codigoDEWEY = $_POST["codigoDEWEY"];

    $sql = "INSERT INTO libros (codigo, titulo, edicion, numeroCopias, idEditorial, cantidadConsultas, cantidadFavoritos, portada, psinopsis, url, numeroPaginas, año_edicion, idIdioma, volumen, codigoDEWEY) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssssss", $codigo, $titulo, $edicion, $numeroCopias, $idEditorial, $cantidadConsultas, $cantidadFavoritos, $portada, $sinopsis, $url, $numeroPaginas, $ano_edicion, $idIdioma, $volumen, $codigoDEWEY);
    
    if ($stmt->execute()) {
        echo "Registro agregado correctamente";
    } else {
        echo "Error al agregar el registro: " . $conn->error;
    }
}



if ($respuesta->num_rows > 0) {
    while ($row = $respuesta->fetch_assoc()) {
    
        echo "ID: " . $row["id"] . " - Título: " . $row["titulo"] . " - Cantidad: " . $row["numeroCopias"] . "<br>";
    }
} else {
    echo "No hay registros registrados.";
}


if (isset($_POST["actualizar"])) {
    $id = $_POST["id"];
    $nuevoTitulo = $_POST["nuevoTitulo"];

    $sql = "UPDATE libros SET titulo=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $nuevoTitulo, $id);
    
    if ($stmt->execute()) {
        echo "Registro actualizado correctamente";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}


if (isset($_POST["eliminar"])) {
    $id = $_POST["id"];

    $sql = "DELETE FROM libros WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "Registro eliminado correctamente";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
}

// $conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gestión de libros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h2 {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
        }

        .output {
            margin-top: 20px;
        }

        .output p {
            padding: 10px;
            background-color: #f4f4f4;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h2>Agregar Nuevo Registro</h2>
    <form action="libros.php" method="POST">
    <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" required><br><br>

        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="edicion">Edición:</label>
        <input type="text" id="edicion" name="edicion" required><br><br>

        <label for="numeroCopias">Número de Copias:</label>
        <input type="text" id="numeroCopias" name="numeroCopias" required><br><br>

        <label for="idEditorial">ID de Editorial:</label>
        <input type="text" id="idEditorial" name="idEditorial" required><br><br>

        <label for="cantidadConsultas">Cantidad de Consultas:</label>
        <input type="text" id="cantidadConsultas" name="cantidadConsultas" required><br><br>

        <label for="cantidadFavoritos">Cantidad de Favoritos:</label>
        <input type="text" id="cantidadFavoritos" name="cantidadFavoritos" required><br><br>

        <label for="portada">Portada (varchar(50)):</label>
        <input type="text" id="portada" name="portada"><br><br>

        <label for="psinopsis">Sinopsis:</label>
        <textarea id="psinopsis" name="psinopsis"></textarea><br><br>

        <label for="url">URL:</label>
        <input type="text" id="url" name="url"><br><br>

        <label for="numeroPaginas">Número de Páginas:</label>
        <input type="text" id="numeroPaginas" name="numeroPaginas"><br><br>

        <label for="ano_edicion">Año de Edición:</label>
        <input type="text" id="ano_edicion" name="ano_edicion"><br><br>

        <label for="idIdioma">ID de Idioma:</label>
        <input type="text" id="idIdioma" name="idIdioma"><br><br>

        <label for="volumen">Volumen:</label>
        <input type="text" id="volumen" name="volumen"><br><br>

        <label for="codigoDEWEY">Código DEWEY:</label>
        <input type="text" id="codigoDEWEY" name="codigoDEWEY"><br><br>

        <input type="submit" name="agregar" value="Agregar Registro">

        <div><a href="home.php" class=btn>Regresar</a></div>
    </form>
</body>
</html>


