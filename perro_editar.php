<?php

require_once("./assets/core/connection.php");

$id = $_REQUEST["id"];

$select = "SELECT * FROM perros WHERE id LIKE {$id}";
$query = mysqli_query($conexion, $select);

include_once("./assets/core/header.php") ?>
<div class="main-page">
    <div class="content">
	<?php  

	
	echo
	'		<div class="form-wrapper">
            <form action="perro_editar_salvar.php?id='.$id.'" method="POST">
			';
                            
					while ($row = mysqli_fetch_assoc($query)) {
						echo
						'
						<div class="form-field">
							<label for="nombre">Nombre: </label>
							<input type="text" name="nombre" id="nombre" value="'. $row["nombre"]. '">
							<label for="nombre">Edad: </label>
							<input type="text" name="edad" id="apellidos" value="'. $row["edad"]. '">
							<label for="nombre">Edad: </label>
							<input type="text" name="edad" id="apellidos" value="'. $row["edad"]. '">
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