<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AF 7</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <header>
      <h1>REPARTICIÓN DE MEDALLAS</h1>
<!-- Realizar un programa para simular una partida de dados entre 4 jugadores. El juego consiste
en lanzar 12 dados sobre un tablero repartido en forma de líneas horizontales entre los 4
jugadores.
Cada dado puede caer en el terreno de cualquiera de los jugadores. La puntuación de cada
jugador es la suma de los dados que han caído en su terreno.
Ganará la partida el jugador o jugadores que tengan más puntos acumulados.
Se pondrán las medallas correspondientes a cada jugador: Las medallas serán:
- Oro ( &#x1f947 )
- Plata ( &#x1f948 )
- Bronce ( &#x1f949 )
- Nada ( &#129396 )
Los jugadores empatados se llevan la misma medalla.
Los jugadores serán:
- Jugador 1: ( &#x1F467; )
-Jugador 2: ( &#129503; )
- Jugador 3: ( &#129464; )
- Jugador 4: ( &#129484; )
Los colores dados al terreno de juego son:
- Para el jugador 1: ( #DC9845 )
- Para el jugador 2: ( #ba9169 )
- Para el jugador 3: ( #A2744E )
- Para el jugador 4: ( #DB907D )
Las imágenes de los dados las pasará el profesor.
Cada vez que se pulse en el botón "Probar de nuevo" se hace otra tirada de los 12 dados, y así
tantas veces como se quiera.
Nota: "En este ejercicio se pueden reutilizar funciones ya realizadas en las AF6- puntuable".
 -->
    </header>
    <main>
      <div>
        <?php

          $icon_jugadores = ["&#129443;", "&#129503;", "&#129464;", "&#129484;"];
          $icon_medallas = ["&#x1f947", "&#x1f948", "&#x1f949", "&#129396"];

/* 
          // Inicializo arrays
          $tiradas = [];
          $premios = [];
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

          // Función para agrupar los puntos por jugadores
          function grupos($tiradas) {

          $suma = [
              1 => 0,
              2 => 0,
              3 => 0,
              4 => 0
          ];

          // Sumo los puntos de cada jugador
          foreach ($tiradas as $ti) {
              $dados = $ti[0];
              $jugadores = $ti[1];
              $suma[$jugadores] += $dados;
          }
          return $suma;
          }

          // Le doy cada medalla a su jugador
          function medallas($suma) {

          // Muestro las medallas de cada jugador
          foreach ($suma as $j => $sum) {
              $premios[] = [$j, $sum, ""];
          }
          
          

          return $premios;

          }

          function calculo_medalla($suma) {
          // Recorro suma
          foreach ($suma as $jugador => $valor) {
              
          }
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

          print("<pre>");
          print_r($tiradas);
          print("</pre>");

          // Meto la función en esta variable
          $suma = grupos($tiradas);

          //Lo imprimo
          print("<pre>");
          print_r($suma);
          print("</pre>");
          /* 
          print($suma[1]); */
/*
          $med = medallas($suma);

          print("<pre>");
          print_r($med);
          print("</pre>");

          $calculo_medallas = calculo_medalla($suma, $med);

          print("<pre>");
          print_r($calculo_medallas);
          print("</pre>");
*/          

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

              print("<td>{$icon_jugadores[$i]}</td>");
              for($j = 0; $j < count($pos[$i]); $j++) {
              }

              print("</tr>");

          }

          print("</table>");

        ?>
        <a href="">Probar de nuevo</a>
      </div>
    </main>
    <footer>
      <p><i>2º DAW</i></p>
      <p><i>Desarrollo Web En Entorno Servidor</i></p>
      <p><i>Juan Fernández Herreros</i></p>
    </footer>
  </body>
</html>
