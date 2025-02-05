<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verbos en Inglés</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include "irregular-verbs-list.php"; # lista de verbos con sus formas, creando la variable $irregularVerbs
$tenses = ["presente","pasado","participio"]; # referencia del nombre de las formas verbales
?>
<h1>Verbos en Inglés</h1>
<main>
    <?php
        if(isset($_POST["quiz"])) { # cuando se ha introducido una respuesta anterior
            $answer = $_POST["quiz"]; # se guarda la respuesta introducida,
            $prevVerb = $irregularVerbs[$_POST["chosenVerb"]]; # el verbo de la pregunta anterior
            $prevAnswer = $_POST["realAnswer"]; # y el índice de la forma correcta

            if ($prevVerb[$answer] == $prevVerb[$prevAnswer]) { # comprueba que los valores de la respuesta dada y la respuesta correcta (usando la forma verbal en vez del índice para los casos donde las formas verbales se vean visualmente iguales)
                print("<p>¡Respuesta correcta!</p>");
            } else {
                print("<p>¡Respuesta incorrecta!</p>");
                print("<p>El <u>$tenses[$prevAnswer]</u> de <u>$prevVerb[3]</u> es <u>$prevVerb[$prevAnswer]</u>.</p>"); 
            }
        }
        # si se envía el formulario pero no se envía ninguna respuesta
        else if (isset($_POST["chosenVerb"],$_POST["realAnswer"])) {
            print("<p>No se ha introducido ninguna respuesta.</p>");
        }
    ?>
    <form action="" method="post">
        <?php
        $cVerbNum = array_rand($irregularVerbs); # índice del verbo elegido
        $chosenVerb = $irregularVerbs[$cVerbNum]; # verbo elegido
        $enForms = [[0,$chosenVerb[0]],[1,$chosenVerb[1]],[2,$chosenVerb[2]]]; $esVerb=$chosenVerb[3]; # formas en ingles y en español separadas; las formas en ingles se unen con sus índices originales para que se sepa su valor cuando se cambien de orden

        $realAnswer = rand(0,2); # forma verbal elegida, siendo 0 el presente, 1 el pasado y 2 el participio (como se ve en el array $tenses anteriormente)
    
        print("<div id='qna'>");
        print("<div>¿Cual es el $tenses[$realAnswer] de \"$esVerb\"?</div>");
        $rForms = $enForms;
        shuffle($rForms); # se reordenan las formas verbales
        print("<div>");
        foreach ($rForms as $verb) { # para cada forma inglesa (para cada respuesta posible) se introduce un input radio
            print("<div>");
            print("<input type='radio' name='quiz' value='$verb[0]'></input>"); # utiliza el índice original de la forma como valor
            print("<label for='$verb[0]'>$verb[1]</label>");
            print("</div>");
        }
        ?>
        </div>
    
        <?php
        # se envían los valores del verbo elegido y de la respuesta correcta, además de la respuesta introducida
        print("<input type='hidden' id='chosenVerb' name='chosenVerb' value='$cVerbNum'></input>"); 
        print("<input type='hidden' id='realAnswer' name='realAnswer' value='$realAnswer'></input>");?>
        </div>
        <input type="submit" value="Corregir">
        <div class='gap'> </div>
        <input type="reset" value="Borrar">
    </form>
    <p><a href="">Reiniciar</a></p>
</main>

</body>
</html>