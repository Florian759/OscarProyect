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
            <form action="usuario_editar_salvar.php?id='.$id.'" method="POST">
			';
                            
					while ($row = mysqli_fetch_assoc($query)) {
						echo
						'
						<div class="form-field">
							<label for="nombre">Nombre: </label>
							<input type="text" name="nombre" id="nombre" value="'. $row["nombre"]. '">
							<label for="nombre">Apellidos: </label>
							<input type="text" name="apellidos" id="apellidos" value="'. $row["apellidos"]. '">
							<label for="nombre">Telefono: </label>
							<input type="text" name="telefono" id="telefono" value="'. $row["telefono"]. '">
							<label for="nombre">Email: </label>
							<input type="text" name="email" id="email" value="'. $row["email"]. '">
							<label for="nombre">Admin: </label>
							<input type="checkbox" name="admin" id="admin" '. ($row["isadmin"] == "1" ? "checked": ""). '>
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