<?php


class Conexion{


private $_server;
private $_usuario;
private $_pass;
private $_bd;

public function __construct()
{

    $this->_server = "localhost";
    $this->_usuario = "root";
    $this->_pass = "";
    $this->_bd = "bdtecno";

}
public function conectar(){
$conexion = mysqli_connect ($this->_server, $this->_usuario, $this->_pass, $this->_bd);
return $conexion;
    }
}
?>