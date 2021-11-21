<?php
session_start();
?>

<?php
    //pillo la ID del "formulario" 
    $id = $_GET["id"];

    $carrito = $_SESSION["CARRITO"];

    $carrito[] = $id;

    $_SESSION["CARRITO"] = $carrito;

    header('Content-type: application/json');

    $respuesta = ["error" => "0", "descripcion" => "Añadido al carrito de la compra.", "num" => count($carrito)];

    echo json_encode($respuesta);
/*
    if (in_array($id, $array) && $agregar == "false") {
        $post = array_search($id, $array);
        unset($array[$post]);
    }else{
        $array[] = $id;
    }
*/
?>