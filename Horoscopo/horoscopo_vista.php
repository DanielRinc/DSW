<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/responsive.css">
    <title>Horoscopo</title>
</head>

<body>
    <div class="contorno">
        <form action="horoscopo.php" method="GET">
            <div>
                <select name="mes" id="mes">
                    <option value= <?= $mesSeleccionado ?> selected ><?= $mesSeleccionado ?></option>
                    <option value="enero">enero</option>
                    <option value="febrero">febrero</option>
                    <option value="marzo">marzo</option>
                    <option value="abril">abril</option>
                    <option value="mayo">mayo</option>
                    <option value="junio">junio</option>
                    <option value="julio">julio</option>
                    <option value="agosto">agosto</option>
                    <option value="septiembre">septiembre</option>
                    <option value="octubre">octubre</option>
                    <option value="noviembre">noviembre</option>
                    <option value="diciembre">diciembre</option>
                </select>
            </div>
            <div class="botonesPrincipales">
                <button type="submit" name="enviarMes">Seleccionar Dia</button>
                <button type="reset"><a href="horoscopo.php">Borrar</a></button>
            </div>
            <div>
                <select name="dias" id="dias">
                    <option value="<?= $diaSeleccionado?>" selected disabled hidden><?= $diaSeleccionado?></option>
                    <?php
                        if (isset($_GET["mes"])) {
                            diasSelect2($dias, "dias", $diasDelMes);
                        }
                    ?>
                </select>
            </div>
            <div class="botonesSecundarios">
                <button type="submit" name="averiguarHoroscopo">¿Cual es Mi Horoscopo?</button>
            </div>
            <div>
                <?php
                        if (isset($_REQUEST['dias'])) {
                            $diaSeleccionado = $_REQUEST['dias'];
                            if (isset($_GET["averiguarHoroscopo"])) {
                                $conversor = $arrayMesesANumero[$mesSeleccionado];
                                $resultHoroscopo = calcularHoroscopo($conversor, $diaSeleccionado);
                            }
                        }
                        
                ?>
                <!--Aqui ira el Horoscopo calculado-->
                <!--en el value = <?php echo $result; ?>-->
                <label for="result">Resultado</label>
                <input type="text" name="result" value="<?php echo $resultHoroscopo = empty ($resultHoroscopo) ? "Aun no se ha seleccionado" : $resultHoroscopo; ?>">
            </div>
            
        </form>
    </div>









</body>

</html>