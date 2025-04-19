<?php

class Conexion{
    function conexion(){
        try {
            $pdo = new PDO('mysql: host=localhost; dbname=rick_and_morty', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $pdo;
        } catch (PDOException $e) {
            print_r("Error: ".$e->getMessage());
        }
    }
}

?>