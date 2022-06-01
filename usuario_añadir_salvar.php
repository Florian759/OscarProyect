<?php

    require_once("./assets/core/connection.php");

    $nombre = htmlentities(addslashes(trim($_POST["nombre"])));
    $apellidos = htmlentities(addslashes(trim($_POST["apellidos"])));
    $password = hash("sha512", htmlentities(addslashes(trim($_POST["password"]))));
    $admin = htmlentities(addslashes(trim($_POST["admin"]))) === "on" ? "1": "0";

    $update = "INSERT INTO usuarios (nombre, apellidos, password, isadmin) values ('{$nombre}', '{$apellidos}', '{$password}', '{$admin}')";
    mysqli_query($conexion, $update);

    
    header("Location: ./usuarios.php");

?>


