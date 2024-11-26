<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AF_Puntuable_9</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <header>
      <h2>CALCULAR MÍNIMO COMÚN MÚLTIPLO</h2>
<!-- 
 -->
    </header>
    <main>
        <div id="fondo_verde">
          <div id="borde_verde">

            <?php

              $numeros = [];
              foreach ($_POST as $num) {
                array_push($numeros, $num);
              }

              function fact($num) {

                // Inicializo el primer divisor a comprobar en 2
                $divisor = 2;
                // Array para los divisores y otro para números
                $divisores = [];
                $numeros_siguientes = [$num];

                while($num > 1) {
                  if ($num % $divisor === 0) {
                    // Meto en el array $divisores cada divisor
                    array_push($divisores, $divisor);
                    $num /= $divisor;
                    // Meto en el array $numeros cada numero, que son el resultado de cada división
                    array_push($numeros_siguientes, $num);
                  } else {
                    $divisor++;
                  }
                }

                // En este return saco de la función los dos arrays
                return [
                  "numeros_siguientes" => $numeros_siguientes,
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

              function mcm($numeros) {

                foreach ($numeros as $num) {

                  // Cuento cuántos divisores hay de cada número
                  $cuentas = array_count_values(fact($num)["divisores"]);

                  foreach ($cuentas as $divisor => $cuenta) {

                    

                  }

                }

              }

              function depurar($funcion) {

                print("<pre>");
                print_r($funcion);
                print("</pre>");

              }

              function mostrar($numeros_siguientes, $divisores) {

                $num_max = count($numeros_siguientes);

                for ($i=0; $i < $num_max; $i++) {

                  print("<tr>");
                  
                  if ($i < count($divisores)) {
                    print("<td>$numeros_siguientes[$i] | $divisores[$i]</td>");
                  } else {
                    // Si no hay más divisores, muestra el número 1
                    if ($i == count($divisores)) {
                      print("<td>1 |</td>");
                    } 
                  }

                  print("</tr>");

                }


              }

              depurar($numeros);

              foreach ($numeros as $num) {
                $fact = fact($num);
                $numeros_siguientes = $fact["numeros_siguientes"];
                $divisores = $fact["divisores"];
                $resultado = resultado($num, $divisores);
                $cuentas = array_count_values($divisores);
                depurar($numeros_siguientes);
                depurar($divisores);
                depurar($resultado);
                
                print("<pre>");
                print_r($cuentas);
                print("</pre>");

              }

              print("<table>");

              foreach ($numeros as $num) {
                
                $fact = fact($num);
                $numeros_siguientes = $fact["numeros_siguientes"];
                $divisores = $fact["divisores"];
                $resultado = resultado($num, $divisores);

                print("<tr><th>Descomponer Número $num</th></tr>");

                mostrar($numeros_siguientes, $divisores);
                            
                print("<td class='fondo_naranja'>$resultado</td>");

              }

              $mcm = mcm($numeros);
              
              print("</table>");

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
