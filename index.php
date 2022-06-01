
<?php 

	require_once("./assets/core/connection.php");

	$select = "SELECT r.nombre AS nombre_raza, p.nombre, p.edad, p.ID, p.foto, p.description FROM perros p INNER JOIN razas r ON r.ID = p.raza";
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
						'<a href="./perro.php?id=' . $row["ID"] .'">
							<li>
								<img src="' . $row["foto"] . '" />
								<p class="dog-name">' . $row["nombre"] . '</p>
								<span>' . $row["nombre_raza"] . '</span>
							</li>
						</a>';
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