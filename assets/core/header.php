<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<title>Home - Doginside</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/main.css" />
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    
</head>
<body>
<?php

error_reporting(0);
session_start();

$userID = null;
$query2 = null;
$isAdmin = false;

if ($_SESSION != null && $_SESSION["usuario"] != null) {
    $userID = $_SESSION["usuario"];
    $select = "SELECT * FROM usuarios WHERE ID LIKE {$userID}";
    $query_userdata = mysqli_query($conexion, $select);

    while ($row = mysqli_fetch_assoc($query_userdata)) {
        if ($row["isadmin"] == 1) {
            $isAdmin = true;
        }
    }
}

?>
<header class="main-header">
    <div class="logo">
        <a href="index.php">
            <img src="./assets/images/pata.png" alt="Logo" />
        </a>
    </div>
    <nav>
        <a href="index.php">Home</a>
        <?php

        if ($userID != null) {
            if ($isAdmin) {
                // echo '<a href="anadir_perro.php">Añadir perro</a>';
                echo '<a href="usuarios.php">Usuarios</a>';
                echo '<a href="perros_lista.php">Perros</a>';
                echo '<a href="razas_lista.php">Razas</a>';
                // echo '<a href="adopciones.php">Adopciones</a>';
                echo '<a href="cambiar_texto.php">Cambiar configuración</a>';
            }
        }

        ?>
        <a href="conocenos.php">Conócenos</a>
        <a href="contacto.php">Contacto</a>

    </nav>
    <?php

    if ($userID == null) {
        echo '<div class="loginAndRegister">
                    <button class="button-secondary"><a href="login.php">Login</a></button>
                    <button class="button-primary"><a href="registro.php">Registrarme</a></button>
            </div>';
    } else {
        echo '<div class="loginAndRegister">
                <ul>
                    <li class="button-secondary"><a href="cierre.php">Cerrar sesión</a></li>
                </ul>
            </div>';
    }

    ?>

</header>