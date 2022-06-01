<?php 

    require_once("./assets/core/connection.php");
    
    $user = htmlentities(addslashes($_POST["user"]));
    $pass = $_POST["password"];
    $pass = hash("sha512", $pass);
    
    $insert = "INSERT INTO USUARIOS (USUARIOS, PASSWORD) VALUES ('{$user}', '{$pass}')";
        
    $resultados = mysqli_query($conexion,$insert);
    
    if($resultados==false) {
        
        return header('Location: ./registro.php?error=1');

    }else{
        
        return header('Location: ./login.php');

    }
    
    ?>