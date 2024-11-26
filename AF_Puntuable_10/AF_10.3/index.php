<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AF 10.3</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <header>
      <h2>AF 10.3</h2>
<!-- Hacer igual que el ejercicio anterior, pero en el caso de STR_AMBOS el proceso será ir
metiendo toda la cadena de relleno por la derecha y después toda la cadena de relleno por la
izquierda y así sucesivamente. No carácter a carácter, que es como lo hacíamos en el ejercicio
anterior.
Siguiendo el mismo ejemplo del ejercicio anterior, supongamos:
Para la cadena: hola
N= 13
Relleno= 123
El resultado sería:
Cadena final = 123hola123123”.

 -->
    </header>
    <main>
        <div>
        <form action="" method="post">
            <table>
                <tr>
                    <span>Escribe algo: </span>
                    <input type="text" name="cadena" value="" required>
                </tr>
                <tr>
                    <br>
                    <span> n: </span>
                    <input type="number" name="n" value="">
                </tr>
                <tr>
                    <br>
                    <span> relleno: </span>
                    <input type="text" name="relleno" value="">
                </tr>
                <tr>
                    <br>
                    <span> tipo  : </span>
                    <select name="tipo">
                        <option value="str_ambos">STR_AMBOS</option>
                        <option value="str_derecha">STR_DERECHA</option>
                        <option value="str_izquierda">STR_IZQUIERDA</option>
                    </select>
                </tr>
                <tr>
                    <br>
                    <input class="button b1" type="submit" value="Mostrar">
                    <input class="button b2" type="reset" value="Borrar">
                </tr>
            </table>
        </form>

        <?php

        if (isset($_POST["cadena"]) && isset($_POST["n"]) && isset($_POST["relleno"]) && isset($_POST["tipo"])) {
            $cadena = $_POST["cadena"];
            $n = $_POST["n"];
            $relleno = $_POST["relleno"];
            $tipo = $_POST["tipo"];


            function mistr_pad($cadena, $n, $relleno, $tipo) {

                $len_cadena = strlen($cadena);
                $resta = $n - $len_cadena;

                if ($len_cadena < $n) {

                    if ($tipo === "str_derecha") {
                                                
                        for ($i=0; $i < $resta; $i++) { 
                        
                            $cadena .= $relleno;

                        }

                    } elseif ($tipo === "str_izquierda") {
                        $rellenos = "";

                        for ($i=0; $i < $resta; $i++) { 
                        
                            $rellenos .= $relleno;

                        }

                        $cadena = $rellenos . $cadena;

                    } elseif ($tipo === "str_ambos") {

                        $mitad = $resta - 2;

                        for ($i=0; $i < $resta; $i++) { 
                        
                            $cadena .= $mitad;

                        }

                        $rellenos = "";

                        for ($i=0; $i < $resta; $i++) { 
                        
                            $rellenos .= $mitad;

                        }

                        $cadena = $rellenos . $cadena;
                        
                    }


                } else {
                    return $cadena;
                }
                
                return $cadena;

            }

            $mistr_pad = mistr_pad($cadena, $n, $relleno, $tipo);

            print($mistr_pad);

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
