<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horoscopo</title>
</head>

<body>



    <div>
        <form action="horoscopo.php" method="GET">
            <button type="submit" name="enviarMes">Seleccionar Dia</button>
            <button type="reset"><a href="horoscopo.php">Borrar</a></button>


            <select name="mes" id="mes">
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
            <?php
                    
                if (isset($_GET["enviarMes"])) {
                    $mesSeleccionado = $_REQUEST['mes'];
                    $conversor = $meses[$mesSeleccionado];
                    diasSelect($dias, "dias", $conversor);
                    echo $mesSeleccionado;
                }

            ?>
            <button type="submit" name="averiguarHoroscopo">¿Cual es Mi Horoscopo?</button>
        </form>
    </div>









</body>

</html>