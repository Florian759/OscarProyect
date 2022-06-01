<?php

    require_once("./assets/core/connection.php");
    include_once("./assets/core/header.php");

    $id = $_REQUEST["id"];

    $update = "DELETE FROM usuarios WHERE ID LIKE {$id}";
    mysqli_query($conexion, $update);
    echo $update;

    header("Location: ./usuarios.php");

?>