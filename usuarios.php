<?php

require_once("./assets/core/connection.php");

$select = "SELECT * FROM usuarios";
$query = mysqli_query($conexion, $select);

include_once("./assets/core/header.php") ?>
<div class="main-page">
    <div class="content">
        <div>
        <div class="table-actions">
      <div><h4>Usuarios</h4></div>
      <button class="button-primary">Añadir <i class="icon-plus-sign"></i></button>
      </div>
    <div class="table-wrapper">
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Email</th>
                <th></th>
                <th></th>
            <tr>
                <?php
               
			while ($row = mysqli_fetch_assoc($query)) {
				echo
				'<tr>
                    <td>' . $row["nombre"] . '</td>
                    <td>' . $row["nombre"] . '</td>
                    <td>' . $row["nombre"] . '</td>
                    <td>' . $row["nombre"] . '</td>
                    <td><a href="./editUser.php?id=' . $row["id"] . '" ><i class="icon-pencil editar"></i></a></td>
                    <td><a href="./deleteUser.php?id=' . $row["id"] . '" ><i class="icon-trash borrar"></i></a></td>
                </tr>';
			}
            
			?>
        </table>
        </div>
        </div>
    </div>
</div>
	<footer>
		<p>Oscar Gonzalez</p>
	</footer>
</body>

</html>
