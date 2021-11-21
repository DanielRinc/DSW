<?php
    $ocultar = "";
    $contenido = "contenido";

    if (isset($_COOKIE["politicaCookie"])) {
        $ocultar = "ocultar";
        $contenido = "";
    }else{
        if (isset($_GET["politica"])){
            switch ($_GET["politica"]){
                case "aceptar":
                    setcookie("politicaCookie", date('m/d/Y h:i:s a', time()), time() + 1000);
                    $ocultar = "ocultar";
                    $contenido = "";
                    break;
                case "cancelar":
                    setcookie("politicaCookie", 1, time() - 1000);
                    break;
                case "configurar":
                    echo isset($_COOKIE["politicaCookie"]) ? $_COOKIE["politicaCookie"] : "";
                    break;
            }
        }
    }
?>
<?php
    session_start();
?>

<?php
    //comprobamos el usuario del login
    if (isset($_SESSION["usuario"])) {
        echo "Usuario: ".$_SESSION["usuario"];
        echo "<a class='<?= $contenido ?>' href='./servidor/logout.php'>Salir</a>";
    } else {
        echo "<a class='<?= $contenido ?>' href='./servidor/login.php'>Login</a>";
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/estilos.css">
    <title>Catalogo</title>


</head>
<body>
    
    <div style="margin:10px; border:2px solid red; background-color: wheat; width: 100%; height: 100%; opacity: 1;" class="<?= $ocultar ?>">
        Politica de cookies.
        <br>
        <a href="index.php?politica=aceptar">Aceptar</a>
        <br>
        <a href="./servidor/rechazar.php">Cancelar</a>
        <br>
        <a href="index.php?politica=configurar">Configurar</a>
    </div>
    <a class="<?= $contenido ?>" href='./servidor/carrito.php'>Carrito</a>
    <p class="titulo <?= $contenido ?>">Catalogo</p>
    <a class="<?= $contenido ?> favori" href="./servidor/favoritos.php">Favoritos</a>
    <div class="contenedor <?= $contenido ?>">
        <div class="contornoProducto">
            <?php
            //esto tengo que preguntarselo a gabri
            //$p = $_COOKIE['favoritos'] ?? '[]';
            include "./servidor/modelo.php";
            //si quito la funcion me los devuelve igual porque directamente escribe el array
            $productos = listaPro();
            foreach ($productos as $key) {
                $clase = "favorito fa fa-heart-o";
                $cooki = isset($_COOKIE["favoritos"]) ?  $_COOKIE["favoritos"] : 'nada';
                if ($cooki != 'nada') {
                    $Farray = json_decode($cooki, true);
                    if ( in_array($key["id"], $Farray) ) {
                        $clase = "favorito fa fa-heart";
                    }else{
                        $clase = "favorito fa fa-heart-o";
                    }
                }
                ?>
                <div class ="producto">
                    <i data-id="<?= $key["id"] ?>" class="<?= $clase ?>" aria-hidden="true"></i>
                    <br>
                    <img src="<?= $key["imagen"]?>" alt=""> 
                    <h3><?= $key["precio"] ?>€</h3>
                    <h3><?= $key["nombre"] ?></h3>
                    <?= $key["descripcion"] ?> 
                    <br>
                    <!-- boton detalles -->
                    <a href="./servidor/detalles.php?id=<?= $key["id"] ?>"><button class="button"><span>Detalles</span></button></a>
                    <!-- boton agregar al carrito -->
                    <button class="button agregarCarrito" data-id="<?= $key["id"] ?>"><span>Al carrito</span></button>

                </div>
            <?php
            } 
            ?>
        </div>
        <div class="favoritos">
            <iframe src="./servidor/vistos.php" frameborder="1" style="width: 250px; height: 500px"></iframe>
        </div>
    </div>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>//añadimos la libreria ajax y cambiando las clases podemos cambiar los iconos (los iconos son las clases)
        $(document).ready(function() {
            $(".favorito").click(function(){
                $(this).toggleClass("fa-heart-o fa-heart")
                //crear cookie para 
                direccion = "./servidor/crearfavoritos.php?id=" + $(this).attr("data-id") + "&agregar=" + ($(this).hasClass("fa-heart"));
                //alert("la id del producto es: " + $(this).attr("data-id") );
                //crear una cookie, para comprobar si esa cookie existe crearCookie();
    
                $.get(direccion, function(data) {
                    if (data.error != 0) {
                        alert("Error " + data.descripcion);
                    }
                });
            });
            if ($(".favorito").hasClass("fa-heart-o")) {
                //alert("no hay");
            }
            //aqui iria el jquery para llamar a agregar al carrito pasndole el ID
            $(".agregarCarrito").click(function(){
                URL = "./servidor/agregarCarrito.php?id=" + $(this).attr("data-id");
                
                $.get(URL, function(data) {
                    if (data.error != 0) {
                        alert("Error " + data.descripcion);
                    }else{ 
                        alert("Producto agregado al carrito");
                    }
                });
            });
        });

    </script>

</body>
</html>