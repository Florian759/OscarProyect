<?php

require_once("./assets/core/connection.php");

    $select = "SELECT * FROM conocenos LIMIT 1";
    $loc = "";
    $query = mysqli_query($conexion, $select);
    while($row = mysqli_fetch_assoc($query)){
        $loc = $row["loc"];
    }

?>

    <?php include_once("./assets/core/header.php") ?>
    <div class="main-page">
        <div class="content">
            <div class="info">

                <h1>DogInside</h1>

                <h2>¿Donde estamos?</h2>

                <?php echo $loc; ?>

                <div class="mapouter">
                    <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=800&amp;height=800&amp;hl=en&amp;q=Pi ferrer 26&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>
                </div>

                <h2>Contacto</h2>

                <ul>

                    <li>Telefono: +34 999 999 999</li>
                    <li>Email: info@doginside.com</li>

                    </p>
            </div>
        </div>
    </div>
    <footer>
        <p>Oscar Gonzalez</p>
    </footer>
</body>

</html>