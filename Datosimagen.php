<?php

// Recibimos los datos de la imagen

$nombre_imagen=$_FILES['imagen']['name'];

$tipo_imagen=$_FILES['imagen']['type'];

$tamano_imagen=$_FILES['imagen']['size'];





if($tamano_imagen<=1000000){
    
    if($tipo_imagen=="image/jpeg" || $tipo_imagen=="image/jpg" || $tipo_imagen=="image/png" || $tipo_imagen=="image/gif"){

// Ruta de la carpeta destino en servidor

$carpeta_destino = "./assets/images/";

// Movemos la imagen del directorio tmp al directiorio escogido

move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$nombre_imagen);

    }else{
        
        echo "El archivo seleccionado no es una imagen";
        
    }

}else{
    
    
    echo "el tamaño es demasiado grande";
}


require("datos_conexion.php");

$conexion=mysqli_connect($db_host,$db_user,$db_pass);
    
    if(mysqli_connect_errno()){
        echo "Fallo al conectar con la BBDD";
        
        exit();
    }
    
    mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD");
    
    mysqli_set_charset($conexion, "utf8");
    
    $sql="INSERT INTO PERROS (FOTO) VALUES ('nombre_imagen')";
        
    $resultado=mysqli_query($conexion,$sql);

?>

