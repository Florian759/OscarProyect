<?php

    require_once("./assets/core/connection.php");
    include_once("./assets/core/header.php");

    $id = $_REQUEST["id"];

    $update = "INSERT INTO adopciones (usuario_id, perro_id ) VALUES ({$userID}, {$id})";
    
    mysqli_query($conexion, $update);


    header("Location: ./index.php");

?>