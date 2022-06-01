<?php

    require_once("./assets/core/connection.php");
    
    $idUser = $_GET["id"];

    $name = htmlentities(addslashes(trim($_POST["user"])));
    

    $update = " UPDATE usuarios SET nombre ='{$name}' WHERE id = {$idUser}";
    mysqli_query($conexion, $update);

    header("Location: ./usuarios.php");

?>
