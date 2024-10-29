<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Código</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <section>
            <?php
                
                if (isset($_POST["numero1"]) && isset($_POST["numero2"])) {
                    $numero1 = $_POST["numero1"];
                    $numero2 = $_POST["numero2"];

                    $suma = $numero1 + $numero2;
                    echo ("<h3>Suma: $suma </h3>");

                    $resta = $numero1 - $numero2;
                    echo ("<h3>Resta: $resta</h3>");

                    $multiplicar = $numero1 * $numero2;
                    echo ("<h3>Multiplicación: $multiplicar</h3>");

                    if ($numero2 == 0) {
                        echo ("<h3>No se valen ceros en la división</h3>");
                    } else {
                        $dividir = $numero1 / $numero2;
                        echo ("<h3>División: $dividir</h3>");
                    }
                    
                    $redondeo = ceil(pow($suma, 4));
                    echo ("<h3>Redondeo por exceso de la suma de ambos números a la cuarta potencia: $redondeo</h3>");

                    $raiz_cuadrada = sqrt(pow($suma, 3));
                    echo ("<h3>Raíz cuadrada del cubo de la suma de ambos números: $raiz_cuadrada</h3>");

                    $raiz_quinta = pow(pow($suma, 3), (1/5));
                    echo ("<h3>Raíz quinta del cubo de la suma de ambos números: $raiz_quinta</h3>");

                } else {
                    echo "<h1>No se han ingresado valores.</h1>";
                }

            ?>
        </section>
    </body>
</html>
