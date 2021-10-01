<?php
    $imc = empty ($_REQUEST["imc"]) ? "0" : $_REQUEST["imc"];
    $descripcion="";
    $peso = empty ($_REQUEST["peso"]) ? "0" : $_REQUEST["peso"];
    $altura = empty ($_REQUEST["altura"]) ? "0" : $_REQUEST["altura"];

    if (isset($_GET["calcular"])) {
        $altura = $_GET["altura"];
        $peso = $_GET["peso"];

        //Evitar que Divida entre 0 y comprobar que los valores son numericos
        if ($altura > 0 && $peso > 0) {
            if (is_numeric($altura) && is_numeric($peso)) {
                $imc = $peso / ($altura * $altura);
            }
        }
                
        $imc = round($imc, 3);

        if ($imc < 18.5) {
            $descripcion = "bajo peso";
        } elseif ($imc < 24.9) {
            $descripcion = "peso normal";
        } elseif ($imc < 29.9) {
            $descripcion = "Sobrepeso";
        } else {
            $descripcion = "obesidad";
        }
    }

?>

<?php
    include "imc_vista.php";
?>