<?php

    require_once("./assets/core/connection.php");

    $id = $_REQUEST["id"];

    $update = "DELETE FROM perros WHERE id LIKE {$id}";
    mysqli_query($conexion, $update);
    echo $update;

    header("Location: ./perros_lista.php");

?>