<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Código</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body <?php if (isset($_POST["color"])) { echo "style='background-color:",$_POST["color"],";'"; }?>>
        <section>
            <?php
                
                if (isset($_POST["nombre"]) && isset($_POST["contraseña"]) && isset($_POST["marca"]) && isset($_POST["comunidades"]) && isset($_POST["animal"]) && isset($_POST["color"]) && isset($_POST["comentario"]) && isset($_POST["oculto"])) {

                    $nombre = $_POST["nombre"];
                    $contraseña = $_POST["contraseña"];
                    $marca = $_POST["marca"];
                    $comunidades = $_POST["comunidades"];
                    $animal = $_POST["animal"];
                    $color = $_POST["color"];
                    $comentario = $_POST["comentario"];
                    $oculto = $_POST["oculto"];

                    echo("<h3>Nombre: $nombre</h3>");
                    echo("<h3>Contraseña: $contraseña</h3>");
                    echo("<h3>Marca: $marca</h3>");

                    foreach ($comunidades as $comunidad=>$value) {
                        echo("<h3> Comunidad: " . $value . "</h3>");
                    }

                    echo("<h3>Animal: $animal</h3>");
                    echo("<h3>Color: $color</h3>");
                    echo("<h3>Comentario: $comentario</h3>");
                    echo("<h3>Oculto: $oculto</h3>");

                } else {
                    echo "<h1>No se han ingresado valores.</h1>";
                }

            ?>
        </section>
    </body>
</html>
