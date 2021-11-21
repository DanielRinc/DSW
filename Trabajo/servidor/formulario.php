<?php
    session_start();
?>
<?php
    //comprobamos el usuario del login
    if (isset($_SESSION["usuario"])) {
        echo "Usuario: ".$_SESSION["usuario"];
        echo "<a href='./logout.php'>Salir</a>";
    } else {
        header("location: ./login.php");
    }
    
    $carrito = [];
    $carrito = $_SESSION["CARRITO"];

    if ($carrito == "" || $carrito == null || $carrito == [] ) {
        header("location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilosForm.css">
    <title>Formulario</title>
    <style>
        .contein{
            border: 2px black solid;
            
        }
        .contornoProducto{
            border: solid blue 3px;
            margin: 0 auto;
            text-align: center;
            width: 70%;
        }
        .producto{
            border: 2px solid green;
            display: inline-flex;
            width: 220.422px;
            height: 150.078px;
            font-size: 12px;
        }
        img{
            width: 40%;
            height: 50%;
            max-height: 100%;
            margin: auto;
            margin-right: 0px;
            margin-left: 0px;
            margin-bottom: 0px;
        }
        .contenido{
            display: inline-table;
        }
        .precio{
            top: auto;
        }
    </style>
</head>
<body>
    <div class="contorno">
        <form action="procesado.php">
            <input type="submit" name="Procesar" value="PROCESAR">
            <input type="reset" value="CANCELAR">
            <label for="">Campos obligatorios los marcados con = (*)</label>
            <div class="formulario">
                <div class="datosrepresentante uno">
                    <span>
                        <label for="">Numero de Tarjeta: (*)</label> <br>
                        <input type="text" name="DNINum" id="nºidentificacion" value="" placeholder="4677 6775 4376 0910 " pattern="[0-9]{16}" title="Debe poner 16 números sin espacios" required/>
                    </span>
                    <span>
                        <label for="">Titular: (*)</label> <br>
                        <input type="text" name="DNINum" id="nºidentificacion" value="" placeholder="Daniel Castro Alonso " pattern="[a-zA-Z]{2,} [a-zA-Z]{2,} [a-zA-Z]{2,}" title="Debe poner menos de 20 letras" required/>
                    </span>
                    <span>
                        <label for="">Numero de seguridad: (*)</label> <br>
                        <input type="text" name="DNINum" id="nºidentificacion" value="" placeholder="845 " pattern="[0-9]{3}" title="Debe poner 3 números" required/>
                    </span>
                    <span>
                        <label for="">Fecha de caducidad: (*)</label> <br>
                        <input type="text" name="DNINum" id="nºidentificacion" value="" placeholder="12/25 " pattern="[0-9]{1,}/[0-9]{2}" title="Debe poner 2 números / y 2 numeros" required/>
                    </span>
                </div>
                <div class="datosrepresentante tres">
                    <span>
                        <label for="telf">Telefono fijo:</label> <br>
                        <input type="tel" name="telf" id="telefono" value="" placeholder="922000000">
                    </span>
                    <span>
                        <label for="movil">Telefono movil:(*)</label> <br>
                        <input type="tel" name="movil" id="movil" value="" placeholder="666000000" required>
                    </span>
                    <span>
                        <label for="">Correo Electronico (*)</label> <br>
                        <input type="email" name="Mail" id="Mail" value="" placeholder="nombre@ejemplo.com" required>
                    </span>
                </div>
                <div class="domicilio uno">
                    <span>
                        <label for="ViaName">Direccion (*)</label> <br>
                        <input type="text" name="ViaName" id="nombredevia" value="" placeholder="Pintor Felo Mionzon" required>
                    </span>
                    <span>
                        <label for="NumeroVia">Piso:</label> <br>
                        <input type="number" name="NumeroVia" id="NºVia" value="" placeholder="43">
                    </span>
                </div>
                <div class="domicilio dos">
                    <span>
                        <label for="Portal">Portal: </label> <br>
                        <input type="text" name="Portal" id="Portal" value="" placeholder="6">
                    </span>
                    <span>
                        <label for="Letra">Letra: </label> <br>
                        <input type="text" name="Letra" id="Letra" value="" placeholder="A">
                    </span>
                    <span>
                        <label for="Puerta">Puerta: </label> <br>
                        <input type="number" name="Puerta" id="Puerta" value="" placeholder="3">
                    </span>
                </div>
            </div>
            
        </form>
        <br>
        <div class="contein">
            <div class="contornoProducto contenido">
                <?php
                    $precio = 0;
                    $precioTotal = 0;
                    include "modelo.php";
                    $productos = listaPro();

                    foreach ($carrito as $id) {
                        $Produc = getProductos($id); ?>
                        <div class="producto">
                            <img src="<?= $Produc["imagen"] ?>" alt="Producto"> 
                            <h2><?= $Produc["precio"] ?>€</h2>
                            <h3><?= "[".$Produc["id"]."] ".$Produc["nombre"] ?></h3>
                            <?php
                                
                                $precio += intval($Produc["precio"]) 
                            ?>
                            <br>
                        </div>
                <?php } ?>
            </div>
            <?php
                if ($precio > 500) {
                    $precioTotal = $precio;
                }else{
                    $porcentage = ($precio*10)/100;
                    $precioTotal = $precio + $porcentage;
                }
            ?>
            <div class="calculos contenido">
                <h2 class="precio">Precio Final: <?= $precioTotal ?></h2>
            </div>
        </div>
    </div>
</body>
</html>