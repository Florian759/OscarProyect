<?php

require_once("./assets/core/connection.php");

$idPerro = $_GET["id"];

$select = "SELECT pr.*, us.id as id_usuario
					 FROM adopciones ad 
					 LEFT JOIN usuarios us ON ad.usuario_id = us.id 
					 RIGHT JOIN (SELECT pe.*, ra.nombre as nombre_raza FROM perros pe  INNER JOIN razas ra ON pe.raza = ra.id) pr ON AD.perro_id = pr.id
					 WHERE pr.id LIKE {$idPerro}";


// $select = "SELECT r.nombre AS nombre_raza, p.nombre, p.edad, p.ID, p.foto, p.description FROM perros p INNER JOIN razas r ON r.ID = p.raza  WHERE p.ID LIKE {$idPerro}";
$query = mysqli_query($conexion, $select);

?>


	<?php include_once("./assets/core/header.php") ?>
	<div class="main-page">
		<div class="content">
			<?php
			while ($row = mysqli_fetch_assoc($query)) {

				if($row["id_usuario"] != null){
					echo '<div class="adopted"><p>Adoptado</p></div>';
				}

				echo
				'<div class="info">
						<div class="toleft">
							<img src="' . $row["foto"] . '"/>
						</div>
						<div class="toright">
							<h1>' . $row["nombre"] . '</h1>
							<h2>' . $row["nombre_raza"] . '</h2>
							<span>' . $row["edad"] . ' Años</span>
							<p>' . $row["description"] . '</p>
							';
				if ($userID != null && $row["id_usuario"] == null) {
					echo '<a href="./adoptar.php?id=' . $row["id"] . '" class="title-font"><button class="button-primary">Adoptar</button></a>';
				}
				echo '
						</div>
					</div>';
			}
			?>
		</div>
	</div>
	<footer>
		<p>Oscar Gonzalez</p>
	</footer>
</body>

</html>