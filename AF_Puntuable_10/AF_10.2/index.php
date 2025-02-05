<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AF 10.2</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <header>
      <h2>AF 10.2</h2>
<!-- Implementar la función str_pad(cadena,n,relleno,tipo) como si dicha función no existiese en
el sistema.
Llamar a la nueva función: mistr_pad(cadena,n,relleno,tipo).
Se implementará teniendo en cuenta lo siguiente:
1) Añade a la cadena los caracteres especificados en relleno (uno o varios, escritos entre
comillas) hasta que alcance la longitud que indica n (un número).
2) El parámetro tipo puede tomar uno de estos 3 valores: STR_AMBOS (rellena por
ambos lados), STR_DERECHA( rellena por la derecha), STR_IZQUIERDA (rellena por la
izquierda).
Nota: “En el caso de STR_AMBOS el proceso será ir metiendo carácter a carácter de la cadena
de relleno, primero por la derecha y después ese mismo carácter por la izquierda, hasta que
lleguemos a la longitud n indicada.
Por ejemplo:
Para la cadena: hola
N= 13
Relleno= 123
Iría metiendo el primer carácter del relleno, es decir, el 1 primero por la derecha y si se puede
después por la izquierda. Después el 2, primero por la derecha y ese mismo 2 por la izquierda.
Después el 3 . Después otra vez comenzaría con el 1 y así. El resultado sería:
Cadena final = 1231hola12312”.
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

                        $mitad = $resta / 2;

                        for ($i=0; $i < $mitad; $i++) { 
                        
                            $cadena .= $relleno;

                        }

                        $rellenos = "";

                        for ($i=0; $i < $mitad; $i++) { 
                        
                            $rellenos .= $relleno;

                        }

                        $cadena = $rellenos . $cadena;
                        $len_cadena2 = strlen($cadena);

                        if ($len_cadena2 < $n) {
                            
                        }
                        
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
