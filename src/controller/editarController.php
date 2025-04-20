<?php

require_once "conexionController.php";

class EditarDatosController{
    protected $id;

    public function __construct($id) {
        $this->id = $id;
    }

    public function editarDatosController(){
        $id = $this->id;
        $conn = new Conexion();
        $qry = $conn->conexion();

        $sql = "SELECT * FROM characters_info WHERE id = :id";

        $stmt = $qry->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $html = "";
        foreach($stmt->fetchAll() as $dato){
            $html .= "<h1>Editar a ".$dato['character_name']."</h1><form method='POST' action='../../src/model/actualizarModel.php'>";
                $html .= "<label for='character_name'>Nombre del Personaje: </label>
                            <input type='text' name='character_name' value='".$dato["character_name"]."' />";
                $html .= "<label for='character_status'>Estado del Personaje: </label>
                            <input type='text' name='character_status' value='".$dato["character_status"]."' />";
                $html .= "<label for='species'>Especie del Personaje: </label>
                            <input type='text' name='species' value='".$dato["species"]."' />";
                $html .= "<label for='character_type'>Tipo de Personaje: </label>
                            <input type='text' name='character_type' value=".$dato["character_type"]." />";
                $html .= "<label for='gender'>Genero del Personaje: </label>
                            <input type='text' name='gender' value='".$dato["gender"]."' />";
                $html .= "<label for='origin_name'>Origen del Personaje: </label>
                            <input type='text' name='origin_name' value='".$dato["origin_name"]."' />";
                $html .= "<label for='location_name'>Ubicacion del Personaje: </label>
                            <input type='text' name='location_name' value='".$dato["location_name"]."' />";
                $html .= "<input type='hidden' name='id' value='".$id."' />";
                $html .= "<button type='submit'>Editar</button>";
            $html .= "</form>";
        }

        echo $html;
    }
}




?>