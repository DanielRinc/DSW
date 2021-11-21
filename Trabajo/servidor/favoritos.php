<?php
    $favjson = isset($_COOKIE["favoritos"]) ?  $_COOKIE["favoritos"] : '[]';

    $favarray = json_decode($favjson);
?>
<style>
    .contorno{
        border: black solid 2px;
        text-align: center;
        width: 100%;

    }
    .contornoProducto{
        border: blue solid 3px;
        display: flex;
    }
    .producto{
        border: blueviolet solid 1px;
        width: 50%;
    }
    img{
        max-width: 30%;
    }
</style>

<h1>FAVORITOS</h1>

<div class="contorno">
    <div class="contornoProducto">
        <?php
            include "modelo.php";
            $productos = listaPro();

            foreach ($favarray as $id) {
                $Produc = getProductos($id); ?>
                <div class="producto">
                    <img src="<?= $Produc["imagen"] ?>" alt="Producto"> 
                    <h2><?= $Produc["precio"] ?> €</h2>
                    <h3><?= "[".$Produc["id"]."] ".$Produc["nombre"] ?></h3>
                    <br>
                </div>
        <?php } ?>
    </div>
</div>


<br>
<br>
<a href="../index.php">Inicio</a>
