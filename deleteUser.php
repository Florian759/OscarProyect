<?php

    require_once("./assets/core/connection.php");

    $id = $_REQUEST["id"];

    $update = "DELETE FROM usuarios WHERE ID LIKE {$id}";
    mysqli_query($conexion, $update);
    echo $update;

    header("Location: ./usuarios.php");

?>