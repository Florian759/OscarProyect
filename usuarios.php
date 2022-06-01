<?php

require_once("./assets/core/connection.php");

$select = "SELECT * FROM usuarios";
$query = mysqli_query($conexion, $select);

include_once("./assets/core/header.php") ?>
<div class="main-page">
    <div class="content">
        <table>
            <tr>
                <th>nombre</th>
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
                    <td><a href="./editUser.php?id=' . $row["ID"] . '" ><i class="icon-pencil"></i></a></td>
                    <td><a href="./deleteUser.php?id=' . $row["ID"] . '" ><i class="icon-trash"></i></a></td>
                </tr>';
			}
            
			?>
        </table>
    </div>
</div>
	<footer>
		<p>Oscar Gonzalez</p>
	</footer>
</body>

</html>