<?php

require_once "../controller/actualizarController.php";

header('Access-Control-Allow-Origin: POST');

class ActualizarDatosModel{

    public function actualizarDatos($id, $nombre, $estado, $especie, $tipo, $genero, $origen, $ubicacion){
        $arr = [$id, $nombre, $estado, $especie, $tipo, $genero, $origen, $ubicacion];
        $obj = new ActualizarDatosController();
        $obj->actualizarDatosController($arr);

        echo "<script>
            window.opener.location.reload();
            window.close();
        </script>";
    }
}

if(isset($_POST["character_name"], $_POST["character_status"], $_POST["species"], $_POST["character_type"], $_POST["gender"], $_POST["origin_name"], $_POST["location_name"], $_POST["id"])){
    $obj = new ActualizarDatosModel();
    $obj->actualizarDatos($_POST["id"], $_POST["character_name"], $_POST["character_status"], $_POST["species"], $_POST["character_type"], $_POST["gender"], $_POST["origin_name"], $_POST["location_name"]);
}


?>