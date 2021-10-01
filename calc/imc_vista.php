<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/responsive.css">
    <title>IMC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <div class="contorno">
        <form action="imc.php" method="GET">
            <div>
                <label for="peso">Peso</label>
                <input type="text" name="peso" value="<?= $peso ?>">
            </div>
    
            <div>
                <label for="altura">Altura</label>
                <input type="text" name="altura" value="<?= $altura ?>">
            </div>
    
            <div>
                IMC: <?php echo $imc;  ?>
            </div>
            <div>
                Descripcion: <?php echo $descripcion; ?>
            </div>
    
            <button type="submit" name="calcular">Calular</button>

            <button type="reset"><strong><a href="imc.php" style="color: blue;">Borrar</a></strong></button>
        </form>
    </div>
    
</body>

</html>