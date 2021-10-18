<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        .contorno{
            margin: 10%;
        }
        .titulo{
            text-align: center;
            color: #01a2e2;
            font-size: 26px;
            font-weight: bold;
        }
        .titulos{
            background-color: #519dc1
        }
        .titulos P{
            color: whitesmoke;
            font-weight: bold;
            margin-left: 1%;
        }
        .representante p{
            font-weight: bold;
        }
        .datosrepresentante.uno select{
            width: 10em;
        }
        .datosrepresentante #nºidentificacion{
            width: 14em;
        }
        .datosrepresentante.uno span input{
            width: 20em;
        }
        .datosrepresentante span{
            display: inline-block;
            margin-right: 2em;
            max-width: 30em;
        }
        span{
            display: inline-block;
            margin-right: 2em;
            max-width: 30em;
        }
        .datosrepresentante.dos span{
            width: 23.5em;
            margin-top: 1em;
            margin-bottom: 1em;
        }
        .datosrepresentante.dos input{
            width: 27.5em;
        }
        .datosrepresentante.dos span:nth-child(even){
            margin-right: 0;
        }
        #nombredevia{
            width: 27.5em;
        }
        .domicilio.dos input{
            width: 8em;
        }
        .domicilio.cuatro select{
            min-width: 10em;
        }
    </style>
