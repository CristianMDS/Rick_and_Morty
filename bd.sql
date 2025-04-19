DELETE TABLE rick_and_morty;
CREATE DATABASE rick_and_morty;

USE rick_and_morty;
CREATE TABLE characters_info(
    id INT AUTO_INCREMENT PRIMARY KEY,
    character_name VARCHAR(80) NOT NULL,
    character_status VARCHAR(10) NOT NULL,
    species VARCHAR(20) NOT NULL,
    character_type VARCHAR(60),
    gender VARCHAR(30) NOT NULL,
    origin_name VARCHAR(20),
    location_name VARCHAR(70),
    date_create DATE DEFAULT CURRENT_DATE,
    date_update TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO characters_info (name, status, species, type, gender, origin_name, location_name) 
VALUES (":nombre", ":estado", ":especie", ":tipo", ":genero", ":origin_name", ":location_name")