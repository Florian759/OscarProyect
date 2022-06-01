<?php
    
    error_reporting(0);

    $db_host= "localhost";
    $db_nombre= "prueba";
    $db_user= "root";
    $db_pass="";
    
    $conexion=mysqli_connect ($db_host,$db_user,$db_pass,$db_nombre);
    
    if(mysqli_connect_errno()){
        
        echo "Fallo al conectar";
        
        exit();
    }
    
    mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la Base de Datos");
    
    mysqli_set_charset($conexion, "utf8");

    
?>