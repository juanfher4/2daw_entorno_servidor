<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AF Puntuable 3</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <header>
      <h1>AF Puntuable 3</h1>
      <p>Implementar la función array_keys($matriz[, $valor). </p>
      <p>-Si se hace para solo arrays unidimensionales, la nota irá sobre 8.</p>
      <p>-Si se hace para todo tipo de arrays, la nota irá sobre 10.</p>
      <br>
    </header>
    <main>

    <section>

        <?php

            function arrayllaves($array) {
                $llaves = [];

                foreach ($array as $llave => $valor) {
                    $llaves[] = $llave;
                }

                return $llaves;

            }

            $array1 = [
                "nombre" => "Juan",
                "edad" => 19,
                "gato" => "Morgan",
                "edad" => 4,
                "gata" => "Leia",
                "edad" => 2,
                "nombre" => "Isa"
            ];
            
            print("<pre>");
            print_r(arrayllaves($array1));
            print("</pre>");

        ?>

    </section>

    </main>
    <footer>
        <p><i>2º DAW</i></p>
        <p><i>Desarrollo Web En Entorno Servidor</i></p>
        <p><i>Juan Fernández Herreros</i></p>
    </footer>
  </body>
</html>
