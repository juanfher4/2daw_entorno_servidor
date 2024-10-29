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
      <h1>AF_5.2</h1>
<!-- Crear una página web en php que calcule los 20 primeros números de la "Sucesión de
Fibonacci":
Todos estos números se deben introducir en un array Unidimensional (Vector) de 20
posiciones.
Se debe mostrar por pantalla dicho array en formato de tabla HTML.
La sucesión de Fibonacci es la sucesión infinita de números naturales:
1,1,2,3,5,8,13,21,34,55,89,144,233,377,610,987,1597...
Curiosidad:
La sucesión comienza con los números 1,1 y a partir de estos, cada término es la suma de los
dos anteriores.
Existen muchas propiedades y numerosas curiosidades sobre esta sucesión. Por ejemplo, la
mayoría de las flores tienen un número de pétalos que coincide con esta sucesión, esto es, 5
pétalos, 8 pétalos, 13, 21, etc.
También encontramos esta sucesión en las ramas de los árboles, en la disposición de las hojas
en el tallo, en las inflorescencias del brécol romanesco, en la configuración de las piñas de las
coníferas, etc.
 -->
    </header>
    <main>
      <div>
      <?php

        $array1 = [1, 1];

        for ($i=2; $i < 20; $i++) { 
          $array1[$i] = $array1[$i - 1] + $array1[$i - 2];
        }

        print("<table>");

        for ($j=0; $j < 20; $j++) { 
          print("<tr>{$array1[$j]} </tr>");
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
