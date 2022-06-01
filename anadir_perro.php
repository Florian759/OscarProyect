
<?php 

require_once("./assets/core/connection.php");

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
                
                    <p>Perro añadido con exito</p>
                
                </div>
    
            ';
        }

        ?>
        <form action="anadir_perro_logic.php" method="POST" enctype="multipart/form-data" class="add_dog">
            <label>Nombre</label>
            <input type="text" name="name" placeholder="Nombre" required/>
            <label>Descripción</label>
            <textarea name="description" placeholder="Descripción" required></textarea>
            <label>Raza</label>
            <input type="text" name="raza" placeholder="Raza" required/>
            <label>Edad</label>
            <input type="number" name="age" placeholder="Edad" required/>
            <label>Foto</label>
            <input type="file" name="file" required/>
            <input type="submit" value="Crear" class="button-primary" />
        </form>
    </div>
</body>

</html>