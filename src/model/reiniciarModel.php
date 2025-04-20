<?php


header('Access-Control-Allow-Origin: POST');

require "../../src/controller/reiniciarController.php";

class ReiniciarDatosModel{
    public function reiniciarDatos(){
        $obj = new ReiniciarDatosController();
        echo $obj->reiniciarDatosController();
    }   
}

if(isset($_POST["accion"]) && $_POST["accion"] == 'Ejecutar'){
    $obj = new ReiniciarDatosModel();
    $obj->reiniciarDatos();
}


?>