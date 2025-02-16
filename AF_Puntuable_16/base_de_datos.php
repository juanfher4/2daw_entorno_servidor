<?php

$server = "localhost";
$user = "root";
$database = "Prueba";

function database_creada($server, $user, $database) {
          
    try {

      $db = new PDO("mysql:host=$server", $user);

      $stmt = $db->prepare("CREATE DATABASE IF NOT EXISTS $database;");
      $stmt->execute();

    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

}

function conectar_db($server, $user, $database) {
     
    try {

        $db = new PDO("mysql:host=$server;dbname=$database", $user);
        $stmt = $db->prepare("USE $database;");
        $stmt->execute();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    return $db;

}

function tablas_creadas($db) {

    try {

      $stmt = $db->prepare("CREATE TABLE IF NOT EXISTS prueba.S(
        Cod_prov VARCHAR(40) NOT NULL,
        Nombre VARCHAR(60), 
        edad INT,
        ciudad VARCHAR(50),
        status INT,
        CONSTRAINT S_PK PRIMARY KEY(Cod_prov)
       ) ENGINE= InnoDB;
            
        CREATE TABLE IF NOT EXISTS prueba.P(
        Cod_p VARCHAR(30) NOT NULL,
        Nombre VARCHAR(50),
        Color CHAR(20),
        Peso FLOAT,
        Ciudad VARCHAR(40),
        CONSTRAINT P_PK PRIMARY KEY (Cod_p)
        ) ENGINE= InnoDB;

        CREATE TABLE IF NOT EXISTS prueba.SP(
        Cod_prov VARCHAR(40) NOT NULL,
        Cod_p VARCHAR(30),
        Cantidad INT,
        CONSTRAINT SP_PK PRIMARY KEY(Cod_prov,Cod_p),
        CONSTRAINT SP_FK1 FOREIGN KEY (Cod_prov) REFERENCES prueba.S(Cod_prov),
        CONSTRAINT SP_FK2 FOREIGN KEY (Cod_p) REFERENCES prueba.P(Cod_p)
        ) ENGINE= InnoDB;");
      $stmt->execute();

    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

}


function datos_insertados_proveedores($db) {

    try {

        // Preparar tabla S
        $stmt = $db->prepare("INSERT IGNORE INTO prueba.S (Cod_prov,Nombre,edad,ciudad,status) VALUES (:Cod_prov,:Nombre,:edad,:ciudad,:status);");
        $stmt->bindParam(":Cod_prov", $cod_prov);
        $stmt->bindParam(":Nombre", $nombre);
        $stmt->bindParam(":edad", $edad);
        $stmt->bindParam(":ciudad", $ciudad);
        $stmt->bindParam(":status", $status);

        $cod_prov = "S1";
        $nombre = "Antonio";
        $edad = "30";
        $ciudad = "Almeria";
        $status = "20";
        $stmt->execute();

        $cod_prov = "S2";
        $nombre = "David";
        $edad = "40";
        $ciudad = "Granada";
        $status = "50";
        $stmt->execute();

        $cod_prov = "S3";
        $nombre = "Maria";
        $edad = "20";
        $ciudad = "Malaga";
        $status = "10";
        $stmt->execute();

        $cod_prov = "S4";
        $nombre = "Fernando";
        $edad = "18";
        $ciudad = "Jaen";
        $status = "10";
        $stmt->execute();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }

}

function datos_insertados_piezas($db) {

    try {

        // Preparar tabla P
        $stmt = $db->prepare("INSERT IGNORE INTO prueba.P (Cod_p,Nombre,Color,Peso,Ciudad) VALUES (:Cod_p,:Nombre,:Color,:Peso,:Ciudad);");
        $stmt->bindParam(":Cod_p", $cod_p);
        $stmt->bindParam(":Nombre", $nombre);
        $stmt->bindParam(":Color", $color);
        $stmt->bindParam(":Peso", $peso);
        $stmt->bindParam(":Ciudad", $ciudad);

        $cod_p = "P1";
        $nombre = "Tornillo";
        $color = "Rojo";
        $peso = 100;
        $ciudad = "Madrid";
        $stmt->execute();

        $cod_p = "P2";
        $nombre = "Arandella";
        $color = "Azul";
        $peso = 50.5;
        $ciudad = "Granada";
        $stmt->execute();

        $cod_p = "P3";
        $nombre = "Destornillador";
        $color = "Negro";
        $peso = 20.4;
        $ciudad = "Almeria";
        $stmt->execute();

        $cod_p = "P4";
        $nombre = "Llave";
        $color = "Blanca";
        $peso = 200;
        $ciudad = "Huelva";
        $stmt->execute();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}

function datos_insertados_proveedores_piezas($db) {

    try {

        // Preparar tabla P
        $stmt = $db->prepare("INSERT IGNORE INTO prueba.SP (Cod_prov,Cod_p,Cantidad) VALUES (:Cod_prov,:Cod_p,:Cantidad);");
        $stmt->bindParam(":Cod_prov", $cod_prov);
        $stmt->bindParam(":Cod_p", $cod_p);
        $stmt->bindParam(":Cantidad", $cantidad);

        $cod_prov = "S1";
        $cod_p = "P1";
        $cantidad = 300;
        $stmt->execute();

        $cod_prov = "S1";
        $cod_p = "P2";
        $cantidad = 100;
        $stmt->execute();

        $cod_prov = "S2";
        $cod_p = "P1";
        $cantidad = 200;
        $stmt->execute();

        $cod_prov = "S2";
        $cod_p = "P3";
        $cantidad = 500;
        $stmt->execute();

        $cod_prov = "S3";
        $cod_p = "P1";
        $cantidad = 50;
        $stmt->execute();

        $cod_prov = "S3";
        $cod_p = "P2";
        $cantidad = 700;
        $stmt->execute();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}


database_creada($server, $user, $database);
$db = conectar_db($server, $user, $database);
tablas_creadas($db);
datos_insertados_proveedores($db);
datos_insertados_piezas($db);
datos_insertados_proveedores_piezas($db);

?>
