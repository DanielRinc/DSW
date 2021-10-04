<?php
    

    function calcularHoroscopo($mes, $dia){
        $res = "";
        if ($mes == 12 && $dia >= 21 || $mes == 1 && $dia <=19) {

            $res = "Capricornio";
        }


        return $res;
    }
    

    function mostrararray($array, $limite){
        /*
        foreach ($array as $key) {
            echo " ".$key;
        }
        */
        for ($i=0; $i < $limite; $i++) { 
            echo " ".$array[$i];
        }
    }
    

    function diasSelect($array, $name, $limite){
        echo "<select name=\"$name\" id=\"$name\">";
        for ($i=0; $i < $limite; $i++) { 
            $valor = $array[$i];
            echo "<option value=\"$valor\">".$array[$i]."</option>";
        }
        echo "</select>";
    }
    function diasSelect2($array, $name, $limite){
        for ($i=0; $i < $limite; $i++) { 
            $valor = $array[$i];
            echo "<option value=\"$valor\">".$array[$i]."</option>";
        }
    }
    
    
    function crearSelect($array, $name){
        echo "<select name=\"$name\" id=\"$name\">";
        foreach ($array as $dato) {
            echo "<option value=\"$dato\">".$dato."</option>";
        }
        echo "</select>";
    }

    
    


    
?>


<?php

    $meses = ["enero" => "31", "febrero" => "28", "marzo" => "31", "abril" => "30", "mayo" => "31",
     "junio" => "30", "julio" => "31", "agosto" => "31", "septiembre" => "30", "octubre" => "31", 
     "noviembre" => "30", "diciembre" => "31"];


    $horoscopos = ["aries", "tauro", "geminis", "cancer", 
    "leo", "virgo", "libra", "escorpio", "sagitario", "capricornio", "acuario", "piscis"];

    $dias = ["1"];
    for ($i=2; $i < 32; $i++) { 
        $dias[] = $i;
    }
    
    

    if (isset($_GET["enviarMes"])) {
        
        //crearSelect($horoscopos, "horoscopo");
        //crearSelect($meses, "meses");
        
        $mesSeleccionado = $_REQUEST['mes'];
        $conversor = $meses[$mesSeleccionado];
        /*
        diasSelect($dias, "dias", $conversor);
        */
        //echo "<h2><strong>".$mesSeleccionado,"</strong></h2>";
        
    }


    
    //mostrararray($horoscopos, count($horoscopos));

    $numeroMes = "02";

    $fecha = '2017-'.$numeroMes.'-26';

    //echo date('t', strtotime($fecha));

    //mostrararray($horoscopos, count($horoscopos));

    //echo date('t');
    /*
    echo "<select name=\"horoscopo\">";
    foreach ($horoscopos as $dato) {
        echo "<option value=\"\">".$dato."</option>";
    }
    echo "</select>";


    echo "<select name=\"meses\">";
    foreach ($meses as $dato) {
        echo "<option value=\"\">".$dato."</option>";
    }
    echo "</select>";
*/



?>

<?php
    include "horoscopo_vista.php";
?>