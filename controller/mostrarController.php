<?php

require_once "conexionController.php";

class MostrarDatosController{
    public function mostrarDatos(){
        $conn = new Conexion();
        $qry = $conn->conexion();

        $sql = "SELECT * FROM characters_info";

        $stmt = $qry->prepare($sql);
        if($stmt->execute()){
            $datos = $stmt->fetchAll();
            $html = "";
            foreach ($datos as $data) {
                $html .= "<tr>";
                    $html .= "<td>".$data["id"]."</td>";
                    $html .= "<td>".$data["character_name"]."</td>";
                    $html .= "<td>".$data["character_status"]."</td>";
                    $html .= "<td>".$data["species"]."</td>";
                    $html .= "<td>".$data["character_type"]."</td>";
                    $html .= "<td>".$data["gender"]."</td>";
                    $html .= "<td>".$data["origin_name"]."</td>";
                    $html .= "<td>".$data["location_name"]."</td>";
                    $html .= "<td><button id='".$data['id']."' class='edit'> Editar </button></td>";
                $html .= "</tr>";
            }
        }
        echo $html;
    }
}


?>