<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AF 6.2</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <header>
      <h1>AF_6.2</h1>
<!-- Función que reciba un array bidimensional del número de filas que se quieran y 2 columnas
cada fila. Representan 12 tiradas de dados. Cada fila representa una tirada de un dado (1ª
columna el valor obtenido) y (2ª columna a qué jugador se le ha asigando de entre 4 posibles).
El array bidimensional debe generarse por otra función de forma aleatoria.
La función debe devolver otro array bidimensional con 4 filas (una por cada jugador), y en
cada fila tantas columnas como sitios donde se ha encontrado el jugador en el array de tiradas.
Por ejemplo:
Supongamos que se ha generado el siguiente array bidimensional:


        $tiradas=[
            [5,1],
            [4,1],
            [3,1],
            [1,2],
            [1,3],
            [2,3],
            [6,4],
            [1,4],
            [2,1],
            [4,2],
            [2,3],
            [2,2]
        ];

        La función tendría que devolvernos un array bidimensional con 4 filas, donde en cada fila
aparecen las posiciones donde se han encontrado cada uno de los jugadores , tanto en
formato “print_r()” como en forma de tabla html, para que sea más legible 
 -->
    </header>
    <main>
      <div>
      <?php

        // Inicializo arrays
        $tiradas = [];
        $posiciones = [];
        // Acumuladores
        $jug1 = 0;
        $jug2 = 0;
        $jug3 = 0;
        $jug4 = 0;

        for ($i = 0; $i < 12; $i++) {
          $random_jugadores = random_int(1,4);
          $random_dados = random_int(1,6);
          $tiradas[$i][0] = $random_dados;
          $tiradas[$i][1] = $random_jugadores;
        }

        // Función para agrupar las posiciones
        function posiciones($tiradas) {
            $posiciones = [];
            foreach ($tiradas as $i => $ti) {
                $jug = $ti[1];
                $posiciones[$jug][] = $i;
            }
          return $posiciones;
        }

        function num_jugador($tiradas) {
            foreach ($tiradas as $i => $ti) {
                $num[] = $i;
            }
            return $num;
        }

        // Muestro las tiradas de dados

        foreach ($tiradas as $i => $ti) {
          print($ti[0] . " ");
        }
        print(" - Tiradas dados");

        print("<br>");

        // Muestro las tiradas de jugadores

        foreach ($tiradas as $i => $ti) {
          print($ti[1] . " ");
        }
        print(" - Tiradas jugadores");

        // Meto la función en esta variable
        $pos = posiciones($tiradas);
        $num = num_jugador($tiradas);

        print("<pre>");
        print_r($pos);
        print("</pre>");

        print("<table>");
        print("<tr><th colspan='100%'>POSICIONES DE JUGADORES</th></tr>");
        print("<tr><th>Jugadores</th><th colspan='100%'>Posiciones</th></tr>");

        for ($i = 1; $i <= 4; $i++) {

            print("<tr>");
            
            print("<td>Jugador {$num[$i]}:</td>");
            for($j = 0; $j < count($pos[$i]); $j++) {
              print("<td>{$pos[$i][$j]}</td>");
            }
            
            print("</tr>");

        }

        print("</table>");

      ?>
      <a href="">Recargar</a>
      </div>
    </main>
    <footer>
      <p><i>2º DAW</i></p>
      <p><i>Desarrollo Web En Entorno Servidor</i></p>
      <p><i>Juan Fernández Herreros</i></p>
    </footer>
  </body>
</html>
