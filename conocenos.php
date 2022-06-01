<?php

require_once("./assets/core/connection.php");

    $select = "SELECT * FROM conocenos LIMIT 1";
    $conocenos = "";
    $objetivo = "";
    $query = mysqli_query($conexion, $select);
    while($row = mysqli_fetch_assoc($query)){
        $conocenos = $row["quienes_somos"];
        $objetivo = $row["objetivo"];
    }

?>

    <?php include_once("./assets/core/header.php") ?>
    <div class="main-page">
        <div class="content">
            <div class="info">

                <h1>DogInside</h1>

                <h2>¿Quienes somos?</h2>

                <p>

                    <?php echo $conocenos; ?>

                </p>

                <h2>Nuestros objetivos</h2>

                <p>

                    <?php echo $objetivo; ?>

                </p>
            </div>
        </div>
    </div>
    <footer>
        <p>Oscar Gonzalez</p>
    </footer>
</body>

</html>