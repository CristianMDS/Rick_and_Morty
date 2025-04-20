<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/css/estilos.css">
    <title>Detalle</title>
</head>
<body>
    <?php

        $id = trim($_GET["id"]);
        $file = file_get_contents("https://rickandmortyapi.com/api/character/$id");
        $json = json_decode($file, true);
                
        echo "

            <div class='card'>
                <img src='".$json['image']."' alt='".$json["name"]."'>
                <h3>".$json["name"]."</h3>
                <p>".$json["type"]."</p>
                <p>".$json["gender"]."</p>
                <div class='origen'>
                    <p>".$json["origin"]["name"]."</p>
                    <p>".$json["origin"]["url"]."</p>
                </div>
            </div>

        ";

    ?>
</body>
</html>
