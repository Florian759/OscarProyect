<?php

require_once("./assets/core/connection.php");

$filter = trim($_GET["filter"]);

$filterSQL = "";

if ($filter =="1") {
  $filterSQL = " WHERE us.id IS NOT NULL";
} elseif ($filter =="2") {
  $filterSQL = " WHERE us.id IS NULL";
}

$select = "SELECT pr.*, us.nombre as nombre_usuario, us.apellidos as apellidos_usuario, ad.id as adopcion_id
           FROM adopciones ad 
           LEFT JOIN usuarios us ON  ad.usuario_id = us.id 
           RIGHT JOIN (SELECT pe.*, ra.nombre as nombre_raza FROM perros pe INNER JOIN razas ra ON pe.raza = ra.id) pr ON AD.perro_id = pr.id 
          {$filterSQL} ";

$query = mysqli_query($conexion, $select);

include_once("./assets/core/header.php") ?>
<div class="main-page" id="perros-lista">
    <div class="content">
      <div>
      <h4>Perros</h4>
      <div class="table-actions">
      <?php 
        echo '
        <div>
        <label>Estado:</label>
				  <select name="filter" id="filter">
					  <option value="0" ' . (($filter =='0' || $filter =='')?'selected':'') . '>Todos</option>
            <option value="1" ' . (($filter =='1')?'selected':'') . '>Adoptados</option>
					  <option value="2" ' . (($filter =='2')?'selected':'') . '>Sin adoptar</option>
				  </select>
          </div>
        '
      ?>
      <button class="button-primary" id="addDog">Añadir <i class="icon-plus-sign"></i></button>
      </div>
      <div class="table-wrapper">
        <table>
            <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Raza</th>
                <th>Adoptado por</th>
                <th></th>
                <th></th>
            <tr>
      <?php
               
			while ($row = mysqli_fetch_assoc($query)) {
				echo
				'<tr>
            <td><div class="table-dog-pìcture" style="background-image: url('. $row["foto"] .');"></div></td>
            <td>' . $row["nombre"] . '</td>
            <td>' . $row["edad"] . '</td>
            <td>' . $row["nombre_raza"] . '</td>
            <td>' . $row["nombre_usuario"] . ' ' . $row["apellidos_usuario"] . '</td>
            <td><a href="./perro_editar.php?id=' . $row["id"] . '" ><i class="icon-pencil editar"></i></a></td>
            <td><a href="./perro_borrar.php?id=' . $row["id"] . '" ><i class="icon-trash borrar"></i></a></td>
            <td><a href="./perro_borrar_adopcion.php?id=' . $row["adopcion_id"] . '" ><i class="icon-trash borrar"></i></a></td>
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

  <script type="text/javascript">
    const selectElement = document.getElementById('filter');
    const selectElement2 = document.getElementById('addDog');

    selectElement.addEventListener('change', (event) => {
        window.location.href = `perros_lista.php?filter=${event.target.value}`;
    });

    selectElement2.addEventListener('click', (event) => {
        window.location.href = `perro_añadir.php`;
    });
  </script>
</body>

</html>