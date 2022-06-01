<?php

require_once("./assets/core/connection.php");

$filter = trim($_GET["filter"]);

$filterSQL = "";

if ($filter =="1") {
  $filterSQL = " WHERE us.id IS NOT NULL";
} elseif ($filter =="2") {
  $filterSQL = " WHERE us.id IS NULL";
}

$select = "SELECT pr.*, us.nombre as nombre_usuario, us.apellidos as apellidos_usuario
           FROM adopciones ad 
           LEFT JOIN usuarios us ON  ad.usuario_id = us.id 
           RIGHT JOIN (SELECT pe.*, ra.nombre as nombre_raza FROM perros pe INNER JOIN razas ra ON pe.raza = ra.id) pr ON AD.perro_id = pr.id 
          {$filterSQL} ";

$query = mysqli_query($conexion, $select);

include_once("./assets/core/header.php") ?>
<div class="main-page">
    <div class="content">
      <div>
      <?php 
        echo '
				  <select name="filter" id="filter">
					  <option value="0" ' . (($filter =='0' || $filter =='')?'selected':'') . '>Todos</option>
            <option value="1" ' . (($filter =='1')?'selected':'') . '>Adoptados</option>
					  <option value="2" ' . (($filter =='2')?'selected':'') . '>Sin adoptar</option>
				  </select>
        '
      ?>

      </div>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Raza</th>
                <th>Foto</th>
                <th>Adoptado por</th>
                <th></th>
                <th></th>
            <tr>
      <?php
               
			while ($row = mysqli_fetch_assoc($query)) {
				echo
				'<tr>
            <td>' . $row["nombre"] . '</td>
            <td>' . $row["edad"] . '</td>
            <td>' . $row["nombre_raza"] . '</td>
            <td>' . $row["foto"] . '</td>
            <td>' . $row["nombre_usuario"] . ' ' . $row["apellidos_usuario"] . '</td>
            <td></td>
            <td><a href="./perros_editar.php?id=' . $row["id"] . '" ><i class="icon-pencil"></i></a></td>
            <td><a href="./perros_borrar.php?id=' . $row["id"] . '" ><i class="icon-trash"></i></a></td>
        </tr>';
			}
            
			?>
        </table>
    </div>
</div>
	<footer>
		<p>Oscar Gonzalez</p>
	</footer>

  <script type="text/javascript">
    const selectElement = document.getElementById('filter');

    selectElement.addEventListener('change', (event) => {
        console.log("papata");
        window.location.href = `perros_lista.php?filter=${event.target.value}`;
    });
  </script>
</body>

</html>