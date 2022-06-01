<?php

require_once("./assets/core/connection.php");

$select = "SELECT * FROM razas";
$query = mysqli_query($conexion, $select);

include_once("./assets/core/header.php") ?>
<div class="main-page">
    <div class="content">
        <div class="table-wrapper">
            <table>
                <tr>
                    <th>Nombre</th>
                    <th></th>
                    <th></th>
                <tr>
                    <?php
                
                while ($row = mysqli_fetch_assoc($query)) {
                    echo
                    '<tr>
                        <td>' . $row["nombre"] . '</td>
                        <td><a href="./razas_editar.php?id=' . $row["id"] . '" ><i class="icon-pencil editar"></i></a></td>
                        <td><a href="./razas_borrar.php?id=' . $row["id"] . '" ><i class="icon-trash borrar"></i></a></td>
                    </tr>';
                }
                
                ?>
            </table>
        </div>
    </div>
</div>
	<footer>
		<p>Oscar Gonzalez</p>
	</footer>
</body>

</html>