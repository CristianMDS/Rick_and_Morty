<?php

require "conexionController.php";

class ReiniciarDatosController{
    public function reiniciarDatosController(){
        $conn = new Conexion();
        $qry = $conn->conexion();

        $stmt = $qry->prepare("TRUNCATE TABLE characters_info");

        if($stmt->execute())
            echo json_encode("Eliminada");
        else
            echo json_encode("Error");

    }
}


?>