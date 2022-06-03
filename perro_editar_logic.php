<?php

    require_once("./assets/core/connection.php");
    
    $id = $_GET["id"];

    $nombre = htmlentities(addslashes(trim($_POST["nombre"])));
    $edad = htmlentities(addslashes(trim($_POST["edad"])));
    $foto = htmlentities(addslashes(trim($_POST["foto"])));
    $description = htmlentities(addslashes(trim($_POST["description"])));
    $raza = htmlentities(addslashes(trim($_POST["raza"])));
    $adoptado = htmlentities(addslashes(trim($_POST["adoptado"])));
    $file = $_FILES["file"]["tmp_name"];

    $nombre_imagen = $_FILES['file']['name'];
    $tipo_imagen = $_FILES['file']['type'];

    $carpeta_destino = "./assets/images/";

    $nombreFinal = $carpeta_destino . $nombre_imagen;
    
    if ($nombre == null || strlen($nombre) < 2) {
        return header("location:perro_editar.php?id={$id}&error=1");
    }

    if ($description == null || strlen($description) < 2) {
        return header("location:perro_editar.php?id={$id}&error=1");
    }
    if ($raza == null ) {
        return header("location:perro_editar.php?id={$id}&error=1");
    }
    if ($edad == null) {
        return header("location:perro_editar.php?id={$id}&error=1");
    }

    if ($file != null) {
        if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/jpg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/gif") {

            // Movemos la imagen del directorio tmp al directiorio escogido

            move_uploaded_file($file, $nombreFinal);
        } else {
            return header("location:perro_editar.php?id={$id}&error=2");
        }
    }

    $update = "DELETE FROM adopciones WHERE perro_id LIKE {$id}";
    mysqli_query($conexion, $update);
    
    if ($adoptado !== "") {
        $update =  "INSERT INTO adopciones (usuario_id, perro_id) values ({$adoptado}, {$id})";
        mysqli_query($conexion, $update);
    }

    if ($file != null) {
        $update = "UPDATE perros SET nombre ='{$nombre}', edad = '{$edad}', foto = '{$nombreFinal}', description = '{$description}', raza = '{$raza}' WHERE id = {$id}";
    } else {
        $update = "UPDATE perros SET nombre ='{$nombre}', edad = '{$edad}', description = '{$description}', raza = '{$raza}' WHERE id = {$id}";
    }

    mysqli_query($conexion, $update);

    header("Location: ./perros_lista.php");

?>
