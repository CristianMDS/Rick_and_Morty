<?php

require_once "../../src/controller/editarController.php";

class EditarDatosModel{
    public function editarDatos($id){
        $obj = new EditarDatosController($id);
        $obj->editarDatosController();
    }
}

?>