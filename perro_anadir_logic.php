<?php

    require_once("./assets/core/connection.php");

    $nombre = htmlentities(addslashes(trim($_POST["nombre"])));
    $edad = htmlentities(addslashes(trim($_POST["edad"])));
    $descripcion = htmlentities(addslashes(trim($_POST["descripcion"])));
    $raza = htmlentities(addslashes(trim($_POST["raza"])));
    $file = $_FILES["file"]["tmp_name"];

    $nombre_imagen = $_FILES['file']['name'];
    $tipo_imagen = $_FILES['file']['type'];

    $carpeta_destino = "./assets/images/";

    $nombreFinal = $carpeta_destino . $nombre_imagen;

    if ($nombre == null || strlen($nombre) < 2) {
        return header("location:perro_anadir.php?error=1");
    }

    if ($description == null || strlen($description) < 2) {
        return header("location:perro_anadir.php?error=1");
    }
    if ($raza == null ) {
        return header("location:perro_anadir.php?error=1");
    }
    if ($edad == null) {
        return header("location:perro_anadir.php?error=1");
    }
    
    if ($file != null) {
        if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/jpg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/gif") {

            // Movemos la imagen del directorio tmp al directiorio escogido

            move_uploaded_file($file, $nombreFinal);
        } else {
            return header("location:anadir_perro.php?error=2");
        }
    }

    $update = "INSERT INTO perros (nombre, edad, foto, description, raza) 
               values ('{$nombre}', '{$edad}', '{$nombreFinal}', '{$descripcion}', '{$raza}')";
    mysqli_query($conexion, $update);

    //echo $update;
    header("Location: ./perros_lista.php");

?>


