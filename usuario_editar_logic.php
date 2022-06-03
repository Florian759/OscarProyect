<?php

    require_once("./assets/core/connection.php");
    
    $id = $_GET["id"];

    $nombre = htmlentities(addslashes(trim($_POST["nombre"])));
    $apellidos = htmlentities(addslashes(trim($_POST["apellidos"])));
    $telefono = htmlentities(addslashes(trim($_POST["telefono"])));
    $email = htmlentities(addslashes(trim($_POST["email"])));
    $admin = (htmlentities(addslashes(trim($_POST["admin"]))) === on) ? "1": "0";
    

    $update = " UPDATE usuarios SET nombre ='{$nombre}', apellidos = '{$apellidos}', telefono = '{$telefono}', email = '{$email}', isadmin = '{$admin}' WHERE id = {$id}";
    mysqli_query($conexion, $update);

    header("Location: ./usuarios.php");

?>
