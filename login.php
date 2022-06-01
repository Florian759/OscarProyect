

    <?php include_once("./assets/core/header.php") ?>
    <div class="main-page">
        <div class="content">

            <div class="info">
                <h1>LOGIN</h1>

                <form action="comprueba_login.php" method="post">

                    <?php

                    if ($_GET["error"] != null && $_GET["error"] == 1){
                        echo '
                        
                            <div class="error_message">
                            
                                <p>Error: Usuario o contraseña invalido</p>
                            
                            </div>
                        
                        ';
                    }

                    ?>

                    <label>Login: </label>
                    <input type="text" name="login">

                    <label>Password: </label>
                    <input type="password" name="password">

                    <input type="submit" name="enviar" value="LOGIN" class="button-primary more-padding">

                </form>

                <p>¿Aun no estas registrado? <a href="./registro.php">Registrate</a></p>

            </div>
        </div>
    </div>
</body>

</html>