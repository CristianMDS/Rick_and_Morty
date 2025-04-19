<?php

require_once "conexionController.php";

class GuardarDatosController{

    function almacenarPersonajes($personajes){

        $conn = new Conexion();
        $qry = $conn->conexion();

        $espacio = [];
        $valores = [];

        foreach($personajes as $p){
            $espacio[] = "(?,?,?,?,?,?,?)";
            $valores = array_merge($valores, $p);
        }

        $sql = "INSERT INTO characters_info (character_name, character_status, species, character_type, gender, origin_name, location_name) 
                    VALUES ".implode(", ", $espacio);

        $stmt = $qry->prepare($sql);

        return ($stmt->execute($valores)) ? json_encode("Creado") : json_encode("Error");

    }
}


?>