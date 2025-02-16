<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <header>
        <h1>OPERACIONES SOBRE BASES DE DATOS</h1>
        <nav class="nav_principal">
            <a href="index.php?fichero=inicio.html">Inicio</a>
            <a href="index.php?fichero=consultar.php">Consultar</a>
            <a href="index.php?fichero=insertar.php">Insertar</a>
            <a href="index.php?fichero=modificar.php">Modificar</a>
            <a href="index.php?fichero=borrar_registros.php">Borrar registros</a>
            <a href="index.php?fichero=borrar_tabla.php">Borrar tabla</a>
            <a href="index.php?fichero=ejecutar_sql.php">Ejecutar SQL</a>
            <a href="index.php?fichero=consultas_predefinidas.php">Consultas Predefinidas</a>
        </nav>
    </header>
    <main>
        <div class="barra_lateral">
            <h2>OPCIONES</h2>
            <ul class="barra_lateral_nav">
                <li><a href="index.php?fichero=inicio.html">Inicio</a></li>
                <li><a href="index.php?fichero=consultar.php">Consultar</a></li>
                <li><a href="index.php?fichero=insertar.php">Insertar</a></li>
                <li><a href="index.php?fichero=modificar.php">Modificar</a></li>
                <li><a href="index.php?fichero=borrar_registros.php">Borrar registros</a></li>
                <li><a href="index.php?fichero=borrar_tabla.php">Borrar tabla</a></li>
                <li><a href="index.php?fichero=ejecutar_sql.php">Ejecutar SQL</a></li>
                <li><a href="index.php?fichero=consultas_predefinidas.php">Consultas Predefinidas</a></li>
                <li><a href="index.php?fichero=base_de_datos.php">Crear base de datos</a></li>
            </ul>
        </div>
        <div class="cont">
            <?php
              
              $server = "localhost";
              $user = "root";
              $database = "Prueba";

              $db = new PDO("mysql:host=$server;dbname=$database", $user);

              if (isset($_GET["fichero"])) {
                $fichero = $_GET["fichero"];
                
                /* Comparo cada enlace con los ficheros que tengo y muestro el que coincide */
                if ($fichero == "consultar.php") {
                  include "php/consultar.php";
                } elseif ($fichero == "insertar.php") {
                  include "php/insertar.php";
                } elseif ($fichero == "modificar.php") {
                  include "php/modificar.php";
                } elseif ($fichero == "borrar_registros.php") {
                  include "php/borrar_registros.php";
                } elseif ($fichero == "borrar_tabla.php") {
                  include "php/borrar_tabla.php";
                } elseif ($fichero == "ejecutar_sql.php") {
                  include "php/ejecutar_sql.php";
                } elseif ($fichero == "consultas_predefinidas.php") {
                  include "php/consultas_predefinidas.php";
                } elseif ($fichero == "base_de_datos.php") {
                  include "base_de_datos.php";  /* Creo la base de datos si no está ya creada y me conecto a la misma */
                  include "inicio.html";
                } else {
                  include "inicio.html";
                }

              } else {
                include "inicio.html";
              }
            
            ?>
        </div>
    </main>
    <footer>
        <p>Daw Abdera</p>
        <i>jferher@g.educaand.es</i>
    </footer>
  </body>
</html>
