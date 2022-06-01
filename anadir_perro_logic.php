<?php

require_once("./assets/core/connection.php");

try {

    $name = htmlentities(addslashes(trim($_POST["name"])));
    $description = htmlentities(addslashes(trim($_POST["description"])));
    $raza = htmlentities(addslashes(trim($_POST["raza"])));
    $age = htmlentities(addslashes(trim($_POST["age"])));
    $file = $_FILES["file"]["tmp_name"];

    $nombre_imagen = $_FILES['file']['name'];
    $tipo_imagen = $_FILES['file']['type'];

    if ($name == null || strlen($name) < 2) {
        return header("location:anadir_perro.php?error=1");
    }

    if ($description == null || strlen($description) < 2) {
        return header("location:anadir_perro.php?error=1");
    }
    if ($raza == null || strlen($raza) < 2) {
        return header("location:anadir_perro.php?error=1");
    }
    if ($age == null) {
        return header("location:anadir_perro.php?error=1");
    }
    
    $carpeta_destino = "./assets/images/";

    $nombreFinal = $carpeta_destino . $nombre_imagen;
    
    if ($file != null) {
        if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/jpg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/gif") {

            // Movemos la imagen del directorio tmp al directiorio escogido

            move_uploaded_file($file, $nombreFinal);
        } else {
            return header("location:anadir_perro.php?error=2");
        }
    }

    $insert = " INSERT perros(nombre,description,raza,edad, foto) VALUES('{$name}', '{$description}', '{$raza}', {$age}, '{$nombreFinal}')";

    $query = mysqli_query($conexion, $insert);

    header("Location:anadir_perro.php?ok=1");
} catch (Exception $e) {

    die("Error: " . $e->getMessage());
}