</head>
<body>
    <div class="contorno">
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
            <div class="titulo">
                <p>SOLICITUD DE SEVICIOS</p>
                <button><a href="formularioServidor.php">Reset</a></button>
                <input type="submit" value="PROCESAR">
            </div>
            <div class="titulos">
                <p>DATOS ACTUA COMO REPRESENTANTE</p>
            </div>
            <div class="representante">
                <p>¿Actua como Representante?</p>
                <input type="radio" name="representante" id="repAlumno" value="Alumno/a"><label for="">Alumno/a</label>
                <input type="radio" name="representante" id="repRepresentante" value="Representante"><label for="">Representante</label>
            </div>
            <div class="titulos">
                <p>DATOS DEL REPRESENTANTE</p>
            </div>
            <div class="datosrepresentante uno">
                <span>
                    <label for="TipoDocumento">Tipo de docmento(*)</label> <br>
                    <select name="TipoDocumento" id="TipoDNI">
                        <option value="Seleccionar" selected disabled>Seleccionar</option>
                        <option value="NIF">NIF</option>
                        <option value="NIE">NIE</option>
                    </select>
                </span>
                <span>
                    <label for="">Nº de identificacion: (*)</label> <br>
                    <input type="text" name="DNINum" id="nºidentificacion" value="" placeholder="Ej: 12345678Z / Z12345677X" required>
                </span>
                <span>
                    <label for="">Nombre (*)</label> <br>
                    <input type="text" name="DNIName" id="name" value="Ej: 12345678Z / Z12345677X">
                </span>
            </div>

            <div class="datosrepresentante dos">
                <span>
                    <label for=""> Primer apellido: (*)</label> <br>
                    <input type="text" name="" id="" value="JESUS">
                </span>
                <span>
                    <label for="">Segundo apellido: (*)</label> <br>
                    <input type="text" name="" id="" value="GARCIA">
                </span>
            </div>
            <div class="datosrepresentante tres">
                <span>
                    <label for="">En calidad de: (*)</label> <br>
                    <select name="" id="">
                        <option value="">Representante</option>
                        <option value="">Alumno/a</option>
                    </select>
                </span>
                <span>
                    <label for="">Telefono fijo:</label> <br>
                    <input type="tel" name="" id="" value="922000000">
                </span>
                <span>
                    <label for="">Telefono movil:(*)</label> <br>
                    <input type="tel" name="" id="" value="666000000">
                </span>
                <span>
                    <label for="">Correo Electronico (*)</label> <br>
                    <input type="email" name="" id="" value="nombre@ejemplo.com">
                </span>
            </div>
            <div class="titulos">
                <p>DOMICILIO DE CONTACTO</p>
            </div>
            <div class="domicilio uno">
                <span>
                    <label for="">Tipo de via: (*)</label> <br>
                    <select name="" id="">
                        <option value="">--Avenida--</option>
                        <option value=""></option>
                    </select>
                </span>
                <span>
                    <label for="">Nombre de via: (*)</label> <br>
                    <input type="text" name="" id="nombredevia" value="Pintor Felo Mionzon">
                </span>
                <span>
                    <label for="">Numero: (*)</label> <br>
                    <input type="text" name="" id="" value="43">
                </span>
            </div>
            <div class="domicilio dos">
                <span>
                    <label for="">Bloque:</label> <br>
                    <input type="text" name="" id="" value="4">
                </span>
                <span>
                    <label for="">Escalera: </label> <br>
                    <input type="text" name="" id="" value="">
                </span>
                <span>
                    <label for="">Piso: </label> <br>
                    <input type="text" name="" id="" value="1º">
                </span>
                <span>
                    <label for="">Portal: </label> <br>
                    <input type="text" name="" id="">
                </span>
                <span>
                    <label for="">Letra: </label> <br>
                    <input type="text" name="" id="">
                </span>
                <span>
                    <label for="">Puerta: </label> <br>
                    <input type="text" name="" id="" value="3">
                </span>
            </div>
            <div class="domicilio tres">
                <span>
                    <label for="">Complemento: </label> <br>
                    <input type="text" name="" id="">
                </span>
                <span>
                    <label for="">Fecha: </label> <br>
                    <input type="date" name="" id="" value="1/2/2021">
                </span>
                <span>
                    <label for="">Pais: (*)</label> <br>
                    <select name="" id="">
                        <option value="">España</option>
                        <option value=""></option>
                    </select>
                </span>
                <span>
                    <label for="">Provincia: (*)</label> <br>
                    <select name="" id="">
                        <option value="">Las Palmas</option>
                        <option value=""></option>
                    </select>
                </span>
            </div>
            <div class="domicilio cuatro">
                <span>
                    <label for="">Isla: (*)</label> <br>
                    <select name="" id="">
                        <option value="">GRAN CANARIA</option>
                        <option value=""></option>
                    </select>
                </span>
                <span>
                    <label for="">Municipio: (*)</label> <br>
                    <select name="" id="">
                        <option value="">LAS PALMAS DE GRAN CANARIA</option>
                        <option value=""></option>
                    </select>
                </span>
                <span>
                    <label for="">Localidad: (*)</label> <br>
                    <select name="" id="">
                        <option value="">LAS PALMAS DE GRAN CANARIA</option>
                        <option value=""></option>
                    </select>
                </span>
                <span>
                    <label for="">Codigo Postal: (*)</label> <br>
                    <select name="" id="">
                        <option value="">35019</option>
                        <option value=""></option>
                    </select>
                </span>
            </div>
            <div class="titulos">
                <p>MIS DATOS</p>
            </div>
            <div>
                <input type="checkbox" name="" id="">
                <label for="">El alumno o alumna es huerfano absoluto</label>
            </div>
            <div>
                <input type="checkbox" name="" id="">
                <label for="">El alumno se encuentra en regimen de tutela y guarda por la Administracion</label>
            </div>
            <div class="titulos">
                <p>ALERGIAS, PATOLOGIAS O DIETAS ESPECIALES</p>
            </div>
            <div>
                <h3>OTRAS ALERGIAS</h3>
            </div>
            <div>
                <textarea name="" id="" cols="145" rows="8"></textarea>
            </div>
            <div class="titulos">
                <p>DATOS ACADEMICOS DEL ALUMNO o ALUMNA</p>
            </div>
            <div>
                1
            </div>
            <div>
                2
            </div>
            <div>
                3
            </div>
            <div>
                4
            </div>
            <div>
                5
            </div>
            <div>
                6
            </div>
            <div class="titulos">
                <p>MEDIOS DE DIFUSION</p>
            </div>
            <div>
                <p>
                    ivhsdibsdihbdisbvsdbvisdvacdsvbsdivbvbjdsvsdbjvsdbivsdijvbsivbisdvisdbvidsbivsdbivjdsbjvsdbjivsdivbsdiv
                </p>
                <p>
                    HSAFASHBFIASBCIS CJQICHBQSIHCBHCHSBCIHSQVCHSCBHCBDIJCBDWHVBDWIHCWD VBCDBCIWBVIDBVHBIVJWBVIHBDIBDH
                </p>
                <p>
                    fdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd
                </p>
            </div>
            <div>
                <span>
                    <input type="radio" name="" id=""><label for="">Consiente</label>
                </span>
                <span>
                    <input type="radio" name="" id=""><label for="">No Consiente</label>
                </span>
            </div>
            <div>
                <label for="">Pagina web del centro docente</label>
            </div>
            <div>
                <label for="">Apps de alumnos y familias</label>
            </div>
            <div>
                <label for="">Facebook</label>
            </div>
            <div>
                <p>
                    djgbdsidojvbiwbvdjwbvifbvuidsbdifbdwibwbviwbhvbdwijvbwdhvbwdbvidwbvijwdbvhdwbvibibwdvwbvwhjv
                </p>
            </div>
            <div class="titulos">
                <p>Documentos Adjuntos</p>
            </div>
            <div>
                <p>Aviso:</p>
                <li>Los formatos permitidos son h sd dbdhvsjvsdhvshvhsdcvsv</li>
                <li>El tamaño maximo por fichero es hdsbvshvhsd</li>
                <li>El nombre de lso sahcbajcahcbicbebcjebjcb</li>
            </div>
            <div class="tituloDocPendientes">
                <p>Lista de Documentos Pendientes</p>
            </div>
            <div>
                <label for="">Documento</label>
            </div>
            <div>
                <label for="">DNI del alumno o alumna asbfuasbfasdubvd</label>
            </div>
            <div>
                <label for="">Para el alumno procenceucfbsknesjfgbfasifdsfbdkfddd</label>
            </div>
            <div>
                <input type="submit" value="PROCESAR">
                <input type="reset" value="CANCELAR">
            </div>
        </form>
    </div>
</body>
</html>