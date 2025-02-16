<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <header>
      <h2>AF 15.1</h2>
    </header>
    <main>
    <form action="" method="post">

      <label>Código planta:</label><br>
      <input type="text" name="cod_planta" class="form-control" required><br>

      <label>Nombre:</label><br>
      <input type="text" name="nombre" class="form-control"><br>

      <label>Fecha de plantación:</label><br>
      <input type="date" name="f_plan" class="form-control"><br>

      <label>Número de ejemplares:</label><br>
      <input type="number" name="n_ejem" class="form-control"><br>
      
      <input class="button b1" type="submit" name="insertar" value="Insertar datos">
      <input class="button b2" type="submit" name="actualizar" value="Actualizar datos">

    </form>
    <?php
    
      $server = "localhost";
      $user = "root";
      $database = "prueba";

      function database_creada($server, $user, $database) {
          
        try {

          $db = new PDO("mysql:host=$server", $user);

          $stmt = $db->prepare("CREATE DATABASE IF NOT EXISTS $database;");
          $stmt->execute();

        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }

      }

      function tabla_plantas_creada($server, $user, $database) {
        
        try {

          $db = new PDO("mysql:host=$server;dbname=$database", $user);

          $stmt = $db->prepare("CREATE TABLE IF NOT EXISTS $database.PLANTAS(
            Codplanta CHAR(5) NOT NULL,
            Nombre VARCHAR(50),
            F_plantacion DATE,
            N_ejemplares INT,
            CONSTRAINT plantas_PK PRIMARY KEY (Codplanta)
          );");
          $stmt->execute();

        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }

      }

      function salida_tabla($server, $user, $database) {                              // Función para mostrar la tabla

        try {

          $db = new PDO("mysql:host=$server;dbname=$database", $user);

          echo "<table style='' align=center border='2'>";
          $campos=$db->query("show columns from plantas;");
          
          echo "<tr>";
          foreach($campos as $registro) {
            echo "<th>".$registro[0]."</th>";
          }
          echo "</tr>";
          
          $resultado = $db->query("SELECT * FROM plantas");
          while ($registro=$resultado->fetch(PDO::FETCH_ASSOC)) {
            
            echo "<tr>";
            foreach($registro as $valor) {
              echo "<td>",$valor,"</td>";
            }
            echo "<tr>";

          }

          echo "</table>";

        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }

      }

      function insertar($server, $user, $database) {                                  // Función para insertar filas

        try {

          $db = new PDO("mysql:host=$server;dbname=$database", $user);

          if (isset($_POST["insertar"])) {
            $cod_planta = $_POST["cod_planta"];
            $nombre = $_POST["nombre"];
            $f_plant = $_POST["f_plan"];
            $n_ejem = $_POST["n_ejem"];

            if (isset($_POST["cod_planta"])) {

              if (empty($nombre)) {
                $nombre = null;
              } else {
                $nombre;
              }
              if (empty($f_plant)) {
                $f_plant = null;
              } else {
                $f_plant;
              }
              if (empty($n_ejem)) {
                $n_ejem = null;
              } else {
                $n_ejem;
              }

            }
            
            // Preparar
            $stmt = $db->prepare("INSERT INTO plantas (Codplanta, Nombre, F_plantacion, N_ejemplares) VALUES (:Codplanta, :Nombre, :F_plantacion, :N_ejemplares)");
            $stmt->bindParam(':Codplanta', $cod_planta);
            $stmt->bindParam(':Nombre', $nombre);
            $stmt->bindParam(':F_plantacion', $f_plant);
            $stmt->bindParam(':N_ejemplares', $n_ejem);
            $stmt->execute();
            echo "Se han creado las entradas exitosamente";
  
          }

        } catch (PDOException $e) {
          echo "<p class='mensaje'>Error, el código de planta que has introducido ya existe.</p>";
        }

      }

      function actualizar($server, $user, $database) {                                  // Función para actualizar filas

        try {

          $db = new PDO("mysql:host=$server;dbname=$database", $user);

          if (isset($_POST["actualizar"])) {

            $cod_planta = $_POST["cod_planta"];
            $nombre = $_POST["nombre"];
            $f_plant = $_POST["f_plan"];
            $n_ejem = $_POST["n_ejem"];

            if (isset($_POST["cod_planta"])) {

              if (empty($nombre)) {
                $nombre = null;
              } else {
                $nombre = $nombre;
              }
              if (empty($f_plant)) {
                $f_plant = null;
              } else {
                $f_plant = $f_plant;
              }
              if (empty($n_ejem)) {
                $n_ejem = null;
              } else {
                $n_ejem;
              }

            }

            // Preparar
            $stmt = $db->prepare("UPDATE plantas SET Nombre = :Nombre, F_plantacion = :F_plantacion, N_ejemplares = :N_ejemplares WHERE Codplanta = :Codplanta");
            $stmt->bindParam(':Codplanta', $cod_planta);
            $stmt->bindParam(':Nombre', $nombre);
            $stmt->bindParam(':F_plantacion', $f_plant);
            $stmt->bindParam(':N_ejemplares', $n_ejem);
            $stmt->execute();
            echo "<p class='mensaje'>Se han actualizado las entradas exitosamente</p>";
          }

        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }

      }

      database_creada($server, $user, $database);
      tabla_plantas_creada($server, $user, $database);
      insertar($server, $user, $database);
      actualizar($server, $user, $database);
      salida_tabla($server, $user, $database);
      
      // Cerrar sesiones
      $db = null;

    ?>
    </main>
    <footer>
      <p><i>2º DAW</i></p>
      <p><i>Desarrollo Web En Entorno Servidor</i></p>
      <p><i>Juan Fernández Herreros</i></p>
    </footer>
  </body>
</html>
