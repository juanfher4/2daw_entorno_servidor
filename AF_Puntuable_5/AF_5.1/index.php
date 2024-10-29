<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AF 5.1</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <header>
      <h1>AF_5.1</h1>
<!-- Se debe crear una tabla de 1 sola fila y 6 columnas, conteniendo cada celda un número
aleatorio comprendido entre 1 y 49 en la que habremos de evitar la posibilidad de que un
número se repita dos veces (podría ser una forma de rellenar la primitiva).
Consejo:
"Una forma de hacer esto es guardar en el vector los valores de los números aleatorios que se
van generando, pero antes de guardar cada uno de ellos debemos ejecutar un bucle que
compruebe si entre los números registrados ya existe un valor igual al obtenido. Si no existiera
ese valor se guardaría el dato, en caso contrario se repetiría la extracción del número
aleatorio".
Nota: "No se pueden usar funciones incluidas en el lenguajes php que me comprueben si ya
existe un valor en el array, como por ejemplo in_array() . La comprobación debe hacerse
manual, usando bucles, condicionales, etc..., de manera adecuada. "
 -->
    </header>
    <main>
      <div>
      <?php

        $array1 = [];

        for ($i=0; $i < 6; $i++) {

          do {
            $aleatorio = random_int(1, 49);
            /* Booleano para comprobar */
            $bool = false;
            for ($j = 0; $j < count($array1); $j++) {
              if ($array1[$j] == $aleatorio) {
                $bool = true;
                break;
              }
            }
          } while ($bool);

          array_push($array1, $aleatorio);
        }

        print("<table>");

        for ($i=0; $i < 6; $i++) {
          print("<tr>{$array1[$i]} </tr>");
          }
        print("</table>");

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
