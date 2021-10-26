<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Formulario</title>
</head>
<body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            let municipios = [];

            $.getJSON("JSON/provincias.json", function (provincias) {
                $.each(provincias, function (indice, dato) {
                    $('#provincia2').append($('<option></option>').attr('value', dato.provincia_id).text(dato.nombre));
                })
            });

            $.getJSON("JSON/municipios.json", function (data) {
                municipios = data;
            });

            $("#provincia2").change(function () {
                $('#municipio2').empty();

                $.each(municipios, function (indice, dato) {
                    if ($("#provincia2").val() == dato.provincia_id) {
                        $('#municipio2').append($('<option></option>').attr('value', dato.municipio_id).text(dato.nombre));
                    }
                })
            })
        });

        $(document).ready(function () {
            let codigoPostal = [];

            $.getJSON("JSON/municipios.json", function (municipios) {
                $.each(provincias, function (indice, dato) {
                    $('#municipio2').append($('<option></option>').attr('value', dato.municipio_id).text(dato.nombre));
                })
            });

            $.getJSON("JSON/codigos_postales_municipios.json", function (data) {
                codigoPostal = data;
            });

            $("#municipio2").change(function () {
                $('#Codigo_Postal').empty();

                $.each(codigoPostal, function (indice, dato) {
                    if ($("#municipio2").val() == dato.municipio_id) {
                        $('#Codigo_Postal').append($('<option></option>').attr('value', dato.municipio_id).text(dato.codigo_postal));
                    }
                })
            })
        });


    </script>


    <div class="contorno">
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST" enctype="multipart/form-data">
            <div class="titulo">
                <p>SOLICITUD DE SEVICIOS</p>
                <button><b><a href="formularioServidor.php">reset</a></b></button>
                <input type="submit" name="Procesar" value="PROCESAR">
                <input type="reset" value="CANCELAR">
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
                        <option value="Seleccionar" selected>Seleccionar</option>
                        <option value="NIF">NIF</option>
                        <option value="NIE">NIE</option>
                    </select>
                </span>
                <span>
                    <label for="">Nº de identificacion: (*)</label> <br>
                    <input type="text" name="DNINum" id="nºidentificacion" value="<?= $NºIdentific ?>" placeholder="12345678Z " pattern="[0-9]{8}[A-Za-z]{1}" title="Debe poner 8 números y una letra" required/>
                </span>
                <span>
                    <label for="">Nombre (*)</label> <br>
                    <input type="text" name="DNIName" id="name" value="<?= $Nombre ?>" placeholder="JOSE" pattern="[A-Za-z]{3,10}" title="El nombre debe tener minimo 3 letras" required/>
                </span>
            </div>

            <div class="datosrepresentante dos">
                <span>
                    <label for="PrimerApellido"> Primer apellido: (*)</label> <br>
                    <input type="text" name="PrimerApellido" id="PrimerApellido" value="<?= $PrimerApellido ?>" placeholder="JESUS" pattern="[A-Za-z]{3,20}" title="El Apellido debe tener minimo 3 letras" required>
                </span>
                <span>
                    <label for="SegundoApellido">Segundo apellido: (*)</label> <br>
                    <input type="text" name="SegundoApellido" id="SegundoApellido" value="<?= $SegundoApellido ?>" placeholder="GARCIA" pattern="[A-Za-z]{3,20}" title="El Apellido debe tener minimo 3 letras" required>
                </span>
            </div>
            <div class="datosrepresentante tres">
                <span>
                    <label for="calidad">En calidad de: (*)</label> <br>
                    <select name="calidad" id="calidad" required>
                        <option value="" selected>-Seleccione-</option>
                        <option value="Guardador_de_hecho">Guardador de hecho</option>
                        <option value="patria_postestad">Patria potestad</option>
                        <option value="Representante_voluntario">Representante voluntario</option>
                        <option value="tutor_legal">Tutor o representante legal</option>
                    </select>
                </span>
                <span>
                    <label for="telf">Telefono fijo:</label> <br>
                    <input type="tel" name="telf" id="telefono" value="<?= $TelfFijo ?>" placeholder="922000000">
                </span>
                <span>
                    <label for="movil">Telefono movil:(*)</label> <br>
                    <input type="tel" name="movil" id="movil" value="<?= $TelfMovil ?>" placeholder="666000000">
                </span>
                <span>
                    <label for="">Correo Electronico (*)</label> <br>
                    <input type="email" name="Mail" id="Mail" value="<?= $Mail ?>" placeholder="nombre@ejemplo.com" required>
                </span>
            </div>
            <div class="titulos">
                <p>DOMICILIO DE CONTACTO</p>
            </div>
            <div class="domicilio uno">
                <span>
                    <label for="tipoVia">Tipo de via: (*)</label> <br>
                    <select name="tipoVia" id="tipoVia">
                        <option value="" selected>Seleccionar</option>
                        <option value="Avenida">Avenida</option>
                        <option value="Plaza">Plaza</option>
                        <option value="Calle">Calle</option>
                        <option value="Via">Via</option>
                    </select>
                </span>
                <span>
                    <label for="ViaName">Nombre de via: (*)</label> <br>
                    <input type="text" name="ViaName" id="nombredevia" value="" placeholder="Pintor Felo Mionzon">
                </span>
                <span>
                    <label for="NumeroVia">Numero: (*)</label> <br>
                    <input type="number" name="NumeroVia" id="NºVia" value="" placeholder="43">
                </span>
            </div>
            <div class="domicilio dos">
                <span>
                    <label for="Bloque">Bloque:</label> <br>
                    <input type="number" name="Bloque" id="Bloque" value="" placeholder="4">
                </span>
                <span>
                    <label for="Escalera">Escalera: </label> <br>
                    <input type="number" name="Escalera" id="Escalera" value="">
                </span>
                <span>
                    <label for="Piso">Piso: </label> <br>
                    <input type="number" name="Piso" id="Piso" value="" placeholder="1º">
                </span>
                <span>
                    <label for="Portal">Portal: </label> <br>
                    <input type="text" name="Portal" id="Portal" value="" placeholder="6">
                </span>
                <span>
                    <label for="Letra">Letra: </label> <br>
                    <input type="text" name="Letra" id="Letra" value="" placeholder="A">
                </span>
                <span>
                    <label for="Puerta">Puerta: </label> <br>
                    <input type="number" name="Puerta" id="Puerta" value="" placeholder="3">
                </span>
            </div>
            <div class="domicilio tres">
                <span>
                    <label for="Complemento">Complemento: </label> <br>
                    <input type="text" name="Complemento" id="Complemento" value="" placeholder="No se que va aqui">
                </span>
                <span>
                    <label for="Fecha">Fecha: </label> <br>
                    <input type="date" name="Fecha" id="Fecha" value="" placeholder="1/2/2021">
                </span>
                <span>
                    <label for="Pais">Pais: (*)</label> <br>
                    <select name="Pais" id="Pais">
                        <option value="Espana">España</option>
                    </select>
                </span>
                <span>
                    <label for="Provincia2">Provincia: (*)</label> <br>
                    <?php
                        // Provincias.
                        // {"provincia_id": "02", "nombre": "Albacete"}
                        echo "<select id='provincia2' name='provincia2'>";
                        echo "<option value=''>Seleccione provincia</option>";
                    /*
                        foreach ($provincias as $p) {
                            echo "<option value='{$p["provincia_id"]}'>".$p["nombre"]."</option>";
                        }*/
                        echo "</select>";
                    ?>
                </span>
            </div>
            <div class="domicilio cuatro">
                <span>
                    <label for="">Isla: (*)</label> <br>
                    <?php
                        // Provincias.
                        // {"provincia_id": "02", "nombre": "Albacete"}
                        echo "<select id='isla' name='isla'>";
                        echo "<option value=''>Seleccione Isla</option>";
                    
                        foreach ($islas as $p) {
                            echo "<option value='{$p["nombre"]}'>".$p["nombre"]."</option>";
                        }
                        echo "</select>";
                    ?>
                </span>
                <span>
                    <label for="municipio2">Municipio: (*)</label> <br>
                    <?php
                        // Municipios.
                        // {"municipio_id": "01051", "provincia_id": "01", "cmun": "051", "dc": "3", "nombre": "Agurain/Salvatierra"}
                        echo "<select id='municipio2' name='municipio2'>";
                        /*foreach ($municipios as $m) {
                            echo "<option>".$m["nombre"]."</option>";
                        }*/
                        echo "</select>";
                    ?>
                </span>
                <span>
                    <label for="Codigo_Postal">Codigo Postal: (*)</label> <br>
                    <select name="Codigo_Postal" id="Codigo_Postal">

                    </select>
                </span>
            </div>
            <div class="titulos">
                <p>MIS DATOS</p>
            </div>
            <div>
                <input type="checkbox" name="huerfano" id="huerfano" value="huerfano">
                <label for="">El alumno o alumna es huerfano absoluto</label>
            </div>
            <div>
                <input type="checkbox" name="tutela" id="tutela" value="tutela">
                <label for="">El alumno se encuentra en regimen de tutela y guarda por la Administracion</label>
            </div>
            <div class="titulos">
                <p>ALERGIAS, PATOLOGIAS O DIETAS ESPECIALES</p>
            </div>
            <div>
                <h3>OTRAS ALERGIAS</h3>
            </div>
            <div>
                <textarea name="Alergias" id="Alergias" cols="144" rows="8"></textarea>
            </div>
            <div class="titulos">
                <p>DATOS ACADEMICOS DEL ALUMNO o ALUMNA</p>
            </div>
            <div>
                <p><b>Seleccione opcion (Seleccionar 1)</b></p>

                <input type="radio" name="itinerario" id="salud" value="salud" checked >
                <label for="salud">ITINERARIO: CIENCIAS DE LA SALUD</label> <br>

                <input type="radio" name="itinerario" id="tecnologico" value="tecnologico" checked>
                <label for="salud">ITINERARIO: CIENTIFICO-TECNOLOGICO</label>
            </div>
            <div>
                <p><b>Bloque 1 (Seleccionar 6)(Macximo: 6) y ordenar por preferencia</b></p>

                <input type="checkbox" name="Lengua" id="Lengua" value="Lengua" checked disabled>
                <label for="Lengua">Lengua Castellana y Literatura I</label> <br>

                <input type="checkbox" name="Filosofia" id="Filosofia" value="Filosofia" checked disabled>
                <label for="Filosofia">Filosofia</label> <br>

                <input type="checkbox" name="Educacion_Fisica" id="Educacion_Fisica" value="Educacion_Fisica" disabled checked>
                <label for="Educacion_Fisica">Educacion Fisica</label> <br>

                <input type="checkbox" name="Matematicas" id="Matematicas" value="Matematicas" checked disabled>
                <label for="Matematicas">Matematicas I</label> <br>

                <input type="checkbox" name="Fisica" id="Fisica" value="Fisica" checked disabled>
                <label for="Fisica">Fisica y Quimica</label> <br>

                <input type="checkbox" name="Tutoria" id="Tutoria" value="Tutoria" checked disabled>
                <label for="Tutoria">Tutoria</label>
            </div>
            <div>
                <p><b>Bloque 2 (Seleccionar 1)</b></p>
                
                <input type="radio" name="extranjera" id="ingles" value="ingles" checked>
                <label for="extranjera">Primera lengua extranjera (Ingles) I</label> <br>

                <input type="radio" name="extranjera" id="italiano" value="italiano" checked>
                <label for="extranjera">Primera lengua extranjera (Italiano) I</label>
            </div>
            <div>
                <p><b>Bloque 3 (Seleccionar 1)</b></p>
                
                <input type="radio" name="opcionales" id="Biologia" value="Biologia" checked>
                <label for="opcionales">Biologia y Geologia</label> <br>

                <input type="radio" name="opcionales" id="Dibujo" value="Dibujo" checked>
                <label for="opcionales">Dibujo tecnico I</label>
            </div>
            <div>
                <p><b>Bloque 4 (Seleccionar 1)</b></p>

                <input type="radio" name="opcionales2" id="Tecnologia_Industrial" value="Tecnologia_Industrial" checked>
                <label for="opcionales2">Tecnologia Industrial I</label> <br>

                <input type="radio" name="opcionales2" id="Cultura_Cientifica" value="Cultura_Cientifica" checked>
                <label for="opcionales2">Cultura Cientifica</label> <br>

                <input type="radio" name="opcionales2" id="Segunda_lengua_ingles" value="Segunda_lengua_ingles" checked>
                <label for="opcionales2">Segunda lengua extranjera (Ingles)</label> <br>

                <input type="radio" name="opcionales2" id="Biologia_E" value="Biologia_E" checked>
                <label for="opcionales2">Biologia y Geologia (E)</label> <br>

                <input type="radio" name="opcionales2" id="Dibujo_E" value="Dibujo_E" checked>
                <label for="opcionales2">Dibujo Tecnico I (E)</label> <br>
            </div>
            <div>
                <p><b>Bloque 5 (Seleccionar 1)</b></p>
                
                <input type="radio" name="opcionales3" id="Catolica" value="Catolica" checked>
                <label for="opcionales3">Religion Catolica</label> <br>

                <input type="radio" name="opcionales3" id="comunacion" value="comunacion" checked>
                <label for="opcionales3">Tecnologias de la informacion y la comunacion I</label>
            </div>
            <div class="titulos">
                <p>MEDIOS DE DIFUSION</p>
            </div>
            <div>
                <p>
                    CONSENTIMIENTO INFORMADO TRATAMIENTO DE IMAGENES VOZ DEL ALUMNADO EN CENTROS DOCENTES DE TITULARIDAD 
                    PÚBLICA DE LA CONSEJERÍA DE EDUCACIÓN UNIVERSIDADES, CULTURA Y DEPORTES.
                </p>
                <p>
                    De acuerdo con el Reglamento General de Protección de Datos y la Ley Orgánica 3/2018, de 5 de diciembre, 
                    de Protección de Datos Personales y Garantias de los Derechos Digitales, mediante la firma del presente 
                    documento se presta voluntariamente el consentimiento inequivoco e informado y se autoriza expresamente 
                    al centro docente al "tratamiento de imagen / voz de actividades de los centros de titularidad pública", 
                    mediante los siguientes medios(sólo se entenderá que consiente la difusión de imágenes/ voz por los medios 
                    expresamente marcados a continuación.
                </p>
            </div>
            <div style="margin-top: 2em; margin-bottom: 2em;">
                <span>
                    <input type="radio" name="Consiente" id="aceptar" value="aceptar" checked>
                    <label for="Consiente">Consiente</label>
                </span>
                <span>
                    <input type="radio" name="Consiente" id="negar" value="negar" checked>
                    <label for="Consiente">No Consiente</label>
                </span>
            </div>
            <div>
                <label for="">Pagina web del centro docente</label>
                <span class="consentir">
                    <input type="radio" name="Consiente2" id="aceptar2" value="aceptar" checked>
                    <label for="Consiente">Consiente</label>
                </span>
                <span class="consentir">
                    <input type="radio" name="Consiente2" id="negar2" value="negar" checked>
                    <label for="Consiente">No Consiente</label>
                </span>
            </div>
            <div>
                <label for="">Apps de alumnos y familias</label>
                <span class="consentir">
                    <input type="radio" name="Consiente3" id="aceptar3" value="aceptar" checked>
                    <label for="Consiente">Consiente</label>
                </span>
                <span class="consentir">
                    <input type="radio" name="Consiente3" id="negar3" value="negar checked">
                    <label for="Consiente">No Consiente</label>
                </span>
            </div>
            <div>
                <label for="" style="margin-right: 8em;">Facebook</label>
                <span class="consentir">
                    <input type="radio" name="Consiente4" id="aceptar4" value="aceptar" checked>
                    <label for="Consiente">Consiente</label>
                </span>
                <span class="consentir">
                    <input type="radio" name="Consiente4" id="negar4" value="negar" checked>
                    <label for="Consiente">No Consiente</label>
                </span>
            </div>
            <div>
                <p>
                    El consentimiento aqui otorgado podrá ser revocado en cualquier momento
                    ante el propio centro docente, teniendo en cuenta que dicha revocación 
                    no surtirá efectos retroactivos.
                </p>
            </div>
            <div class="titulos">
                <p>Documentos Adjuntos</p>
            </div>
            <div class="aviso">
                <p>Aviso:</p>
                <li>Los formatos permitidos son <b>jpg, png, txt, odt, pdf, jpeg, doc, docx</b></li>
                <li>El tamaño maximo por fichero es de<b>10 MB</b></li>
                <li>El nombre de los ficheros no debe incluir caracteres acentuados, caracteres con diéresis, la eñe o caracteres</li>
            </div>
            <div class="tituloDocPendientes">
                <p>Lista de Documentos Pendientes</p>
            </div>
            <div>
                <label for="">Documento</label>
            </div>
            <div>
                <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                <span>Adjuntar Documento:</span>
                <input type="file" name="uploadedFile" />
            </div>
            <div class="titulo">
                <input type="submit" name="Procesar" value="PROCESAR">
                <input type="reset" value="CANCELAR">
            </div>
            
        </form>
        <script>
            
            document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('input[type=text]').forEach( node => node.addEventListener('keypress', e => {
                if(e.keyCode == 13) {
                e.preventDefault();
                }
            }))
            });
        </script>
    </div>
</body>
</html>