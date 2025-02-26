<?php

$server = "localhost";
$user = "root";
$database = "cocina";

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

function tablas_creadas($db, $database) {

    try {

      $stmt = $db->prepare("CREATE TABLE IF NOT EXISTS $database.Receta(                # Tabla recetas
        cod_receta INT UNSIGNED NOT NULL,
        nombre VARCHAR(200) NOT NULL, 
        descripcion VARCHAR(250),
        foto VARCHAR(255) NOT NULL,
        pdf VARCHAR(255),
        tiempo VARCHAR(255),
        CONSTRAINT Receta_PK PRIMARY KEY(cod_receta)
       ) ENGINE= InnoDB;
            
        CREATE TABLE IF NOT EXISTS $database.Categoria(                                 # Tabla categorias
        cod_categoria INT UNSIGNED NOT NULL,
        nombre VARCHAR(200) NOT NULL,
        descripcion VARCHAR(250),
        CONSTRAINT Categoria_PK PRIMARY KEY (cod_categoria)
        ) ENGINE= InnoDB;

        CREATE TABLE IF NOT EXISTS $database.Pertenece(                                 # Tabla que une a las dos interiores
        cod_receta INT UNSIGNED NOT NULL,
        cod_categoria INT UNSIGNED NOT NULL,
        CONSTRAINT Pertenece_PK PRIMARY KEY(cod_receta,cod_categoria),
        CONSTRAINT Pertenece_FK1 FOREIGN KEY (cod_receta) REFERENCES $database.Receta(cod_receta),
        CONSTRAINT Pertenece_FK2 FOREIGN KEY (cod_categoria) REFERENCES $database.Categoria(cod_categoria)
        ) ENGINE= InnoDB;");
      $stmt->execute();

    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

}


function datos_insertados_proveedores($db, $database) {

    try {

        // Preparar tabla S
        $stmt = $db->prepare("INSERT IGNORE INTO $database.Receta (cod_receta,nombre,descripcion,foto,pdf,tiempo) VALUES (:cod_receta,:nombre,:descripcion,:foto,:pdf,:tiempo);");
        $stmt->bindParam(":cod_receta", $cod_receta);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":foto", $foto);
        $stmt->bindParam(":pdf", $pdf);
        $stmt->bindParam(":tiempo", $tiempo);

        $cod_receta = "R1";
        $nombre = "Salmorejo";
        $descripcion = "El salmorejo es una deliciosa crema espesa que se toma fría, que puede prepararse majando los ingredientes con paciencia en un mortero, o ayudados de una batidora o un robot de cocina, muy parecida a la porra antequerana y primo hermano del gazpacho, aunque éste debe ser más ligero y cambian algunos ingredientes.";
        $foto = "/img/salmorejo.jpg";
        $pdf = "20";
        $tiempo = "20";
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
tablas_creadas($db, $database);
datos_insertados_proveedores($db, $database);
datos_insertados_piezas($db, $database);
datos_insertados_proveedores_piezas($db, $database);

?>
