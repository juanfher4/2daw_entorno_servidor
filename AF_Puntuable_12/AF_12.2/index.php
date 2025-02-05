<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AF_12.2</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <header>
      <h2>AF 12.2</h2>
    </header>
    <main>
      <div id="fondo_verde">
        <form action="" method="post">
          <table>
            <tr>
              <td>
                <input class="btn b1" type="submit" name="registro" value="REGISTRO">
                <input class="btn b2" type="submit" name="mostrar" value="MOSTRAR USUARIOS">
                <input class="btn b3" type="submit" name="reiniciar" value="REINICIAR">
              </td>
            </tr>
          </table>
        </form>
        <div id="borde_verde">
        <?php

          $file = "./miarchivo.txt";

          function num_usuarios($file) {
            $cont = 0;
            if (file_exists($file)) {
              $fp = fopen($file, "r");
              while (($fila = fgets($fp)) !== false) { #fgets: Va linea por linea, si llega al final del archivo devuelve false.
                if (strpos($fila, "**********USUARIO") !== false) { #Si encuentra "**********USUARIO" devuelve true
                  $cont++;
                }
              }
              fclose($fp);
            }
            return $cont;
          }

          if (isset($_POST["reiniciar"])) {
            if (file_exists($file)) {
              unlink($file); // Borra lo que hay en el txt
              print "Archivo borrado";
            } else {
              print "No se encontró el archivo para borrar";
            }
          } else if (isset($_POST["registro"])) {
            $registro = $_POST["registro"];
            
            print '
            <form action="" method="post">
              <table>
                <tr>
                  <td><span>Nombre: </span></td>
                  <td><input type="text" name="nombre" required></td>
                </tr>
                <tr>
                  <td><span>Apellidos: </span></td>
                  <td><input type="text" name="apellidos" required></td>
                </tr>
                <tr>
                  <td><span>Edad: </span></td>
                  <td><input type="number" name="edad" required></td>
                </tr>
                <tr>
                  <td><span>Fecha de nacimiento: </span></td>
                  <td><input type="date" name="nacimiento" required></td>
                </tr>
                <tr>
                  <td><span>E-mail: </span></td>
                  <td><input type="email" name="email" required></td>
                </tr>
                <tr>
                  <td><span>Tlf: </span></td>
                  <td><input type="number" name="tlf" required></td>
                </tr>
                <tr>
                  <td>
                    <input class="button b1" type="submit" value="Registrar">
                    <input class="button b2" type="reset" value="Borrar">
                  </td>
                </tr>
              </table>
            </form>
            ';
            

          } else if (isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["edad"]) && isset($_POST["nacimiento"]) && isset($_POST["email"]) && isset($_POST["tlf"])) {
              $nombre = $_POST["nombre"];
              $apellidos = $_POST["apellidos"];
              $edad = $_POST["edad"];
              $nacimiento = $_POST["nacimiento"];
              $email = $_POST["email"];
              $tlf = $_POST["tlf"];

              $usuario_registrado = false;
              #compruebo si existe el archivo
              if (file_exists($file)) {
                #lo leo
                $emails = file($file);
                foreach ($emails as $mail) {
                  if (strpos($mail, "E-MAIL: $email") !== false) {
                    $usuario_registrado = true;
                    break;
                  }
                }
              }

              if ($usuario_registrado) {
                print "Usuario ya registrado";
              } else {

                #cuento los usuarios
                $cont_usuarios = num_usuarios($file) + 1;
                #añado un valor
                $cont = str_pad($cont_usuarios, 2, " ", STR_PAD_LEFT);

                print"Número de usuarios registrados: $cont";

                $usuario = "

                **********USUARIO$cont*********
                NOMBRE: $nombre $apellidos
                EDAD: $edad
                FECHA_NACIMIENTO: $nacimiento
                E-MAIL: $email
                TELEFONO: $tlf
                ";

                $fp = fopen($file, "a");
                fwrite($fp, $usuario);
                fclose($fp);
  
                $fp = fopen($file, "r");
                while (!feof($fp)) {
                  $order = fgets($fp);
                  print htmlspecialchars($order)."<br />";
                }
                fclose($fp);
  
              }

            } else if (isset($_POST["mostrar"])) {
              $mostrar = $_POST["mostrar"];

              if (file_exists($file)) {

                $cont = num_usuarios($file);
                #muestro la cantidad de usuarios que hay registradoss
                print"Número de usuarios registrados: $cont";

                $fp = fopen($file, "r");
                while (!feof($fp)) {
                  $order = fgets($fp);
                  print htmlspecialchars($order)."<br />";
                }
                fclose($fp);
              } else {
                $fp2 = fopen($file, "a");
                $fp = fopen($file, "r");
              }

            }
          
        ?>
        </div>
      </div>
    </main>
    <footer>
      <p><i>2º DAW</i></p>
      <p><i>Desarrollo Web En Entorno Servidor</i></p>
      <p><i>Juan Fernández Herreros</i></p>
    </footer>
  </body>
</html>
