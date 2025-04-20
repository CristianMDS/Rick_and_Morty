<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/css/estilosEditar.css">
    <script src="../../src/js/tabla.js"></script>
    <title>Editar</title>
</head>
<body>
    <?php
    
        require "../../src/model/editarModel.php";  
    
        header('Access-Control-Allow-Origin: GET');
        

        if(isset($_GET["id"]) && $_GET["id"] !== ''){
            $id = $_GET["id"];

            $obj = new EditarDatosModel();
            $obj->editarDatos($id);
        }
    
    ?>
</body>
</html>