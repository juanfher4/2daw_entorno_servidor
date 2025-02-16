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
    <form action="tabla.php" method="post">

      <label>Usuario:</label><br>
      <input type="text" name="nombre" class="form-control"><br>

      <label>Contraseña:</label><br>
      <input type="password" name="clave" class="form-control"><br>

      <input class="button" type="submit" name="valida" value="Mostrar datos">

    </form>
    <?php
    
      $server = "localhost";
      $user = "root";
      $database = "prueba";

      function tabla_usuarios_creada($server, $user, $database) {
        
        try {

          $db = new PDO("mysql:host=$server;dbname=$database", $user);

          $stmt = $db->prepare("CREATE TABLE IF NOT EXISTS $database.USUARIOS(
            Nombre CHAR(50) NOT NULL,
            Clave CHAR(60) NOT NULL,
            CONSTRAINT usuarios_PK PRIMARY KEY (Nombre)
          );");
          $stmt->execute();
          
          // Preparar
          $stmt = $db->prepare("INSERT IGNORE INTO usuarios (Nombre, Clave) VALUES (:Nombre, :Clave);");
          $stmt->bindParam(':Nombre', $nombre);
          $stmt->bindParam(':Clave', $clave);

          $nombre = "Juan";
          $clave = "my_password1";
          $stmt->execute();

          $nombre = "Clara";
          $clave = "my_password2";
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
          
          echo "</table>";

        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }

      }

      function validar_users($server, $user, $database) {                              // Función para mostrar la tabla

        try {

          if(isset($_POST["valida"])) {
            $nombre = $_POST["nombre"];
            $clave = $_POST["clave"];
            
            $db = new PDO("mysql:host=$server;dbname=$database", $user);

            $resultado_users = $db->query("SELECT * FROM usuarios");
            
              foreach($resultado_users as $valor) {
                
                if ($_POST['nombre'] != $valor[0] && $_POST["clave"] != $valor[1]){
                  echo "Error. Introduce de nuevo el usuario y la contraseña. ";
                  break; 
                }
              }

          }
        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }

      }

      tabla_usuarios_creada($server, $user, $database);
      validar_users($server, $user, $database);
      
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
