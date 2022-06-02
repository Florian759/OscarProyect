<?php

    require_once("./assets/core/connection.php");

    $nombre = htmlentities(addslashes(trim($_POST["nombre"])));

    $update = "INSERT INTO perros (nombre) values ('{$nombre}')";
    mysqli_query($conexion, $update);

   
    header("Location: ./perros_lista.php");

?>


