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

    </header>
    <main>
        
      <?php
      
        $server = "localhost";
        $user = "root";
        $database = "prueba";

        function salida_tabla($server, $user, $database) {

          try {

            $db = new PDO("mysql:host=$server;dbname=$database", $user);

            echo "<table style='' align=center border='2'>";
            echo "<tr>";
            echo "<caption><b> TABLA 'PLANTAS'</b></caption>";
            echo "</tr>";
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

        // Preparar
        /* $stmt = $db->prepare("INSERT INTO plantas (Codplanta, Nombre, F_plantacion, N_ejemplares) VALUES (:Codplanta, :Nombre, :F_plantacion, :N_ejemplares)");
        $stmt->bindParam(':Codplanta', $cod_planta);
        $stmt->bindParam(':Nombre', $nombre);
        $stmt->bindParam(':F_plantacion', $f_plant);
        $stmt->bindParam(':N_ejemplares', $n_ejem);
        // Establecer parámetros y ejecutar
        $cod_planta = "P0001";
        $nombre = "Manzano";
        $f_plant = "2010-10-20";
        $n_ejem = 30;
        $stmt->execute();
        $cod_planta = "P0002";
        $nombre = "Peral";
        $f_plant = "2011-09-15";
        $n_ejem = 2;
        $stmt->execute();
        $cod_planta = "P0003";
        $nombre = "Algarrobo";
        $f_plant = "2005-07-01";
        $n_ejem = 3;
        
        echo "Se han creado las entradas exitosamente<br>";
        $stmt->execute(); */

        database_creada($server, $user, $database);
        tabla_plantas_creada($server, $user, $database);
        salida_tabla($server, $user, $database);
        
        // Cerrar sesiones
        $db = null;

      ?>

    </main>
    <footer>

    </footer>
  </body>
</html>
