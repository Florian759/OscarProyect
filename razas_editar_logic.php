<?php

    require_once("./assets/core/connection.php");
    
    $id = $_GET["id"];

    $name = htmlentities(addslashes(trim($_POST["nombre"])));
    

    $update = " UPDATE razas SET nombre ='{$name}' WHERE id = {$id}";
    mysqli_query($conexion, $update);

    header("Location: ./razas_lista.php");

?>
