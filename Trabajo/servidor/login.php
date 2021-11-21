<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        .container{
            border: blue 2px solid;
            text-align: center;
            margin: 10em;
        }
        .secondContainer{
            border: springgreen 5px solid;
        }
    </style>
</head>
<body>


    <?php

        //aqui iria el codigo de la sesion del usuario etc
        if (isset($_SESSION["mensajes"])) {
            $mensajes = $_SESSION["mensajes"];
    
            foreach ($mensajes as $m) {
                echo "<li>" . $m . "</li>";
            }
    
            unset($_SESSION["mensajes"]);
        }
    
    ?>
    
    
    <div class="container">
        <div class="secondContainer">
            <!-- AQUI IRIAN LOS INPUT-->
            <form action="validacion.php" method="post">
                <br><br>
                Usuario: <input type="text" name="usuario"><br>
                <br>
                Password: <input type="password" name="clave"><br>
                <br>
                <input type="submit" value="Login" name="login">
                <br>
                <a href="../index.php">Inicio</a>
                <br><br>
            </form>
        </div>
    </div>






</body>
</html>