<?php

require_once "../controller/editarController.php";

class EditarDatosModel{
    public function editarDatos($id){
        $obj = new EditarDatosController($id);
        $obj->editarDatosController();
    }
}

?>