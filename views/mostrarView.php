<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/estilosTable.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <title>Personajes Guardados</title>
</head>
<body>
    <h1>PERSOANJES REGISTRADOS</h1>
    <h3>Rick and Morty</h3>
    <table id="miTabla" class="display">
        <thead>
            <tr>
                <th>ID PERSONAJE</th>
                <th>NOMBRE</th>
                <th>ESTADO</th>
                <th>ESPECIE</th>
                <th>TIPO</th>
                <th>GENERO</th>
                <th>ORIGEN</th>
                <th>LUGAR ACTUAL</th>
                <th>EDITAR</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                require_once "../model/mostrarModel.php";

                $obj = new MostrarDatosModel();
                print_r($obj->mostrarDatos());
            ?>
        </tbody>
    </table>
</body>
<script src="../js/tabla.js"></script>
</html>