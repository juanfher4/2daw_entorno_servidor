<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AF No Puntuable</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <header>
      <h1>AF1 No Puntuable</h1>
      <p>Pedir al usuario a través de un formulario que introduzca un número entero.</p>
      <p>A continuación rellenar una matriz unidimensional de 30 posiciones con los 30 números que van desde el número introducido por el usuario en adelante.</p>
    </header>
    <main>
      <form action="" method="post">
          <table>
              <tr>
                  <span>Introduce un número entero: </span>
                  <input type="number" name="num1" value="" size=15 required>
              </tr>
              <tr>
                  <input class="button b1" type="submit" value="Mostrar">
                  <input class="button b2" type="reset" value="Borrar">
              </tr>
          </table>
      </form>

      <?php

        if (isset($_POST["num1"])) {
          $num1 = $_POST["num1"];
          
          print("<br><span>Número introducido: " . $num1 . "</span><br><br>");

          $treinta = $num1 + 30;
          $array = [];
          
          print("<span>Sin array: </span>");

          for ($i=$num1; $i <= $treinta; $i++) {
            print("<span>{$i} </span>");
            array_push($array, $i);
          }
          /* print_r($array); */
          
          print("<br><br><span>Con array: </span>");

          foreach ($array as $valor) {
            print("<span>{$valor} </span>");
          }
          
        }

      ?>
    </main>
    <footer>
        <p><i>2º DAW</i></p>
        <p><i>Desarrollo Web En Entorno Servidor</i></p>
        <p><i>Juan Fernández Herreros</i></p>
    </footer>
  </body>
</html>

