<?php
include("conexcion.php");

// Inicializa $result como una variable vacía
$result = null;

// CREATE - Agregar un nuevo registro
if (isset($_POST["agregar"])) {
    $codigo = $_POST["codigo"];
    $titulo = $_POST["titulo"];
    $edicion = $_POST["edicion"];
    $numeroCopias = $_POST["numeroCopias"];
    $idEditorial = $_POST["idEditorial"];
    $cantidadConsultas = $_POST["cantidadConsultas"];
    $cantidadFavoritos = $_POST["cantidadFavoritos"];
    $portada = $_POST["portada"];
    $sinopsis = $_POST["sinopsis"];
    $url = $_POST["url"];
    $numeroPaginas = $_POST["numeroPaginas"];
    $ano_edicion = $_POST["ano_edicion"];
    $idIdioma = $_POST["idIdioma"];
    $volumen = $_POST["volumen"];
    $codigoDEWEY = $_POST["codigoDEWEY"];

    $sql = "INSERT INTO libros (codigo, titulo, edicion, numeroCopias, idEditorial, cantidadConsultas, cantidadFavoritos, portada, sinopsis, url, numeroPaginas, ano_edicion, idIdioma, volumen, codigoDEWEY) 
    VALUES ('$codigo', '$titulo', '$edicion', '$numeroCopias', '$idEditorial', '$cantidadConsultas', '$cantidadFavoritos', '$portada', '$sinopsis', '$url', '$numeroPaginas', '$ano_edicion', '$idIdioma', '$volumen', '$codigoDEWEY')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registro agregado correctamente";
    } else {
        echo "Error al agregar el registro: " . $conn->error;
    }
}

// READ - Mostrar todos los registros
$result = $conn->query("SELECT * FROM libros");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Inventario</title>
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
    <div class="container">
        <form action="libros" method="POST">
            <div class="form-group">
                <label for="codigo">Código:</label>
                <input type="text" id="codigo" name="codigo" required>
            </div>

            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required>
            </div>

            <div class="form-group">
                <label for="edicion">Edición:</label>
                <input type="text" id="edicion" name="edicion" required>
            </div>

            <div class="form-group">
                <label for="numeroCopias">Número de Copias:</label>
                <input type="text" id="numeroCopias" name="numeroCopias" required>
            </div>

            <div class="form-group">
                <label for="idEditorial">ID de Editorial:</label>
                <input type="text" id="idEditorial" name="idEditorial" required>
            </div>

            <div class="form-group">
                <label for="cantidadConsultas">Cantidad de Consultas:</label>
                <input type="text" id="cantidadConsultas" name="cantidadConsultas" required>
            </div>

            <div class="form-group">
                <label for="cantidadFavoritos">Cantidad de Favoritos:</label>
                <input type="text" id="cantidadFavoritos" name="cantidadFavoritos" required>
            </div>

            <div class="form-group">
                <label for="portada">Portada (varchar(50)):</label>
                <input type="text" id="portada" name="portada">
            </div>

            <div class="form-group">
                <label for="psinopsis">Sinopsis:</label>
                <textarea id="psinopsis" name="psinopsis"></textarea>
            </div>

            <div class="form-group">
                <label for="url">URL:</label>
                <input type="text" id="url" name="url">
            </div>

            <div class="form-group">
                <label for="numeroPaginas">Número de Páginas:</label>
                <input type="text" id="numeroPaginas" name="numeroPaginas">
            </div>

            <div class="form-group">
                <label for="ano_edicion">Año de Edición:</label>
                <input type="text" id="ano_edicion" name="ano_edicion">
            </div>

            <div class="form-group">
                <label for="idIdioma">ID de Idioma:</label>
                <input type="text" id="idIdioma" name="idIdioma">
            </div>

            <div class="form-group">
                <label for="volumen">Volumen:</label>
                <input type="text" id="volumen" name="volumen">
            </div>

            <div class="form-group">
                <label for="codigoDEWEY">Código DEWEY:</label>
                <input type="text" id="codigoDEWEY" name="codigoDEWEY">
            </div>

            <input type="submit" name="agregar" value="Agregar Registro">
        </form>

        <div class="output">
            <?php
            // Mostrar los registros existentes
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<p>ID: " . $row["id"] . "<br>";
                    echo "Código: " . $row["codigo"] . "<br>";
                    echo "Título: " . $row["titulo"] . "</p>";
                    // Continúa mostrando los otros campos aquí
                }
            } else {
                echo "<p>No hay registros registrados.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>




////////////////////
<?php
include("conexcion.php");

// Inicializa $result como una variable vacía
$result = null;

// CREATE - Agregar un nuevo registro
if (isset($_POST["agregar"])) {
    // Recupera los datos del formulario
    $codigo = $_POST["codigo"];
    $titulo = $_POST["titulo"];
    $edicion = $_POST["edicion"];
    $numeroCopias = $_POST["numeroCopias"];
    $idEditorial = $_POST["idEditorial"];
    $cantidadConsultas = $_POST["cantidadConsultas"];
    $cantidadFavoritos = $_POST["cantidadFavoritos"];
    $portada = $_POST["portada"];
    $sinopsis = $_POST["sinopsis"];
    $url = $_POST["url"];
    $numeroPaginas = $_POST["numeroPaginas"];
    $ano_edicion = $_POST["ano_edicion"];
    $idIdioma = $_POST["idIdioma"];
    $volumen = $_POST["volumen"];
    $codigoDEWEY = $_POST["codigoDEWEY"];

    // Consulta SQL para agregar un nuevo registro
    $sql = "INSERT INTO libros (codigo, titulo, edicion, numeroCopias, idEditorial, cantidadConsultas, cantidadFavoritos, portada, psinopsis, url, numeroPaginas, ano_edicion, idIdioma, volumen, codigoDEWEY) 
    VALUES ('$codigo', '$titulo', '$edicion', '$numeroCopias', '$idEditorial', '$cantidadConsultas', '$cantidadFavoritos', '$portada', '$sinopsis', '$url', '$numeroPaginas', '$ano_edicion', '$idIdioma', '$volumen', '$codigoDEWEY')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registro agregado correctamente";
    } else {
        echo "Error al agregar el registro: " . $conn->error;
    }
}

// READ - Mostrar todos los registros ordenados por ID
$result = $conn->query("SELECT * FROM libros ORDER BY id");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Inventario</title>
    <style>
        /* Tu estilo CSS aquí */
    </style>
</head>
<body>
    <h2>Agregar Nuevo Registro</h2>
    <div class="container">
        <!-- Formulario para agregar un nuevo registro -->
        <form action="libros" method="POST">
            <!-- Campos del formulario -->
            <!-- Agrega más campos según tus necesidades -->
            <div class="form-group">
                <label for="codigo">Código:</label>
                <input type="text" id="codigo" name="codigo" required>
            </div>

            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required>
            </div>

            <!-- Agrega más campos aquí -->

            <!-- Botón para agregar el registro -->
            <input type="submit" name="agregar" value="Agregar Registro">
        </form>

        <!-- Mostrar los registros existentes en una tabla ordenada -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Título</th>
                    <!-- Agrega más encabezados según tus necesidades -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Mostrar los registros existentes en la tabla
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["codigo"] . "</td>";
                        echo "<td>" . $row["titulo"] . "</td>";
                        // Agrega más columnas según tus necesidades
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='16'>No hay registros registrados.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
