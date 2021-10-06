<?php

    $diaSeleccionado = empty ($_REQUEST['dias']) ? "0" : $_REQUEST['dias'];
    
    $mesSeleccionado = empty ($_REQUEST['mes']) ? "Seleccionar Mes" : $_REQUEST['mes'];
    function calcularHoroscopo($mes, $dia){
        $res = "";
        if ($mes == 12 && $dia >= 22 || $mes == 1 && $dia <= 20) {
            $res = "Capricornio";
        }else{
            if ($mes == 1 && $dia >= 21 || $mes == 2 && $dia <= 19) {
                $res = "Acuario";
            }else{
                if ($mes == 2 && $dia >= 20 || $mes == 3 && $dia <= 20) {
                    $res = "Piscis";
                }else{
                    if ($mes == 3 && $dia >= 21 || $mes == 4 && $dia <= 20) {
                        $res = "Aries";
                    }else {
                        if ($mes == 4 && $dia >= 21 || $mes == 5 && $dia <= 20) {
                            $res = "Tauro";
                        }else {
                            if ($mes == 5 && $dia >= 21 || $mes == 6 && $dia <= 20) {
                                $res = "Geminis";
                            }else {
                                if ($mes == 6 && $dia >= 21 || $mes == 7 && $dia <= 20) {
                                    $res = "Cancer";
                                }else {
                                    if ($mes == 7 && $dia >= 21 || $mes == 8 && $dia <= 21) {
                                        $res = "Leo";
                                    }else {
                                        if ($mes == 8 && $dia >= 22 || $mes == 9 && $dia <= 20) {
                                            $res = "Virgo";
                                        }else {
                                            if ($mes == 9 && $dia >= 21 || $mes == 10 && $dia <= 20) {
                                                $res = "Libra";
                                            }else {
                                                if ($mes == 10 && $dia >= 21 || $mes == 11 && $dia <= 21) {
                                                    $res = "Escorpio";
                                                }else {
                                                    if ($mes == 11 && $dia >= 22 || $mes == 12 && $dia <= 21) {
                                                        $res = "Sagitario";
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
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

    /*
    $arrayMeses = ["enero" => "31", "febrero" => "28", "marzo" => "31", "abril" => "30", "mayo" => "31",
     "junio" => "30", "julio" => "31", "agosto" => "31", "septiembre" => "30", "octubre" => "31", 
     "noviembre" => "30", "diciembre" => "31"];
    */

     $arrayMeses=['Enero' => 31,'Febrero' => 00,'Marzo' => 00,'Abril' => 00,'mayo' => 31,'Junio' => 00,'Julio' => 00,
     'Agosto' => 00,'Septiembre' => 00,'Octubre' => 00,'Noviembre' => 00,'Diciembre' => 00];


    $arrayMesesANumero = ["enero" => 1, "febrero" => 2, "marzo" => "3", "abril" => "4", "mayo" => "5",
    "junio" => "6", "julio" => "7", "agosto" => "8", "septiembre" => "9", "octubre" => "10", 
    "noviembre" => "11", "diciembre" => "12"];


    $horoscopos = ["aries", "tauro", "geminis", "cancer", 
    "leo", "virgo", "libra", "escorpio", "sagitario", "capricornio", "acuario", "piscis"];

    $dias = ["1"];
    for ($i=2; $i < 32; $i++) { 
        $dias[] = $i;
    }
    
    $result  = "Aun no se ha seleccionado";
    //$result = empty ($_REQUEST['dias']) ? "Aun no se ha calculado" : $_REQUEST['dias'];
    if (isset($_GET["enviarMes"])) {
        //crearSelect($horoscopos, "horoscopo");
        //crearSelect($arrayMeses, "arrayMeses");
        if (isset($_REQUEST['mes'])) { 
            $mesSeleccionado = $_REQUEST['mes'];
            if ($mesSeleccionado == "Seleccionar Mes") {
                
            }else{
                $diasDelMes = $arrayMeses[$mesSeleccionado];
            }
            

        }
                
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


    echo "<select name=\"arrayMeses\">";
    foreach ($arrayMeses as $dato) {
        echo "<option value=\"\">".$dato."</option>";
    }
    echo "</select>";
*/



?>

<?php
    include "horoscopo_vista.php";
?>