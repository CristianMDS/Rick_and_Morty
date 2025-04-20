<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilosEditar.css">
    <script src="../js/tabla.js"></script>
    <title>Editar</title>
</head>
<body>
    <?php
    
    
        header('Access-Control-Allow-Origin: GET');
    
        require "../model/editarModel.php";

        if(isset($_GET["id"]) && $_GET["id"] !== ''){
            $id = $_GET["id"];

            $obj = new EditarDatosModel();
            $obj->editarDatos($id);
        }
    
    ?>
</body>
</html>