<?php
    session_start();
?>

<?php
    $carrito = [];

    if (isset($_GET["vaciar"])) {
        $_SESSION["CARRITO"] = [];
    } else if (isset($_SESSION["CARRITO"])) {
        $carrito = $_SESSION["CARRITO"];
    }
?>
<style>
    .contorno{
        border: 2px black solid;
        display: flex;

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
        width: 340.422px;
        height: 199.078px;
    }
    img{
        width: 40%;
        height: 50%;
        max-height: 100%;
        margin: 50px;
        margin-right: 0px;
    }
    .contenido{
        display: inline-table;
    }
    .precio{
        top: auto;
    }
    .pagar{
        margin-left: 80%;
    }
</style>

<h1>CARRITO</h1>

<a href="./carrito.php?vaciar">
    <button>Vaciar carrito</button>
</a>
<?php
    if ($carrito == "" || $carrito == null || $carrito == [] ) {
        
    }else{
        echo "<a href='./formulario.php'><button class='pagar'> Finalizar y Pagar </button> </a>";
    }
?>


<div class="contorno">
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
        <h4 class="precio">Gastos de envio: 10%</h4>
        <h3 class="precio">Precio: <?= $precio ?></h3>
        <h2 class="precio">Precio Final: <?= $precioTotal ?></h2>
    </div>
</div>


<br>
<br>
<a href="../index.php">Inicio</a>