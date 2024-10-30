<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AF 6.1</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <header>
      <h1>AF_6.1</h1>
<!-- Dado un array bidimensional como el siguiente:

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

        Donde cada fila corresponde a una tirada de un dado.
Dentro de cada fila, en la 1ª columna aparece el valor obtenido en dicha tirada y en la
2ª columna a qué jugador se le ha asignado dicho valor. Hay 4 jugadores posibles.
Crear una función que reciba el array anterior como argumento, y devuelva otro array
con 4 filas, uno por cada jugador. Por ejemplo, como el siguiente:

        $premios=[
            [1,14,"O"],
            [2,7,"P"],
            [4,7,"P"],
            [3,5,"B"]
        ];

En cada una de las filas, en la 1ª columna aparecerá el número de jugador, en la 2ª
columna la puntuación conseguida en total por ese jugador, y en la 3ª columna la
medalla obtenida ("O" (oro), "P" (Plata), "B" (bronce), "N" (nada)).
El array devuelto tiene que estar ordenado de mayor a menor, teniendo en cuenta los
puntos obtenidos de los jugadores. 
Una vez ordenado el array, es cuando se debe rellenar la tercera columna de cada fila
poniendo la medalla obtenida por cada jugador.
Mostrar dicho array por pantalla.
Nota: "Crear las funciones necesarias adicionales para resolver el ejercicio. Como por
ejemplo una función de ordenación de arrays ".
 -->
    </header>
    <main>
      <div>
      <?php

        // Inicializo arrays
        $tiradas = [];
        $premios = [];

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
          rsort($suma);
          return $suma;
        }

        // Le doy cada medalla a su jugador
        function calculo_medallas($suma) {
          $medallas = ["&#x1f947", "&#x1f948", "&#x1f949", "&#129396"];
          $premios = [];

          foreach ($suma as $j => $sum) {
            $premios[] = [$j+1, $sum, ""];
          }

          for ($i=0; $i < ; $i++) {
            
          }
          
          return $premios;

        }

        function mostrar($suma, $calculo_medallas) {

          print("<pre>");
          print_r($suma);
          print("</pre>");

          print("<pre>");
          print_r($calculo_medallas);
          print("</pre>");

        }

/* 
        print("<pre>");
        print_r($tiradas)
        print("</pre>");
 */

        $suma = grupos($tiradas);
        $calculo_medallas = calculo_medallas($suma);

        mostrar($suma, $calculo_medallas);

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
