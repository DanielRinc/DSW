<?php
    function listaPro(){
        return 
        [
            [
                "id" => "cod_001", 
                "nombre" => "DRON Xiaomi Mi Drone", 
                "descripcion" => "Vendo Xiaomi Mi Drone por falta de uso. Su estado es impecable. 
                Se han efectuado pocos vuelos. No ha tenido ningún impacto ni golpe. 
                Incluye mando a distancia, batería con una autonomía de más de 30 min", 
                "precio" => "210", 
                "imagen" => "https://cdn.wallapop.com/images/10420/9y/6y/__/c10420p601627540/i1868314003.jpg?pictureSize=W640"
            ],

            [
                "id" => "cod_002", 
                "nombre" => "Drone para piezas", 
                "descripcion" => "Drone Tello.No funciona da error en el calibrado. 
                Se vende para PIEZAS, contiene: 8 aspas Mando inalámbrico uso bluetooth 2 baterias Cargador para 4 
                bateríasqa Se vende aparte funda también, revisa mi perfil.", 
                "precio" => "15", 
                "imagen" => "https://cdn.wallapop.com/images/10420/bn/e3/__/c10420p704416851/i2254718279.jpg?pictureSize=W640"
            ],

            [
                "id" => "cod_003", 
                "nombre" => "Dron nuveo 4k", 
                "descripcion" => "Dron con batería con autonomía de 25 minutos que fuciona mediante apliación para 
                tomar ftos y vídeos. Cuenta con fuselaje plegable, despegue con botón, aterrizaje con un botón, 
                vulve estacionario de altura fija, presión de aire de altura fija", 
                "precio" => "30", 
                "imagen" => "https://cdn.wallapop.com/images/10420/b2/iv/__/c10420p669367644/i2125611732.jpg?pictureSize=W640"
            ],

            [
                "id" => "cod_004", 
                "nombre" => "Dron Potensic P7 con cámara", 
                "descripcion" => "Dron sin usar en perfecto estado y en su caja original. NUEVO!!!!!!!", 
                "precio" => "36", 
                "imagen" => "https://cdn.wallapop.com/images/10420/aq/05/__/c10420p648339057/i2039971879.jpg?pictureSize=W640"
            ],

            [
                "id" => "cod_005", 
                "nombre" => "Dron Kestrel udi R/C", 
                "descripcion" => "No funciona correctamente. Desde el primer día consigue mover las hélices y todo pero es como 
                si se quedara sin fuerza y no eleva el vuelo. Se compro por 125€. Tiene cámara HD Wide angle.", 
                "precio" => "60", 
                "imagen" => "https://cdn.wallapop.com/images/10420/a5/o2/__/c10420p614182415/i1916127277.jpg?pictureSize=W640"
            ],

            [
                "id" => "cod_006", 
                "nombre" => "Parrot Dron Rolling Spider", 
                "descripcion" => "Parrot Dron Rolling Spider es un dron ultracompacto que se maneja desde un móvil. Vuela 
                en interior y exterior con una rapidez y estabilidad sorprendentes. Marca: Parrot Tipo: Dron Tipo 
                de controlador: Smartphone o Tablet.", 
                "precio" => "90", 
                "imagen" => "https://cdn.wallapop.com/images/10420/8l/yi/__/c10420p520612156/i1510933228.jpg?pictureSize=W640"
            ],

            [
                "id" => "cod_007", 
                "nombre" => "Dron Aibotix de Leica", 
                "descripcion" => "Se vende dron Aibotix de Leica. en perfecto estado prácticamente nuevo, muy pocos vuelos. Varios juegos de baterías. 
                Interesados hacer ofertas. Gracias.", 
                "precio" => "210", 
                "imagen" => "https://cdn.wallapop.com/images/10420/6p/91/__/c10420p405209273/i1035403159.jpg?pictureSize=W640"
            ],

            [
                "id" => "cod_008", 
                "nombre" => "Dron", 
                "descripcion" => "Vendo dron muy bueno con 2.4G", 
                "precio" => "85,99", 
                "imagen" => "https://cdn.wallapop.com/images/10420/at/od/__/c10420p654508021/i2064450542.jpg?pictureSize=W640"
            ]
        ];
    }
        
    function getProductos ($id) {
        $lista = listaPro();

        foreach ($lista as $key) {
            if ($key["id"] == $id) {
                return $key;
            }
        }
        return false;
    }

?>