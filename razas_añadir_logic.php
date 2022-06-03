<?php

    require_once("./assets/core/connection.php");

    $nombre = htmlentities(addslashes(trim($_POST["nombre"])));


    $update = "INSERT INTO razas (nombre) values ('{$nombre}')";
    mysqli_query($conexion, $update);

   
    header("Location: ./razas_lista.php");

?>


