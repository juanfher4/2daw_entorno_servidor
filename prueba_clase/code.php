<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prueba_clase</title>
</head>
<body>
    <header>
        <h1>Examen</h1>
    </header>
    <main>
        <?php
        
        if (isset($_POST["perro"]) && isset($_POST["gato"]) && isset($_POST["cerdo"]) && isset($_POST["casa"]) && isset($_POST["silla"]) && isset($_POST["mesa"])) {
            $perro = $_POST["perro"];
            $gato = $_POST["gato"];
            $cerdo = $_POST["cerdo"];
            $casa = $_POST["casa"];
            $silla = $_POST["silla"];
            $mesa = $_POST["mesa"];

            $respuestas_correctas = [
                $dog,
                $cat,
                $pig,
                $house,
                $silla,
                $mesa
            ];

            $cont = 0;

            function($palabra, $correcta) {
                if ($palabra === $correcta) {
                    $cont ++;
                }
                
            };
            
        }
        
        ?>
    </main>
    <footer>
        <p><i>2º DAW</i></p>
        <p><i>Desarrollo Web En Entorno Servidor</i></p>
        <p><i>Juan Fernández Herreros</i></p>
    </footer>
</body>
</html>
