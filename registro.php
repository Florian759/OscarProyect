<?php include_once("./assets/core/header.php") ?>
    <div class="main-page">
        <div class="content">

            <div class="info">
                <h1>REGISTRO</h1>

                <form action="registroControl.php" method="post">

                    <?php

                    if ($_GET["error"] != null && $_GET["error"] == 1) {
                        echo '
                        
                            <div class="error_message">
                            
                                <p>Error: Usuario o contraseña invalido</p>
                            
                            </div>
                        
                        ';
                    }

                    ?>

                    <label>Usuario: </label>
                    <input type="text" name="user">

                    <label>Password: </label>
                    <input type="password" name="password">

                    <input type="submit" name="enviar" value="REGISTRARME" class="button-primary more-padding">

                </form>

                <p>¿Ya tienes cuenta? <a href="./login.php">Entrar</a></p>

            </div>
        </div>
    </div>
</body>

</html>