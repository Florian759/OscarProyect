<?php

require_once("./assets/core/connection.php");

    $select = "SELECT * FROM conocenos LIMIT 1";
    $conocenos = "";
    $objetivo = "";
    $loc = "";
    $query = mysqli_query($conexion, $select);
    while($row = mysqli_fetch_assoc($query)){
        $conocenos = $row["quienes_somos"];
        $objetivo = $row["objetivo"];
        $loc = $row["ubicacion"];
    }

?>

    <?php 
        include_once("./assets/core/header.php");
        if($isAdmin == null || $isAdmin == false){
            header('Location: index.php');
        }

    ?>
    <div class="main-page">
        <?php

        if ($_GET["error"] != null && $_GET["error"] == 1) {
            echo '
    
                <div class="error_message">
                
                    <p>Error: Algún dato es invalido</p>
                
                </div>
    
            ';
        }

        if ($_GET["ok"] != null && $_GET["ok"] == 1) {
            echo '
    
                <div class="ok_message">
                
                    <p>texto modificado con éxito</p>
                
                </div>
    
            ';
        }

        ?>
        <form action="cambiar_texto_logic.php" method="POST" class="add_dog">
            <label>Quienes somos?</label>
            <textarea name="name" placeholder="Quienes somos?"><?php echo $conocenos; ?></textarea>
            <label>Objetivos</label>
            <textarea name="objective" placeholder="Objetivos"><?php echo $objetivo; ?></textarea>
            <label>Localización</label>
            <input type="text" name="loc" placeholder="Localización"  value="<?php echo $loc; ?>"/>
            <input type="submit" value="Crear" class="button-primary" />
        </form>
    </div>
</body>

</html>