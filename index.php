
<?php 

	require_once("./assets/core/connection.php");

		$select = "SELECT pr.*, us.id as id_usuario
							 FROM adopciones ad 
							 LEFT JOIN usuarios us ON ad.usuario_id = us.id 
							 RIGHT JOIN (SELECT pe.*, ra.nombre as nombre_raza FROM perros pe INNER JOIN razas ra ON pe.raza = ra.id) pr ON AD.perro_id = pr.id
							 WHERE us.id IS NULL";

	$query = mysqli_query($conexion, $select);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Home - Doginside</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/main.css" />
</head>

<body>
<?php include_once("./assets/core/header.php") ?>
	<div class="main-page">
		<div class="content">
			<div class="row">
				<ul>
					<?php 
					while($row = mysqli_fetch_assoc($query)){
						echo 
						
						'<li>
						<a href="./perro.php?id=' . $row["id"] .'">
							<div class="dog-image" style="background-image: url('. $row["foto"] .');"></div>
								<p class="dog-name">' . $row["nombre"] . '</p>
								<span>' . $row["nombre_raza"] . '</span>
								</a></li>
						';
					}
					
					?>

				</ul>
			</div>

		</div>
	</div>
	<footer>
		<p>Oscar Gonzalez</p>
	</footer>
</body>

</html>