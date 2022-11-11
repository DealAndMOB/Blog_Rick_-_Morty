<?php
require('Metodos.php');
require('header.php');

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $character = getJson("https://rickandmortyapi.com/api/character/$id");
    $name = $character->origin->name;
            echo "<div class='container col-3 mt-5'>
                            <div class='card' style='width: 18rem; background: black; color: white;'>
                                <img src='$character->image' class='card-img-top'>
                                    <div class='card-body'>
                                        <h5 class=card-title>Nombre: $character->name</h5>
                                                    <p class='card-text'> 
                                                        ID Character: $character->id <br>
                                                        Status:  $character->status <br> 
                                                        Specie: $character->species <br>
                                                        Gender: $character->gender <br>
                                                        Type: $character->type <br>
                                                        Origin: $name <br>
                                                    </p>
                                    </div>
                            </div> 
                    </div> <br>";
                    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="shortcut icon" href="./recursosBlog/favicon_blog.png" type="image/x-icon">
    <link rel="stylesheet" href="estiloBoton.css">
    <title>blog</title>
</head>
<body>
<div class='container-fluid'>
    <br><br><br>
        <div class='row align-content-center text-center'>
            <?php
            echo "<h1 style='color: white;'>Personajes Aleatorios</h1>";
                for($i = 1; $i <= 3; $i++){
                    echo getCharacterRandom();
                }
            ?>
        </div>  
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
