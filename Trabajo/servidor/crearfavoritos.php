<?php
    //pillo la ID del "formulario" 
    $id = $_GET["id"];
    $agregar = $_GET["agregar"];
    //establezco favjson, si esta vacio, creame un [] se puede entender como array o json, mas adelante explico porque, sino pon Cookie["favoritos"] **
    $favjson = isset($_COOKIE["favoritos"]) ?  $_COOKIE["favoritos"] : '{}';
    //el json favjson lo conviertes en un array
    $array = json_decode($favjson, true);
    //en el array metes el ID
    /*if ($agregar == "true") {
        array_push($array, $id);
    }
    else{
        if (in_array($id, $array)){ 
            $array = array_diff($array,[$id]); 
        }
    }*/
    if (in_array($id, $array) && $agregar == "false") {
        $post = array_search($id, $array);
        unset($array[$post]);
    }else{
        $array[] = $id;
    }
    
    // ** aqui CREAS la cookie COMO JSON, la primera vez no existira cookie, ergo siempre sera  [], por ello despues creas la cookie como JSON, con setcookie
    // le das el nombre, el valor de la cookie, que es un JSON del array(array) y la duracion
    //estas creando un JSON de un array que creaste en base a un JSON, un poco redundante, se puede meter el json_decode en el IF de arriba segun echedey para ahorrar codigo
    //si pones diferente nombre a "favoritos", al crear mas de una cookie sobreescribe la coockie creada, no almacena mas de un ID
    setcookie ("favoritos",json_encode($array), time() + 365*24*60*60, "/" );
    // no se exactamente why?
    header('Content-type: application/json');
    //aqui creas la respuesta en caso de que este todo correcto ¿?
    $respuesta = ["error" => "0", "descripcion" => "Favorito añadido"];
    //aqui muestras la respuesta
    echo json_encode($respuesta);

    if (empty($array)) {
        setcookie ("favoritos",false, time() -60, "/" );
    }
?>