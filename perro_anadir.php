<?php
	require_once("./assets/core/connection.php");
	include_once("./assets/core/header.php");


	$select = "SELECT * FROM razas";

	$query = mysqli_query($conexion, $select);

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
    	<div class="form-wrapper">
        <form action="perro_anadir_logic.php" method="POST" enctype="multipart/form-data" >                         
					<div class="form-field">
						<label for="nombre">Nombre: </label>
						<input type="text" name="nombre" id="nombre">
						<label for="raza">Raza: </label>
						<select name="raza" id="raza">
						<option value="" ></option>'
						<?php
							while ($row = mysqli_fetch_assoc($query)) {
								echo '<option value="' . $row["id"] . '" >' . $row["nombre"] . '</option>';
							}
						?>
						</select>
						<label for="edad">Edad: </label>
						<input type="text" name="edad" id="edad">
						<label for="foto">Foto: </label>
						<input type="file" name="file" required/>
						<label for="descripcion">Descripción: </label>
						<input type="text" name="descripcion" id="descripcion">
					</div>
          <input type="submit" name="enviar" value="guardar" class="button-primary more-padding">
        </form>
			</div>
    </div>
</div>
	<footer>
		<p>Oscar Gonzalez</p>
	</footer>
</body>

</html>