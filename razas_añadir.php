<?php

	require_once("./assets/core/connection.php");

	include_once("./assets/core/header.php");

	if($isAdmin == null || $isAdmin == false){
		header('Location: index.php');
	}
?>

<div class="main-page">
    <div class="content">
    	<div class="form-wrapper">
        <form action="razas_añadir_logic.php" method="POST">                         
					<div class="form-field">
						<label for="nombre">Nombre: </label>
						<input type="text" name="nombre" id="nombre">
					</div>
          <input type="submit" name="enviar" value="guardar" class="button-primary more-padding">';
        </form>
			</div>
    </div>
</div>
	<footer>
		<p>Oscar Gonzalez</p>
	</footer>
</body>

</html>