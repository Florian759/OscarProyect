<?php
    
    require_once("./assets/core/connection.php");

$conexion=mysqli_connect($db_host,$db_user,$db_pass);
    
    if(mysqli_connect_errno()){
        echo "Fallo al conectar con la BBDD";
        
        exit();
    }
    
    mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD");
    
    mysqli_set_charset($conexion, "utf8");
    
    $consulta="SELECT FOTO FROM PERROS ";
    
    $resultado=mysqli_query($conexion, $consulta);

?>