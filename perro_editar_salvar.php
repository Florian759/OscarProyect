<?php

    require_once("./assets/core/connection.php");
    
    $id = $_GET["id"];

    $nombre = htmlentities(addslashes(trim($_POST["nombre"])));
    $edad = htmlentities(addslashes(trim($_POST["edad"])));
    $foto = htmlentities(addslashes(trim($_POST["foto"])));
    $description = htmlentities(addslashes(trim($_POST["description"])));
    $raza = htmlentities(addslashes(trim($_POST["raza"])));
    $adoptado = htmlentities(addslashes(trim($_POST["adoptado"])));

    $update = "DELETE FROM adopciones WHERE perro_id LIKE {$id}";
    mysqli_query($conexion, $update);
    
    if ($adoptado !== "") {
        $update =  "INSERT INTO adopciones (usuario_id, perro_id) values ({$adoptado}, {$id})";
        mysqli_query($conexion, $update);
    }

    $update = "UPDATE perros SET nombre ='{$nombre}', edad = '{$edad}', foto = '{$foto}', description = '{$description}', raza = '{$raza}' WHERE id = {$id}";
    mysqli_query($conexion, $update);

    header("Location: ./perros_lista.php");

?>
