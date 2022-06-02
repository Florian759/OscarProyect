<?php 

    require_once("./assets/core/connection.php");

    try{

        $user = htmlentities(addslashes(trim($_POST["login"])));

        $password = htmlentities(addslashes(trim($_POST["password"])));

        if($user == null || strlen($user) < 2){
            return header("location:login.php?error=1"); // En el login.php haces un $_GET de error
        }

        if($password == null || strlen($_POST["password"]) < 2){
            return header("location:login.php?error=1"); // En el login.php haces un $_GET de error
        }


        $password = hash("sha512", $password);

        $select="SELECT * FROM usuarios WHERE nombre LIKE '{$user}' AND password LIKE '{$password}'";

        $query = mysqli_query($conexion, $select);

        if(mysqli_num_rows($query) < 1){

            echo mysqli_num_rows($query);

           header("location:login.php?error=1"); // En el login.php haces un $_GET de error
            return;
        }

        while($row = mysqli_fetch_assoc($query)){

            session_start();
            
            $_SESSION["usuario"] = $row["id"];

            echo $_SESSION["usuario"];
            
            header("Location:index.php");
        }
    }
    
catch(Exception $e){
    
    die("Error: " . $e->getMessage());
}
    
?>
