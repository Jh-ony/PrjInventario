<?php

require_once "conexion.php";

class Control
{
    function addLibros()
    {
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
    VALUES ($codigo, $titulo, $edicion, $numeroCopias, $idEditorial, cantidadConsultas, $cantidadFavoritos, $portada, $sinopsis, $url, $numeroPaginas, añoEdicion, idIdioma, $volumen, $codigoDEWEY)";  
    }

    function addCiudad()
    {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];


        $orden = "INSERT INTO ciudades (id, nombre) VALUES ('$id', '$nombre')";
        return $orden;
    }

    function addEditorial()
    {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $idCiudad = $_POST["idCiudad"];

        $orden = "INSERT INTO editoriales (id, nombre, idCiudad) VALUES ('$id', '$nombre', '$idCiudad')";
        return $orden;
    }

    function addIdioma()
    {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];


        $orden = "INSERT INTO idiomas (id, nombre) VALUES ('$id', '$nombre')";
        return $orden;
    }

    function addEstado()
    {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];


        $orden = "INSERT INTO estados (id, nombre) VALUES ('$id', '$nombre')";
        return $orden;
    }

    function addSO()
    {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];


        $orden = "INSERT INTO sistemas_operativos (id, nombre) VALUES ('$id', '$nombre')";
        return $orden;
    }

    function addPr()
    {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];


        $orden = "INSERT INTO tipos_procesadores (id, nombre) VALUES ('$id', '$nombre')";
        return $orden;
    }

    function addForm()
    {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];


        $orden = "INSERT INTO factores_forma (id, nombre) VALUES ('$id', '$nombre')";
        return $orden;
    }

    function addEquipo()
    {
        $id = $_POST["id"];
        $idModelo = $_POST["idModelo"];
        $feCompra = $_POST["feCompra"];
        $coPat = $_POST["coPat"];
        $color = $_POST["color"];
        $observaciones = $_POST["observaciones"];
        $foto = $_POST["foto"];
        $vaCompra = $_POST["vaCompra"];
        $nPecosa = $_POST["nPecosa"];
        $orCompra = $_POST["orCompra"];
        $dimension = $_POST["dimension"];


        $orden = "INSERT INTO equipos (id, idModelo, fechaCompra, codigoPatrimonial, color, obesrvaciones, foto, valorCompra, numeroPECOSA, numeroOC, dimensiones) 
                    VALUES ('$id', '$idModelo', '$feCompra', '$coPat', '$color', '$observaciones', '$foto', '$vaCompra', '$nPecosa', '$orCompra', '$dimension')";
        return $orden;
    }

    function addModelo()
    {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $detalles = $_POST["detalles"];
        $idMarca = $_POST["idMarca"];


        $orden = "INSERT INTO modelos (id, nombre, detalles, idMarca) VALUES ('$id', '$nombre', '$detalles', '$idMarca')";
        return $orden;
    }

    function addMarca()
    {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];


        $orden = "INSERT INTO marca (id, nombre) VALUES ('$id', '$nombre')";
        return $orden;
    }
}

