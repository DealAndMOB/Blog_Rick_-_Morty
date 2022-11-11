<?php
//mostrar personajes por episodio
function getCharacter($num) {
    $json = getJson( "https://rickandmortyapi.com/api/character/$num");
    echo "$json->name <br>";
    echo "$json->status <br>";
    echo "$json->species <br>";
    echo "$json->gender <br>";
    echo "<img src=$json->image> <br>";
    echo '<h1>Episodios en los que aparece el personaje</h1>';
    foreach ( $json->episode as $url ) {
        $jsons = getJson( $url );
        echo "$jsons->name <br>";
        echo "$jsons->air_date <br>";
        echo "$jsons->episode <br><br>";
    }
}

//mostrar personajes de episodios
function getCharacterEpisode($num) {
    $jsons = getJson( "https://rickandmortyapi.com/api/episode/$num" );
    echo "<div class='container text-center'>
     '<h1 style='color: white;' >Informacion del capitulo</h1>';
     <p style='color: white;'>Nombre: $jsons->name <br>
             Fecha: $jsons->air_date <br>
             Numero de episodio: $jsons->episode <br><br>
    </p>
     </div>";
     echo '<h1 style="color: white;" >Personajes que aparecen en el episodio</h1>';
    foreach ( $jsons->characters as $character ) {
        $json = getJson( $character );
            echo "<div class='col-md-2 col-sm-12 m-5 '>
                            <div class='card' style='width: 18rem; background: black; color: white;'>
                                <img src='$json->image' class='card-img-top'>
                                    <div class='card-body'>
                                        <h5 class=card-title>Nombre: $json->name</h5>
                                            <div class='Center' style='padding-top: 50px;'>
                                            <a href='detallesPersonajes.php?id=$json->id'><button id='Btn-Info'>Detalles</button></a>
                                            </div>
                                    </div>
                            </div> 
                    </div> <br>";

    }
}

//obtener caracter random
function getCharacterRandom() {
    $random = rand( 1, 826 );
    $json = getJson( "https://rickandmortyapi.com/api/character/$random" );
        echo "<div class='col-md-3 col-sm-12 m-5 '>
                            <div class='card' style='width: 18rem; background: black; color: white;'>
                                <img src='$json->image' class='card-img-top'>
                                    <div class='card-body'>
                                        <h5 class=card-title>Nombre: $json->name</h5>
                                            <div class='Center' style='padding-top: 50px;'>
                                            <a href='detallesPersonajes.php?id=$json->id'><button id='Btn-Info'>Detalles</button></a>
                                            </div>
                                    </div>
                            </div> 
                    </div> <br>";
}

//obtener todos los capitulos
function getAllEpisodes() {
    for ( $i = 1; $i <= 3; $i++ ) {
        $json = getJson( "https://rickandmortyapi.com/api/episode?page=$i" );
        foreach ( $json->results as $episode ) {
            echo
            "<div class='col-md-2 col-sm-12 m-5 '>
                            <div class='card m-2' style='width: 18rem; background: black; color: white;'>
                                <img src='./recursosBlog/fondoCapitulo.jpg' class='card-img-top'>
                                    <div class='card-body'>
                                            <h5 class=card-title>Nombre: $episode->name</h5>
                                            <p class='card-text'> 
                                                Capitulo: $episode->id <br>
                                                Fecha:  $episode->air_date <br> 
                                                Detalles: $episode->episode <br>
                                            </p>
                                            <div class='Center' style='padding-top: 50px;'>
                                            <a href='personajeCapitulos.php?id=$episode->id'><button id='Btn-Info'>Detalles</button></a>
                                            </div>
                                    </div>
                            </div> 
                    </div> <br>";

        }
    }
}


//obtener todos los personajes
function getAllCharacters() {
    for ( $i = 1; $i <= 42; $i++ ) {
        $json = getJson( "https://rickandmortyapi.com/api/character?page=$i" );
        foreach ( $json->results as $character ) {
            $name = $character->origin->name;
            echo "<div class='col-md-2 col-sm-12 m-5 '>
                            <div class='card' style='width: 18rem; background: black; color: white;'>
                                <img src='$character->image' class='card-img-top'>
                                    <div class='card-body'>
                                        <h5 class=card-title>Nombre: $character->name</h5>
                                            <div class='Center' style='padding-top: 50px;'>
                                            <a href='detallesPersonajes.php?id=$character->id'><button id='Btn-Info'>Detalles</button></a>
                                            </div>
                                    </div>
                            </div> 
                    </div> <br>";
        }
    }
}

function getJson( $url ) {
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, $url );
    curl_setopt( $ch, CURLOPT_HEADER, 0 );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, TRUE );
    $head = curl_exec( $ch );
    $json = json_decode( $head );
    return $json;
}
?>

