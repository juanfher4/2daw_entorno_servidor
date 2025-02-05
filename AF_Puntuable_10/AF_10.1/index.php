<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AF 10.1</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <header>
      <h2>AF 10.1</h2>
<!-- Implementar la función substr(cadena,n,m), como si dicha función no existiese en el sistema.
Llamar a la nueva función misubstr(cadena,n,m).
Se implementará de manera sencilla, teniendo en cuenta lo siguiente:
1) Si n y m son positivos extrae m caracteres a partir del que ocupa la posición enésima,
de izquierda a derecha.
2) Si n es negativo y m positivo extrae m(contados de izquierda a derecha) a partir del
que ocupa la posición enésima contada de derecha a izquierda.
 -->
    </header>
    <main>
        <div>
        <form action="" method="post">
            <table>
                <tr>
                    <span>Escribe algo: </span>
                    <input type="text" name="text" value="" required>
                </tr>
                <tr>
                    <br>
                    <span> n: </span>
                    <input type="number" name="n" value="" required>
                </tr>
                <tr>
                    <br>
                    <span> m: </span>
                    <input type="number" name="m" value="" required>
                </tr>
                <tr>
                    <br>
                    <input class="button b1" type="submit" value="Mostrar">
                    <input class="button b2" type="reset" value="Borrar">
                </tr>
            </table>
        </form>

        <?php

        if (isset($_POST["text"]) && isset($_POST["n"]) && isset($_POST["m"])) {
            $text = $_POST["text"];
            $n = $_POST["n"];
            $m = $_POST["m"];

            function misubstr($cadena, $n, $m) {

                $array_cadena = [];
                $len_cadena = strlen($cadena);

                // Si $n es negativo le sumo la longitud de la cadena
                if ($n < 0) {
                    $n = $len_cadena + $n;
                }

                if ($n >= $len_cadena) {
                    return [];
                }

                for ($i=0; $i < $len_cadena; $i++) {
                    if ($i >= $n && $i < $n + $m) {
                        $elemento = $cadena[$i];
                        array_push($array_cadena, $elemento);
                    }
                }

                return $array_cadena;

            }

            $misubstr = misubstr($text, $n, $m);

            for ($i=0; $i < count($misubstr); $i++) { 
                print("<span>$misubstr[$i]</span>");
            }

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
