<?php

require "../../src/controller/mostrarController.php";

class MostrarDatosModel{
    public function mostrarDatos(){
        $obj = new MostrarDatosController();
        $obj->mostrarDatos();
    }
}


?>