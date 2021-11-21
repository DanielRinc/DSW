<style>
    .producto-detalle{
        text-align: center;
        border: 3px black solid;
        width: 80%;
        margin: 0 auto;
        font-size: 20px;
    }
    img{
        width: 45%;
        max-height: 300px;
    }
</style>
<?php
    $id = $_GET["id"];
    $detajson = isset($_COOKIE["detalle"]) ?  $_COOKIE["detalle"] : '{}';
    //el json favjson lo conviertes en un array
    $array = json_decode($detajson, true);

    if ( in_array($id, $array) ) {

    }else{
        $array[] = $id;
    }
    
    setcookie ("detalle",json_encode($array), time() + 365*24*60*60, "/" );
    //setcookie("detalle[".$_GET["id"]."]", $_GET["id"], time() + 365*24*60*60);
?>

<?php include_once "modelo.php" ?>

<?php
    if(isset($_GET["id"])) {
        $id=$_GET["id"];
        $key = getProductos($id);

        ?>

    <h1>Detalles del producto</h1>

    <div class="producto-detalle">
        <i class="favorito fa fa-heart-o" aria-hidden="true"></i>
        <br>
        <img src="<?= $key["imagen"] ?>" alt="Producto"> <br>
        <h2><?= $key["precio"] ?> €</h2>
        <h3><?= $key["nombre"] ?></h3>
        <?= $key["descripcion"] ?>
        <br>
        <a href="../index.php"><button>Volver</button></a>
        <br>

    </div>

    <?php } else { ?>

        <h1>PRODUCTO NO SELECCIONADO</h1>

    <?php }?>
