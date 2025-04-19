<?php

require "../controller/guardarController.php";
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');


class GuardarDatos{

    public function almacenarDatos(){
        $obj = new GuardarDatosController();
        $personajes = array();
        for($i = 1; $i <= 5; $i++){
            $file = file_get_contents("https://rickandmortyapi.com/api/character?page=$i");
            $json = json_decode($file, true);

            
            for($j = 0; $j < 20; $j++){
                $informacion = [
                    $json['results'][$j]['name'], 
                    $json['results'][$j]['status'],
                    $json['results'][$j]['species'],
                    $json['results'][$j]['type'],
                    $json['results'][$j]['gender'],
                    $json['results'][$j]['origin']['name'],
                    $json['results'][$j]['location']['name']
                ];
        
                array_push($personajes, $informacion);
            }
        }
        
        $obj->almacenarPersonajes($personajes);
    }

}

if($_POST["accion"] == "Ejecutar" && !empty($_POST["accion"])){
    $obj = new GuardarDatos();
    $response = $obj->almacenarDatos();

    echo $response;

}


?>