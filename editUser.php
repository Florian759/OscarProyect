<?php

require_once("./assets/core/connection.php");

$idUser = $_GET["id"];

$select = "SELECT * FROM usuarios WHERE ID LIKE {$idUser}";
$query = mysqli_query($conexion, $select);

include_once("./assets/core/header.php") ?>
<div class="main-page">
    <div class="content">
      
            <form action="registroControl.php" method="post">
                <?php


               
			while ($row = mysqli_fetch_assoc($query)) {
				echo
				'<label for="nombre">Nombre: </label>
                <input type="text" name="user" id="nombre" value="'. $row["nombre"]. '">';
			}
			?>
            </form>
    </div>
</div>
	<footer>
		<p>Oscar Gonzalez</p>
	</footer>
</body>

</html>