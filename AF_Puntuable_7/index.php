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
        <a href="">Probar de nuevo</a>
        <?php

          $icon_jugadores = ["&#129443;", "&#129503;", "&#129464;", "&#129484;"];

          function tiradas() {

            $tiradas = [];

            for ($i = 0; $i < 12; $i++) {
              $random_jugadores = random_int(1,4);
              $random_dados = random_int(1,6);
              $tiradas[$i][0] = $random_dados;
              $tiradas[$i][1] = $random_jugadores;
            }

            return $tiradas;

          }

          // Función para agrupar los puntos por jugadores
          function grupos($tiradas) {

            $sumas = [
              1 => 0,
              2 => 0,
              3 => 0,
              4 => 0
            ];

            // Sumo los puntos de cada jugador
            foreach ($tiradas as $ti) {
              $dados = $ti[0];
              $jugadores = $ti[1];
              $sumas[$jugadores] += $dados;
            }
            rsort($sumas);
            return $sumas;
          }
          
          // Le doy cada medalla a su jugador
          function calculo_medallas($sumas) {
            // Array de medallas
            $medallas = ["&#x1f947", "&#x1f948", "&#x1f949", "&#129396"];
            $premios = [];

            // Si dos valores son iguales se quita uno
            $sumastop = array_unique($sumas);
            // Se ordena el array
            rsort($sumastop);

            // Se introducen valores al array $premios[id de jugador, suma de puntos de cada jugador, medalla de cada jugador]
            foreach ($sumas as $jugador => $suma) {
              $premios[] = [$jugador+1, $suma];
            }

            for ($i=0; $i < 4; $i++) {
              // Introduzco cada medalla en su hueco
              if ($sumastop[0] == $premios[$i][1]) {
                $premios[$i][2] = $medallas[0];
              } else if ($sumastop[1] == $premios[$i][1]) {
                $premios[$i][2] = $medallas[1];
              } else if ($sumastop[2] == $premios[$i][1]) {
                $premios[$i][2] = $medallas[2];
              } else {
                $premios[$i][2] = $medallas[3];
              }

            }

            return $premios;

          }
          
          // Función para depurar
          function depurar($tiradas, $sumas, $calculo_medallas) {

            print("<pre>");
            print_r($tiradas);
            print("</pre>");
  
            print("<pre>");
            print_r($sumas);
            print("</pre>");

            print("<pre>");
            print_r($calculo_medallas);
            print("</pre>");

          }

          // Pongo las funciones en variables
          $tiradas = tiradas();
          $sumas = grupos($tiradas);
          $calculo_medallas = calculo_medallas($sumas);

          // Función que depura
          depurar($tiradas, $sumas, $calculo_medallas);

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
