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
      <h2>AF 15.2</h2>
    </header>
    <main>
    <?php
    
      $server = "localhost";
      $user = "root";
      $database = "prueba";

      function salida_tabla($server, $user, $database) {                              // Función para mostrar la tabla

        try {

          $db = new PDO("mysql:host=$server;dbname=$database", $user);

          echo "<table style='' align=center border='2'>";
          $campos=$db->query("show tables;");
          
          echo "<tr>";
          foreach($campos as $registro) {
            echo "<td>".$registro[0]."</td>";
          }
          echo "</tr>";
          
          echo "</table>";

        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }

      }

      function validar_users($server, $user, $database) {                              // Función para validar el usuario

        try {

          if(isset($_POST["valida"])) {
            $nombre = $_POST["nombre"];
            $clave = $_POST["clave"];
            
            $db = new PDO("mysql:host=$server;dbname=$database", $user);

            $resultado_users = $db->query("SELECT * FROM usuarios");
            
              foreach($resultado_users as $valor) {
                
                if ($_POST['nombre'] == $valor[0] && $_POST["clave"] == $valor[1] && $_POST['nombre'] != ""){
                    salida_tabla($server, $user, $database);
                } 

              }

          }
        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }

      }

      validar_users($server, $user, $database);
      
      // Cerrar sesiones
      $db = null;

    ?>
    <a class="button" href="index.php">Volver</a>
    </main>
    <footer>
      <p><i>2º DAW</i></p>
      <p><i>Desarrollo Web En Entorno Servidor</i></p>
      <p><i>Juan Fernández Herreros</i></p>
    </footer>
  </body>
</html>
