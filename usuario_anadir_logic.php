<?php

    require_once("./assets/core/connection.php");

    $nombre = htmlentities(addslashes(trim($_POST["nombre"])));
    $apellidos = htmlentities(addslashes(trim($_POST["apellidos"])));
    $password = hash("sha512", htmlentities(addslashes(trim($_POST["password"]))));
    $telefono = htmlentities(addslashes(trim($_POST["telefono"])));
    $email = htmlentities(addslashes(trim($_POST["email"])));
    $admin = (htmlentities(addslashes(trim($_POST["admin"]))) === on) ? "1": "0";

    $update = "INSERT INTO usuarios (nombre, apellidos, telefono, email, password, isadmin) values ('{$nombre}', '{$apellidos}', '{$telefono}', '{$email}', '{$password}', '{$admin}')";
    mysqli_query($conexion, $update);

   
    header("Location: ./usuarios.php");

?>


