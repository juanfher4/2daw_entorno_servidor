<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AF_Puntuable_8</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <header>
      <h2>CALCULAR MÍNIMO COMÚN MÚLTIPLO</h2>
<!-- Calcular el mínimo común múltiplo de 3 números que introduzca el usuario desde un
formulario. Cada número entre el 1 y el 100.
Mostrar los resultados de la descomposición de los números en factores primos (en forma de
tabla html de forma adecuada) , así como el resultado del cálculo del mínimo común múltiplo.
El resultado por pantalla debe ser el siguiente:
Una vez introducidos los 3 números por el usuario, supongamos los números (60 ,72 , 24), el
resultado por pantalla debe ser:
 -->
    </header>
    <main>
        <div id="fondo_verde">
          <div id="borde_verde">

            <?php
              
              if (isset($_POST["num1"]) && isset($_POST["num2"]) && isset($_POST["num3"])) {
                $num1 = $_POST["num1"];
                $num2 = $_POST["num2"];
                $num3 = $_POST["num3"];

                $numeros = [$num1, $num2, $num3];

                function fact($num) {

                  // Inicializo el primer divisor a comprobar en 2
                  $divisor = 2;
                  // Array para los divisores y otro para números
                  $divisores = [];
                  $numeros = [$num];

                  while($num > 1) {
                    if ($num % $divisor === 0) {
                      // Meto en el array $divisores cada divisor
                      array_push($divisores, $divisor);
                      $num /= $divisor;
                      // Meto en el array $numeros cada numero, que son el resultado de cada división
                      array_push($numeros, $num);
                    } else {
                      $divisor++;
                    }
                  }

                  // En este return saco de la función los dos arrays
                  return [
                    "numeros" => $numeros,
                    "divisores" => $divisores
                  ];

                }

                function resultado($num, $divisores) {

                  $resultado = [];

                  // Cuento cuántos divisores hay de cada número
                  $cuenta_divisores = array_count_values($divisores);

                  foreach ($cuenta_divisores as $divisor => $cuenta) {
                    if ($cuenta > 1) {
                      $divisor = "($divisor)<sup>$cuenta</sup>";
                    }  

                    array_push($resultado, $divisor);

                  } 

                  return "$num = " . implode(" * ", $resultado);

                }

                function mcm() {

                }

                function depurar($funcion) {

                  print("<pre>");
                  print_r($funcion);
                  print("</pre>");

                }

                function mostrar($numeros1, $divisores1, $resultado1, $numeros2, $divisores2, $resultado2, $numeros3, $divisores3, $resultado3) {

                  print("<table>");
                  print("<tr><th>Descomponer Número 1</th><th>Descomponer Número 2</th><th>Descomponer Número 3</th></tr>");

                  $num_max = max(count($numeros1), count($numeros2), count($numeros3));

                  for ($i=0; $i < $num_max; $i++) {

                    print("<tr>");
                    
                    if ($i < count($divisores1)) {
                      print("<td>{$numeros1[$i]} | {$divisores1[$i]}</td>");
                    } else {
                      // Si no hay más divisores, muestra el número 1
                      if ($i == count($divisores1)) {
                        print("<td>1 |</td>");
                      } else {
                        print("<td></td>");
                      }
                    }

                    if ($i < count($divisores2)) {
                      print("<td>{$numeros2[$i]} | {$divisores2[$i]}</td>");
                    } else {
                      if ($i == count($divisores2)) {
                        print("<td>1 |</td>");
                      } else {
                        print("<td></td>");
                      }
                    }
                    
                    if ($i < count($divisores3)) {
                      print("<td>{$numeros3[$i]} | {$divisores3[$i]}</td>");
                    } else {
                      if ($i == count($divisores3)) {
                        print("<td>1 |</td>");
                      } else {
                        print("<td></td>");
                      }
                    }

                    print("</tr>");

                  }

                  print("<tr class='fondo_naranja'>");
                  
                  print("<td>$resultado1</td>");
                  print("<td>$resultado2</td>");
                  print("<td>$resultado3</td>");

                  print("</tr>");

                  print("</table>");

                }

                $fact1 = fact($num1);
                $numeros1 = $fact1["numeros"];
                $divisores1 = $fact1["divisores"];

                $fact2 = fact($num2);
                $numeros2 = $fact2["numeros"];
                $divisores2 = $fact2["divisores"];

                $fact3 = fact($num3);
                $numeros3 = $fact3["numeros"];
                $divisores3 = $fact3["divisores"];

                $resultado1 = resultado($num1, $divisores1);
                $resultado2 = resultado($num2, $divisores2);
                $resultado3 = resultado($num3, $divisores3);

                

                depurar($numeros1);
                depurar($divisores1);
                depurar($resultado1);

                depurar($numeros2);
                depurar($divisores2);
                depurar($resultado2);

                depurar($numeros3);
                depurar($divisores3);
                depurar($resultado3);

                mostrar($numeros1, $divisores1, $resultado1, $numeros2, $divisores2, $resultado2, $numeros3, $divisores3, $resultado3);

              }

              print("<br><a href='index.html'>Volver al formulario</a>");

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
