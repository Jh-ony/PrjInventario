<?php
$localhost = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "bdtecno";

$conn = new mysqli($localhost, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}
?>