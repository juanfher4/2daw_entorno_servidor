<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AF_2.1</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <h1>TRIÁNGULO DE FLOYD</h1>
    </header>
    <main>
        <form action="" method="post">
            <table>
                <tr>
                    <span>Escribe el número por el cuál acaba: </span>
                    <input type="number" name="num1" value="" size=15 required>
                </tr>
                <tr>
                    <input class="button b1" type="submit" value="Mostrar">
                    <input class="button b2" type="reset" value="Borrar">
                </tr>
            </table>
        </form>

        <?php
        
            if (isset($_POST["num1"])) {
                $num1=$_POST["num1"];

                echo ("<br><span>Número introducido: " . $num1 . "</span><br><br>");

                echo ("<table>");

                $cont = 1;

                for ($i = 1; $cont <= $num1; $i++) {
                    echo ("<tr>");

                    for($j = 1; $j<=$i && $cont<=$num1; $j++) {
                        echo("<td>$cont</td>");
                        $cont++;
                    }
                    /* Imprimo los números del 1 al introducido */
                    echo ("</tr>");
                    
                }

                echo ("</table>");

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
