<?php

require_once("./assets/core/connection.php");

$id = $_REQUEST["id"];

$select = "SELECT * FROM usuarios WHERE ID LIKE {$id}";
$query = mysqli_query($conexion, $select);

include_once("./assets/core/header.php") ?>
<div class="main-page">
    <div class="content">
	<?php  
	echo
	'		<div class="form-wrapper">
            <form action="updateUser.php?id='.$id.'" method="POST">
			';
                            
					while ($row = mysqli_fetch_assoc($query)) {
						echo
						'
						<div class="form-field">
							<label for="nombre">Nombre: </label>
							<input type="text" name="user" id="nombre" value="'. $row["nombre"]. '">
						</div>
						';
					}
					echo '<input type="submit" name="enviar" value="guardar" class="button-primary more-padding">';
				?>
            </form>
				</div>
    </div>
</div>
	<footer>
		<p>Oscar Gonzalez</p>
	</footer>
</body>

</html>