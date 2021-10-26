<?php
    //print_r($_POST);
    //Declarar las variables-------------------------------------
    $errores = "";
    $directorioSubida = "DOCUMENTOS/";
    $max_file_size = "10000000"; // Tamaño en bytes.
    $extensionesValidas = array("jpg", "png", "txt", "odt", "pdf", "jpeg", "doc", "docx");
    $provincias = json_decode(file_get_contents("JSON/provincias.json"), true);
    $municipios = json_decode(file_get_contents("JSON/municipios.json"), true);
    $islas = json_decode(file_get_contents("JSON/islas.json"), true);
    
    
    $representante = empty($_REQUEST['representante']) ? "Not_exist" : $_REQUEST['representante'];
    $DocNacIdent = empty($_REQUEST['TipoDocumento']) ? "Not_exist" : $_REQUEST['TipoDocumento'];
    $NºIdentific = empty($_REQUEST['DNINum']) ? "" : $_REQUEST['DNINum'];
    $Nombre = empty($_REQUEST['DNIName']) ? "" : $_REQUEST['DNIName'];
    $PrimerApellido = empty($_REQUEST['PrimerApellido']) ? "" : $_REQUEST['PrimerApellido'];
    $SegundoApellido = empty($_REQUEST['SegundoApellido']) ? "" : $_REQUEST['SegundoApellido'];

    $calidad = empty($_REQUEST['calidad']) ? "Not_exist" : $_REQUEST['calidad'];

    $TelfFijo = empty($_REQUEST['telf']) ? "" : $_REQUEST['telf'];
    $TelfMovil = empty($_REQUEST['movil']) ? "" : $_REQUEST['movil'];
    $Mail = empty($_REQUEST['Mail']) ? "" : $_REQUEST['Mail'];

    $TipoVia = empty($_REQUEST['tipoVia']) ? "Not_exist" : $_REQUEST['tipoVia'];
    $NombreVia = empty($_REQUEST['ViaName']) ? "Not_exist" : $_REQUEST['ViaName'];
    $NumeroVia = empty($_REQUEST['NumeroVia']) ? "Not_exist" : $_REQUEST['NumeroVia'];
    $Bloque = empty($_REQUEST['Bloque']) ? "Not_exist" : $_REQUEST['Bloque'];
    $Escalera = empty($_REQUEST['Escalera']) ? "Not_exist" : $_REQUEST['Escalera'];
    $Piso = empty($_REQUEST['Piso']) ? "Not_exist" : $_REQUEST['Piso'];
    $Portal = empty($_REQUEST['Portal']) ? "Not_exist" : $_REQUEST['Portal'];
    $Letra = empty($_REQUEST['Letra']) ? "Not_exist" : $_REQUEST['Letra'];
    $Puerta = empty($_REQUEST['Puerta']) ? "Not_exist" : $_REQUEST['Puerta'];
    $Fecha = empty($_REQUEST['Fecha']) ? "Not_exist" : $_REQUEST['Fecha'];
    $Pais = empty($_REQUEST['Pais']) ? "Not_exist" : $_REQUEST['Pais'];

    $provincias2 = empty($_REQUEST['provincia2']) ? "Not_exist" : $_REQUEST['provincia2'];
    $municipios2 = empty($_REQUEST['municipio2']) ? "Not_exist" : $_REQUEST['municipio2'];
    $isla = empty($_REQUEST['isla']) ? "Not_exist" : $_REQUEST['isla'];

    $Huerfano = empty($_REQUEST['huerfano']) ? "Not_exist" : $_REQUEST['huerfano'];
    $Tutelado = empty($_REQUEST['tutela']) ? "Not_exist" : $_REQUEST['tutela'];
    $Otros = empty($_REQUEST['Alergias']) ? "Not_exist" : $_REQUEST['Alergias'];

    $Itinerario = empty($_REQUEST['Alergias']) ? "Not_exist" : $_REQUEST['Alergias'];
    



    //funciones
    function dni($dni){
        if ($dni == "") {
            $dni = "1234567";
        }
        $letra = substr($dni, -1);
        $numeros = substr($dni, 0, -1);
        $valido = true;
        if ( is_numeric($numeros) ) {
            if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
                $valido = true;
            }else{
                $valido = false;
            }
        }else {
            $valido = false;
        }
        return $valido;
        
    }

    function comprobar_nombre_usuario($nombre_usuario){
        //compruebo que el tamaño del string sea válido.
        if (strlen($nombre_usuario)<3 || strlen($nombre_usuario)>20){
           //echo $nombre_usuario . " no es válido<br>";
           return false;
        }
     
        //compruebo que los caracteres sean los permitidos
        $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        for ($i=0; $i<strlen($nombre_usuario); $i++){
           if (strpos($permitidos, substr($nombre_usuario,$i,1))===false){
              //echo $nombre_usuario . " no es válido<br>";
              return false;
           }
        }
        //echo $nombre_usuario . " es válido<br>";
        return true;
    }
       
    function validarTelefono($numero){
        $reg = "#^\(?\d{2}\)?[\s\.-]?\d{4}[\s\.-]?\d{4}$#";
        return preg_match($reg, $numero);
    }

    function comprobar_nombre_via($nombre_via){
        //compruebo que el tamaño del string sea válido.
        if (strlen($nombre_via)<3 || strlen($nombre_via)>25){
           //echo $nombre_via . " no es válido<br>";
           return false;
        }
     
        //compruebo que los caracteres sean los permitidos
        $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ";
        for ($i=0; $i<strlen($nombre_via); $i++){
           if (strpos($permitidos, substr($nombre_via,$i,1))===false){
              //echo $nombre_via . " no es válido<br>";
              return false;
           }
        }
        //echo $nombre_unombre_viasuario . " es válido<br>";
        return true;
    }


    function comprobar_portal($portal){
        //compruebo que el tamaño del string sea válido.
        if (strlen($portal)<1 || strlen($portal)>1){
           //echo $portal . " no es válido<br>";
           return false;
        }
     
        //compruebo que los caracteres sean los permitidos
        $permitidos = "123456789";
        for ($i=0; $i<strlen($portal); $i++){
           if (strpos($permitidos, substr($portal,$i,1))===false){
              //echo $portal . " no es válido<br>";
              return false;
           }
        }
        //echo $portal . " es válido<br>";
        return true;
    }

    function comprobar_letra($portal){
        //compruebo que el tamaño del string sea válido.
        if (strlen($portal)<1 || strlen($portal)>1){
           //echo $portal . " no es válido<br>";
           return false;
        }
     
        //compruebo que los caracteres sean los permitidos
        $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        for ($i=0; $i<strlen($portal); $i++){
           if (strpos($permitidos, substr($portal,$i,1))===false){
              //echo $portal . " no es válido<br>";
              return false;
           }
        }
        //echo $portal . " es válido<br>";
        return true;
    }


    function validateDate($date, $format = 'Y-m-d'){
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    function comprobar_puerta($puerta){
        //compruebo que el tamaño del string sea válido.
        if (strlen($puerta)<0 || strlen($puerta)>1){
           //echo $puerta . " no es válido<br>";
           return false;
        }
     
        //compruebo que los caracteres sean los permitidos
        $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        for ($i=0; $i<strlen($puerta); $i++){
           if (strpos($permitidos, substr($puerta,$i,1))===false){
              //echo $puerta . " no es válido<br>";
              return false;
           }
        }
        //echo $puerta . " es válido<br>";
        return true;
    }
    
    //crear array asociativo con los valores
    
    $valores = ["DNI" => $NºIdentific,
                "Tipo" => $DocNacIdent,
                "Nombre" => $Nombre,
                "1Apellido" => $PrimerApellido,
                "2Apellido" => $SegundoApellido,
                "Telefono_Fijo" => $TelfFijo,
                "Movil" => $TelfMovil,
                "Correo_Electronico" => $Mail,
                "Representante" => $representante,

                "Provincia" => $provincias2,
                "Municipio" => $municipios2,
                "Isla" => $isla,

                "Nombre_Via" => $NombreVia,
                "N_Via" => $NumeroVia,
                "N_Bloque" => $Bloque,
                "N_Escalera" => $Escalera,
                "N_Piso" => $Piso,
                "N_Portal" => $Portal,
                "Letra" => $Letra,
                "Puerta" => $Puerta,
                "Fecha" => $Fecha,
                "Huerfano" => $Huerfano,
                "Tutelado_Administracion" => $Tutelado,
                "Alergias_otros" => $Otros
    ];
    
    //validacion de los campos
    try{
        if ( isset($_POST["Procesar"]) && $representante == "Representante" || isset($_POST["Procesar"]) && $representante == "Alumno/a") {
        }else if (isset($_POST["Procesar"])) {
            //throw new Exception("Debe identificarse como Representante o Alumno/a");
            $errores = " Debe identificarse como Representante o Alumno/a ";
            $errores .= "------------------------------------------------------------------------------";
        }

        if ( isset($_POST["Procesar"]) && $DocNacIdent == "NIF" || isset($_POST["Procesar"]) && $DocNacIdent == "NIE") {
        }elseif ( isset($_POST["Procesar"]) ) {
            $errores .= " Debe seleccionar el tipo de Documento ";
            $errores .= "------------------------------------------------------------------------------";
        }

        if ( isset($_POST["Procesar"]) /*&& is_numeric( substr($NºIdentific, 0, -1) ) */) {
            if (dni($NºIdentific) == false) {
                $errores .= " Introduce un DNI valido ";
                $errores .= "------------------------------------------------------------------------------";
            }
        }/*elseif(isset($_POST["Procesar"])){
            $errores .= " Introduce un DNI valido ";
        }*/
        
        if ( isset($_POST["Procesar"]) ) {
            if (comprobar_nombre_usuario($Nombre) == false) {
                $errores .= " Introduce un Nombre valido ";
                $errores .= "------------------------------------------------------------------------------";
            }
        }

        if ( isset($_POST["Procesar"]) ) {
            if (comprobar_nombre_usuario($PrimerApellido) == false) {
                $errores .= " Introduce un Apellido valido ";
                $errores .= "------------------------------------------------------------------------------";
            }
        }

        if ( isset($_POST["Procesar"]) ) {
            if (comprobar_nombre_usuario($SegundoApellido) == false) {
                $errores .= " Introduce un Segundo Apellido valido ";
                $errores .= "------------------------------------------------------------------------------";
            }
        }

        if ( isset($_POST["Procesar"]) && ( $calidad == "Guardador_de_hecho" || $calidad == "patria_postestad" 
        || $calidad == "Representante_voluntario" || $calidad == "tutor_legal" ) ) {
        }elseif ( isset($_POST["Procesar"]) ) {
            $errores .= " Debe seleccionar en Calidad de ";
            $errores .= "------------------------------------------------------------------------------";
        }


        if ( isset($_POST["Procesar"]) ) {
            if (!validarTelefono($TelfFijo)) {
                $errores .= " Debe introducir un TELEFONO Valido ";
                $errores .= "------------------------------------------------------------------------------";
            }
        }

        if ( isset($_POST["Procesar"]) ) {
            if (!validarTelefono($TelfMovil)) {
                $errores .= " Debe introducir un MOVIL Valido ";
                $errores .= "------------------------------------------------------------------------------";
            }
        }

        if ( isset($_POST["Procesar"]) ) {
            if (!filter_var($Mail, FILTER_VALIDATE_EMAIL)) {
                $errores .= " Debe introducir un MAIL Valido ";
                $errores .= "------------------------------------------------------------------------------";
            }
        }
        
        if ( isset($_POST["Procesar"]) && ( $TipoVia == "Avenida" || $TipoVia == "Plaza" 
        || $TipoVia == "Calle" || $TipoVia == "Via" ) ) {
        }elseif ( isset($_POST["Procesar"]) ) {
            $errores .= " Debe seleccionar un Tipo de Via ";
            $errores .= "------------------------------------------------------------------------------";
        }
        
        if ( isset($_POST["Procesar"]) ) {
            if ( comprobar_nombre_via($NombreVia) == false ) {
                $errores .= " Introduce un Nombre de Via valido ";
                $errores .= "------------------------------------------------------------------------------";
            }
        }

        if ( isset($_POST["Procesar"]) && ($NumeroVia < 0 || !is_numeric($NumeroVia) ) ){
            //throw new Exception("El valor Introducido en Bloque debe ser un numero mayor a 0");
            $errores .= " El valor Introducido en Numero debe ser mayor a 0.  ";
            $errores .= "------------------------------------------------------------------------------";
        }
        
        if ( isset($_POST["Procesar"]) && ($Bloque < 0 || !is_numeric($Bloque) ) ){
            //throw new Exception("El valor Introducido en Bloque debe ser un numero mayor a 0");
            $errores .= " El valor Introducido en Bloque debe ser un numero mayor a 0.  ";
            $errores .= "------------------------------------------------------------------------------";
        }

        if ( isset($_POST["Procesar"]) && ($Escalera < 0 || !is_numeric($Escalera) ) ){
            //throw new Exception("El valor Introducido en Bloque debe ser un numero mayor a 0");
            $errores .= " El valor Introducido en Escalera debe ser un numero mayor a 0.  ";
            $errores .= "------------------------------------------------------------------------------";
        }

        if ( isset($_POST["Procesar"]) && ($Piso < 0 || !is_numeric($Piso) ) ){
            //throw new Exception("El valor Introducido en Bloque debe ser un numero mayor a 0");
            $errores .= " El valor Introducido en Piso debe ser un numero mayor a 0.  ";
            $errores .= "------------------------------------------------------------------------------";
        }

        if ( isset($_POST["Procesar"]) ) {
            if ( comprobar_portal($Portal) == false ) {
                $errores .= " Introduce un Portal valido ";
                $errores .= "------------------------------------------------------------------------------";
            }
        }

        if ( isset($_POST["Procesar"]) ) {
            if ( comprobar_letra($Letra) == false ) {
                $errores .= " Introduce una Letra valida ";
                $errores .= "------------------------------------------------------------------------------";
            }
        }

        if ( isset($_POST["Procesar"]) && ($Puerta < 0 || !is_numeric($Puerta) || $Puerta > 10)  ){
            //throw new Exception("El valor Introducido en Bloque debe ser un numero mayor a 0");
            $errores .= " El valor Introducido en Puerta debe ser entre 0 y 10.  ";
            $errores .= "------------------------------------------------------------------------------";
        }

        if ( isset($_POST["Procesar"]) ) {
            if ( validateDate($Fecha) == false ) {
                $errores .= " Introduce una Fecha valida ";
                $errores .= "------------------------------------------------------------------------------";
            }
        }

        if ( isset($_POST["Procesar"]) ) {
            if ( $Pais !== "Espana") {
                $errores .= " Introduce un Pais valido ";
                $errores .= "------------------------------------------------------------------------------";
            }
        }


        if ( isset($_POST["Procesar"]) ) {
            /*$i=0;
            foreach ($provincias as $key) {
                if ( $provincias2 == $key["nombre"]) {
                    $i++;
                }
            }
            if ($i < 1) {
                $errores .= " Introduce una Provincia valida ";
                $errores .= "------------------------------------------------------------------------------";
            }*/
            if ($provincias2 < 1 || $provincias2 > 52) {
                $errores .= " Introduce una Provincia valida ";
                $errores .= "------------------------------------------------------------------------------";
            }
        }

        if ( isset($_POST["Procesar"]) ) {
            $i=0;
            foreach ($islas as $key) {
                if ( $isla == $key["nombre"]) {
                    $i++;
                }
            }
            if ($i < 1) {
                $errores .= " Introduce una Isla valida ";
                $errores .= "------------------------------------------------------------------------------";
            }
        }


        //subida de archivo------------------------------------------------
/*
        $dir_subida = 'DOCUMENTOS/';
        $fichero_subido = $dir_subida . basename($_FILES['uploadedFile']['name']);

        echo '<pre>';
        if (move_uploaded_file($_FILES['uploadedFile']['tmp_name'], $fichero_subido)) {
            echo "El fichero es válido y se subió con éxito.\n";
        } else {
            echo "¡Posible ataque de subida de ficheros!\n";
        }

        echo 'Más información de depuración:';
        print_r($_FILES);

        print "</pre>";
*/

        

        if(isset($_POST["Procesar"]) && isset($_FILES['uploadedFile'])){
            $err = array();
            $nombreArchivo = $_FILES['uploadedFile']['name'];
            $filesize = $_FILES['uploadedFile']['size'];
            $directorioTemp = $_FILES['uploadedFile']['tmp_name'];
            $tipoArchivo = $_FILES['uploadedFile']['type'];
            $arrayArchivo = pathinfo($nombreArchivo);
            $extension = $arrayArchivo['extension'];
            // Comprobamos la extensión del archivo
            if(!in_array($extension, $extensionesValidas)){
                $err[] = "La extensión del archivo no es válida o no se ha subido ningún archivo";
                $errores .= " Introduce una extension valida ";
                $errores .= "------------------------------------------------------------------------------";
            }
            // Comprobamos el tamaño del archivo
            if($filesize > $max_file_size){
                $err[] = "el Fichero debe de tener un tamaño inferior a 10 MB";
                $errores .= " el Fichero debe de tener un tamaño inferior a 10 MB ";
                $errores .= "------------------------------------------------------------------------------";
            }
            // Comprobamos y renombramos el nombre del archivo
            $nombreArchivo = $arrayArchivo['filename'];
            $nombreArchivo = preg_replace("/[^A-Z0-9._-]/i", "_", $nombreArchivo);
            $nombreArchivo = $NºIdentific ."-". $nombreArchivo;


            
            if ($errores !== "") {
                throw new Exception($errores);
            }
            // Desplazamos el archivo si no hay errores
            if(empty($err)){
                $nombreCompleto = $directorioSubida.$nombreArchivo.".".$extension;
                move_uploaded_file($directorioTemp, $nombreCompleto);
                //echo "El archivo se ha subido correctamente";
                
            }
        } 


        //Convertir array en archivo JSON usando el DNI como nombre
        if (isset($_POST["DNINum"])) {
            // encode array to json
            $json = json_encode(array('0' => $valores));
            //write json to file
            if (file_exists("JSON/data.json")){

                $tempArray  = json_decode(file_get_contents("JSON/data.json"), true);

                array_push($tempArray, $valores);

                $jsonData = json_encode($tempArray);
                file_put_contents("JSON/data.json", $jsonData);
                echo "<script>alert('Su solicitud se ha procesado correctamente')</script>";

            }else {
                if (file_put_contents("JSON/data.json", $json)) {
                    echo "<script>alert('Su solicitud se ha procesado correctamente')</script>";
                }else
                    echo "Oops! Error creating json file...";
            } 
        }
    } catch(Exception $e){
        errores($e);
    }


    function errores($e){
        echo "<script>alert('".$e->getMessage()."')</script>";
        //echo "<p> <input type='hidden' name='mostrarErrores' id='mostrarErrores' autofocus> <ul>".$e->getMessage()."</ul></p>";
    }
    

?>
<?php
    include "formulario.php";
?>