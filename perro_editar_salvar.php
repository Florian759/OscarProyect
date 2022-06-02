<?php

    require_once("./assets/core/connection.php");
    
    $id = $_GET["id"];

    $nombre = htmlentities(addslashes(trim($_POST["nombre"])));

    $update = " UPDATE perro SET nombre ='{$nombre}' WHERE id = {$id}";
    mysqli_query($conexion, $update);

    header("Location: ./perros_lista.php");

?>
