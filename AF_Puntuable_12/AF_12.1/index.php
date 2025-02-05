<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AF_12.1</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <header>
      <h1>AF 12.1</h1>
    </header>
    <main>
      <div id="morado">
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
              <input class="button b1" type="submit" value="Mostrar">
              <input class="button b2" type="reset" value="Borrar">
            </td>
          </tr>
        </table>
      </form>

      <?php
      
      if (isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["edad"]) && isset($_POST["nacimiento"]) && isset($_POST["email"]) && isset($_POST["tlf"])) {
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $edad = $_POST["edad"];
        $nacimiento = $_POST["nacimiento"];
        $email = $_POST["email"];
        $tlf = $_POST["tlf"];

        $file = "./miarchivo.txt";
        $usuario = "
        **********USUARIO*********
        NOMBRE: $nombre y $apellidos
        EDAD: $edad
        FECHA_NACIMIENTO: $nacimiento
        E-MAIL: $email
        TELEFONO: $tlf
        
        ";

        $fp = fopen($file, "a");
        fwrite($fp, $usuario);
        fclose($fp);

        print "<div class='derecha'>";

        $fp = fopen($file, "r");
        while (!feof($fp)) {
          $order = fgets($fp);
          print htmlspecialchars($order)."<br />";
        }
        fclose($fp);

        print "</div>";

      }
      
      ?>
</div>
    </main>
    <footer>
      <p><i>2º DAW</i></p>
      <p><i>Desarrollo Web En Entorno Servidor</i></p>
      <p><i>Juan Fernández Herreros</i></p>
    </footer>
  </body>
</html>
