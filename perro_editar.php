<?php
	require_once("./assets/core/connection.php");

	$id = $_REQUEST["id"];

	$select = "SELECT pe.*, ad.usuario_id FROM perros pe LEFT JOIN adopciones ad ON ad.perro_id = pe.id  WHERE pe.id LIKE {$id}";
	$query = mysqli_query($conexion, $select);

	$select_razas = "SELECT * FROM razas";
	$query_razas = mysqli_query($conexion, $select_razas);

	$select_usuarios = "SELECT * FROM usuarios";
	$query_usuarios = mysqli_query($conexion, $select_usuarios);

	include_once("./assets/core/header.php");

	if($isAdmin == null || $isAdmin == false){
		header('Location: index.php');
	}

	if ($_GET["error"] != null && $_GET["error"] == 1) {
		echo '
				<div class="error_message">
						<p>Error: Algún dato es invalido</p>                
				</div>
		';
	}
?>
<div class="main-page">
    <div class="content">
	<?php  

	
	echo
	'		<div class="form-wrapper">
            <form action="perro_editar_logic.php?id='.$id.'" method="POST" enctype="multipart/form-data">
			';
                            
					while ($row = mysqli_fetch_assoc($query)) {
						echo '
						<div class="form-field">
							<label for="nombre">Nombre: </label>
							<input type="text" name="nombre" id="nombre" value="'. $row["nombre"]. '">
							<label for="raza">Raza: </label>
							<select name="raza" id="raza" >
							';

							while ($row_raza = mysqli_fetch_assoc($query_razas)) {
								echo '<option value="' . $row_raza["id"] . '" ' . (($row["raza"] == $row_raza["id"])?'selected':'') . ' >' . $row_raza["nombre"] . '</option>';
							}

							echo '
							</select>
							<label for="edad">Edad: </label>
							<input type="text" name="edad" id="edad" value="'. $row["edad"]. '">
							
							<label for="file">Foto: </label>
							<img src="' . $row["foto"] . '"/><br>
							<input type="file" name="file" />
							<label for="adoptado">Adoptado por: </label>

							<select name="adoptado" id="adoptado" >
							<option value="" ></option> ';

							while ($row_usuarios = mysqli_fetch_assoc($query_usuarios)) {
								echo '<option value="' . $row_usuarios["id"] . '" ' . (($row["usuario_id"] == $row_usuarios["id"])?'selected':'') . ' >' . $row_usuarios["nombre"] . '</option>';
							}

							echo '
							</select>
							<label for="description">Descripción: </label>
							<input type="text" name="description" id="description" value="'. $row["description"]. '">
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
