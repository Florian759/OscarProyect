<?php

    require_once("./assets/core/connection.php");

    $nombre = htmlentities(addslashes(trim($_POST["nombre"])));
    $edad = htmlentities(addslashes(trim($_POST["edad"])));
    $foto = htmlentities(addslashes(trim($_POST["foto"])));
    $descripcion = htmlentities(addslashes(trim($_POST["descripcion"])));
    $raza = htmlentities(addslashes(trim($_POST["raza"])));

    $update = "INSERT INTO perros (nombre, edad, foto, description, raza) 
               values ('{$nombre}', '{$edad}', '{$foto}', '{$descripcion}', '{$raza}')";
    mysqli_query($conexion, $update);

    //echo $update;
    header("Location: ./perros_lista.php");

?>


