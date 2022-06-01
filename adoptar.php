<?php

    require_once("./assets/core/connection.php");
    include_once("./assets/core/header.php");

    $id = $_REQUEST["id"];

    $update = "UPDATE perros SET id = {$userID} WHERE perros_id LIKE {$id}";
    mysqli_query($conexion, $update);
    echo $update;

    header("Location: ./index.php");

?>