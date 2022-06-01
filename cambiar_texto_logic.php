<?php

require_once("./assets/core/connection.php");

try {

    $name = htmlentities(addslashes(trim($_POST["name"])));
    $objective = htmlentities(addslashes(trim($_POST["objective"])));
    $loc = htmlentities(addslashes(trim($_POST["loc"])));

    $insert = " UPDATE conocenos SET quienes_somos ='{$name}', objetivo ='{$objective}', ubicacion ='{$loc}' WHERE ID = 1";

    $query = mysqli_query($conexion, $insert);

    header("Location:cambiar_texto.php?ok=1");

} catch (Exception $e) {

    die("Error: " . $e->getMessage());
}
