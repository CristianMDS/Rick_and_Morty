<?php

require_once "../controller/mostrarController.php";

class MostrarDatosModel{
    public function mostrarDatos(){
        $obj = new MostrarDatosController();
        return $obj->mostrarDatos();
    }
}


?>