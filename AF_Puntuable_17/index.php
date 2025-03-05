<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Recetas de Cocina</title>
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <header data-bs-theme="dark">
    <div class="text-bg-dark collapse" id="navbarHeader" style="">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4>Sobre este sitio web</h4>
            <p class="text-body-secondary">Sitio web donde se pretende insertar y filtrar recetas de cocina.
              Se incluyen entrantes, primeros platos, segundos platos y postres de todos tipos.</p>
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
            <h4>Administración</h4>
            <a class="btn btn-light" href="index.php?fichero=gestionar.php">Gestionar las recetas</a>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a href="index.php" class="navbar-brand d-flex align-items-center">
          <strong>Cocina</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader"
          aria-controls="navbarHeader" aria-expanded="true" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </header>

  <main class="main">
    <div class="capa_blanca pb-5">
      <?php
      
      $server = "localhost";
      $user = "root";
      $database = "cocina";

      $db = new PDO("mysql:host=$server;dbname=$database", $user);

      if (isset($_GET["fichero"])) {
        $fichero = $_GET["fichero"];

        /* Comparo cada enlace con los ficheros que tengo y muestro el que coincide */
        if ($fichero == "php/gestionar.php") {
          include "php/gestionar.php";
        } elseif ($fichero =="php/inicio.php") {
          include "php/inicio.php";
        }

      } else {
        include "php/inicio.php";
      }

      ?>
    </div>

  </main>

  <footer class="text-center py-3 bg-dark text-white">
    <p><i>2º DAW</i></p>
    <p><i>Desarrollo Web En Entorno Servidor</i></p>
    <p><i>Juan Fernández Herreros</i></p>
  </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>
