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
      <h1>AF2 No Puntuable</h1>
      <p>Se pretende visualizar una matriz de 10 x 10, y en cada una de sus posiciones almacenamos los números del 1 al 100.</p>
      <p>En este ejercicio haremos uso del bucle "for" (aunque podríamos usar cualquier otro tipo de bucle para su realización).</p>
      <p>Visualizar la matriz de manera adecuada en forma de tabla HTML por pantalla.</p>
      <br>
    </header>
    <main>

      <?php

        $array = [];
        $num1 = 1;

        for ($i=1; $i <= 10; $i++) {
          for ($j=1; $j <= 10; $j++) {
            $array[$i][$j] = $num1;
            $num1++;
          }

        }
        
        print("<table>");

        for ($i=1; $i <= 10; $i++) {
          print("<tr>");
          for ($j=1; $j <= 10; $j++) {
            print("<td>{$array[$i][$j]}</td>");
          }
          print("</tr>");
        }


        print("</table>");

        /* print_r($array); */

        

      ?>

    </main>
    <footer>
        <p><i>2º DAW</i></p>
        <p><i>Desarrollo Web En Entorno Servidor</i></p>
        <p><i>Juan Fernández Herreros</i></p>
    </footer>
  </body>
</html>
