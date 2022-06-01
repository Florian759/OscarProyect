<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8" />
	<title>Home - Doginside</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>

<?php

    session_start();

    if(!isset($_SESSION["usuario"])){

    header("Location:login.php");

}
?>

    <script language="javascript">alert("Bienvenido");</script>


    <p><a href="cierre.php">Cierra Sesión</a></p>
    
</body>
</html>
