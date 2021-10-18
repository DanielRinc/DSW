<?php
    print_r($_POST);

    //crear las variables
    $representante = empty($_REQUEST['representante']) ? "0" : $_REQUEST['representante'];
    $DocNacIdent = empty($_REQUEST['TipoDocumento']) ? "0" : $_REQUEST['TipoDocumento'];
    $NºIdentific = empty($_REQUEST['DNINum']) ? "0" : $_REQUEST['DNINum'];
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo $representante."<br>";
    echo $DocNacIdent."<br>";
    echo $NºIdentific."<br>";
?>
<?php
    include "formulario.php";
?>