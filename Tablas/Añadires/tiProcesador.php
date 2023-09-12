
<?php

include_once "control.php";



    $conexion = new Conexion();
    $ctrl = new Control();
    $con = $conexion->conectar();
    $sql = $ctrl->addPr();
    
    $respuesta= mysqli_query($con, $sql);

    if (!$respuesta) {
        echo "no se inserto";
        
    }
    else{
        echo "se inserto";
        header ("Location: SO.html");
    }
