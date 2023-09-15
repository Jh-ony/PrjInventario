    
<?php

include_once "control.php";



    $conexion = new Conexion();
    $ctrl = new Control();
    $con = $conexion->conectar();
    $sql = $ctrl->addEquipo();
    
    $respuesta= mysqli_query($con, $sql);

    if (!$respuesta) {
        echo "no se inserto";
        
    }
    else{
        echo "se inserto";
        header ("Location: equipos.html");
    }
?>
        </div>
    <br>
        <input type="submit" value="agregar"></a>
</form>
</body>
</html>
