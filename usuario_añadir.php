<?php

require_once("./assets/core/connection.php");

include_once("./assets/core/header.php") ?>
<div class="main-page">
    <div class="content">
    	<div class="form-wrapper">
        <form action="usuario_añadir_salvar.php" method="POST">                         
					<div class="form-field">
						<label for="nombre">Nombre: </label>
						<input type="text" name="nombre" id="nombre">
            <label for="nombre">Apellidos: </label>
            <input type="text" name="apellidos" id="apellidos">
            <label for="nombre">Password: </label>
            <input type="text" name="password" id="password">
            <label for="nombre">Admin: </label>
            <input type="checkbox" name="admin" id="admin">
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