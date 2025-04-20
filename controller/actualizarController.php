<?php

require_once "conexionController.php";

class ActualizarDatosController{
    public function actualizarDatosController($datos){
        $conn = new Conexion();
        $qry = $conn->conexion();

        $sql = "UPDATE characters_info SET character_name = :nombre, character_status = :estado, species = :especie, 
                    character_type = :tipo, gender = :genero, origin_name = :origen, location_name = :ubicacion 
                WHERE id = :id";

        $stmt = $qry->prepare($sql);

        if($stmt->execute([
            ":id" => $datos[0],
            ":nombre" => $datos[1],
            ":estado" => $datos[2],
            ":especie" => $datos[3],
            ":tipo" => $datos[4],
            ":genero" => $datos[5],
            ":origen" => $datos[6],
            ":ubicacion" => $datos[7]
        ]))
            echo "actualizado";

        
    }
}

?>