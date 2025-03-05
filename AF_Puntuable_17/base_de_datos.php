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


function datos_insertados_recetas($db, $database) {

    try {

        // Preparar tabla Receta
        $stmt = $db->prepare("INSERT IGNORE INTO $database.Receta (cod_receta,nombre,descripcion,foto,pdf,tiempo) VALUES (:cod_receta,:nombre,:descripcion,:foto,:pdf,:tiempo);");

        $stmt->execute();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }

}

function datos_insertados_categorias($db, $database) {

    try {

        // Preparar tabla Categoría
        $stmt = $db->prepare("INSERT IGNORE INTO $database.Categoria (cod_categoria,nombre,descripcion) VALUES (:cod_categoria,:nombre,:descripcion);");

        $stmt->execute();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}

function datos_insertados_recetas_categorias($db, $database) {

    try {

        // Preparar tabla Pertenece
        $stmt = $db->prepare("INSERT IGNORE INTO $database.Pertenece (cod_receta,cod_categoria) VALUES (:cod_receta,:cod_categoria);");

        $stmt->execute();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}


database_creada($server, $user, $database);
$db = conectar_db($server, $user, $database);
tablas_creadas($db, $database);
datos_insertados_recetas($db, $database);
datos_insertados_categorias($db, $database);
datos_insertados_recetas_categorias($db, $database);

?>
