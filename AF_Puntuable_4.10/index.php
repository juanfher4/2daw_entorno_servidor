<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AF_Puntuable_4</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <header>
      <h1>AF 4.10</h1>
<!--  <p>Rellenar una matriz tridimensional de 3 filas x 4 columnas x5 de profundidad con los números
      pares que quepan en dicha matriz, empezando desde el 1 en adelante. El orden de relleno
      debe ser: Para cada fila rellenar todas sus columnas, y para cada columna rellenar su
      profundidad antes de pasar a la columna siguiente.</p>
      <p>Nota: "Para mostrar los valores de la matriz utiliza tablas html. En este caso, utiliza 5 tablas
      html una debajo de otra, donde muestres en cada una los diferentes niveles de profundidad.
      Así, la primera tabla mostrará todas las filas y columnas de la profundidad 0, la segunda tabla
      todas las filas y columnas de la profundidad 1, y así sucesivamente."</p> -->
    </header>
    <main>
      <div>
        
        <?php

          $array = [];
          $num1 = 2;

          for ($i=0; $i < 5; $i++) {
            for ($j=0; $j < 3; $j++) {
              for ($k=0; $k < 4; $k++) {
                $array[$i][$j][$k] = $num1;
                $num1=$num1+2;
              }
            }
          }

          for ($i=0; $i < 5; $i++) {
            print("<table>");
            for ($j=0; $j < 3; $j++) {
              print("<tr>");
              for ($k=0; $k < 4; $k++) {
                print("<td>{$array[$i][$j][$k]}</td>");
              }
              print("</tr>");
            }
            print("</table>");
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
