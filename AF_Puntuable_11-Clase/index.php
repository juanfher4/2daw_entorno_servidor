<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AF_Puntable_11-Clase</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <header>
        <h2>VERBOS EN INGLÉS</h2>
    </header>
    <main>
      <div id="fondo_verde">
        <?php
          $irregularVerbs = [
            ['be',        'was / were', 'been',      'ser'],
            ['beat',      'beat',      'beaten',    'golpear'],
            ['become',    'became',    'become',    'llegar a ser'],
            ['begin',     'began',     'begun',     'empezar'],
            ['bend',      'bent',      'bent',      'doblar'],
            ['bet',       'bet',       'bet',       'apostar'],
            ['bite',      'bit',       'bitten',    'morder'],
            ['bleed',     'bled',      'bled',      'sangrar'],
            ['blow',      'blew',      'blown',     'soplar'],
            ['break',     'broke',     'broken',    'romper'],
            ['bring',     'brought',   'brought',   'traer'],
            ['build',     'built',     'built',     'construir'],
            ['burn',      'burnt',     'burnt',     'quemar'],
            ['burst',     'burst',     'burst',     'estallar'],
            ['buy',       'bought',    'bought',    'comprar'],
            ['catch',     'caught',    'caught',    'coger'],
            ['choose',    'chose',     'chosen',    'elegir'],
            ['come',      'came',      'come',      'venir'],
            ['cost',      'cost',      'cost',      'costar'],
            ['cut',       'cut',       'cut',       'cortar'],
            ['deal',      'dealt',     'dealt',     'tratar'],
            ['dig',       'dug',       'dug',       'cavar'],
            ['do',        'did',       'done',      'hacer'],
            ['draw',      'drew',      'drawn',     'dibujar'],
            ['dream',     'dreamt',    'dreamt',    'soñar'],
            ['drink',     'drank',     'drunk',     'beber'],
            ['drive',     'drove',     'driven',    'conducir'],
            ['eat',       'ate',       'eaten',     'comer'],
            ['fall',      'fell',      'fallen',    'caer'],
            ['feed',      'fed',       'fed',       'alimentar'],
            ['feel',      'felt',      'felt',      'sentir'],
            ['fight',     'fought',    'fought',    'luchar'],
            ['find',      'found',     'found',     'encontrar'],
            ['fly',       'flew',      'flown',     'volar'],
            ['forget',    'forgot',    'forgotten', 'olvidar'],
            ['forgive',   'forgave',   'forgiven',  'perdonar'],
            ['freeze',    'froze',     'frozen',    'congelar'],
            ['get',       'got',       'got',       'conseguir'],
            ['give',      'gave',      'given',     'dar'],
            ['go',        'went',      'gone',      'ir'],
            ['grow',      'grew',      'grown',     'crecer'],
            ['hang',      'hung',      'hung',      'colgar'],
            ['have',      'had',       'had',       'tener'],
            ['hear',      'heard',     'heard',     'oír'],
            ['hide',      'hid',       'hidden',    'esconder'],
            ['hit',       'hit',       'hit',       'golpear'],
            ['hold',      'held',      'held',      'sujetar'],
            ['hurt',      'hurt',      'hurt',      'herir'],
            ['keep',      'kept',      'kept',      'mantener'],
            ['know',      'knew',      'known',     'saber'],
            ['lay',       'laid',      'laid',      'extender'],
            ['lead',      'led',       'led',       'guiar'],
            ['learn',     'learnt',    'learnt',    'aprender'],
            ['leave',     'left',      'left',      'marcharse'],
            ['lend',      'lent',      'lent',      'prestar'],
            ['let',       'let',       'let',       'permitir'],
            ['lie',       'lay',       'lain',      'tumbarse'],
            ['light',     'lit',       'lit',       'encender'],
            ['lose',      'lost',      'lost',      'perder'],
            ['make',      'made',      'made',      'fabricar'],
            ['mean',      'meant',     'meant',     'significar'],
            ['meet',      'met',       'met',       'conocer a'],
            ['pay',       'paid',      'paid',      'pagar'],
            ['put',       'put',       'put',       'poner'],
            ['read',      'read',      'read',      'leer'],
            ['ride',      'rode',      'ridden',    'montar'],
            ['ring',      'rang',      'rung',      'llamar'],
            ['rise',      'rose',      'risen',     'elevar'],
            ['run',       'ran',       'run',       'correr'],
            ['say',       'said',      'said',      'decir'],
            ['see',       'saw',       'seen',      'ver'],
            ['sell',      'sold',      'sold',      'vender'],
            ['send',      'sent',      'sent',      'enviar'],
            ['set',       'set',       'set',       'colocar'],
            ['sew',       'sewed',     'sewn',      'coser'],
            ['shake',     'shook',     'shaken',    'agitar'],
            ['shine',     'shone',     'shone',     'brillar'],
            ['shoot',     'shot',      'shot',      'disparar'],
            ['show',      'showed',    'shown',     'mostrar'],
            ['shut',      'shut',      'shut',      'cerrar'],
            ['sing',      'sang',      'sung',      'cantar'],
            ['sink',      'sank',      'sunk',      'hundirse'],
            ['sit',       'sat',       'sat',       'sentarse'],
            ['sleep',     'slept',     'slept',     'dormir'],
            ['smell',     'smelt',     'smelt',     'oler'],
            ['speak',     'spoke',     'spoken',    'hablar un idioma'],
            ['spell',     'spelt',     'spelt',     'deletrear'],
            ['spend',     'spent',     'spent',     'gastar'],
            ['spill',     'spilt',     'spilt',     'derramarse'],
            ['spoil',     'spoilt',    'spoilt',    'estropear'],
            ['spread',    'spread',    'spread',    'untar'],
            ['spring',    'sprang',    'sprung',    'saltar'],
            ['stand',     'stood',     'stood',     'estar de pie'],
            ['steal',     'stole',     'stolen',    'robar'],
            ['stick',     'stuck',     'stuck',     'pegar'],
            ['sting',     'stung',     'stung',     'picar'],
            ['swear',     'swore',     'sworn',     'jurar'],
            ['sweep',     'swept',     'swept',     'barrer'],
            ['swim',      'swam',      'swum',      'nadar'],
            ['take',      'took',      'taken',     'tomar'],
            ['teach',     'taught',    'taught',    'enseñar'],
            ['tear',      'tore',      'torn',      'desgarrar'],
            ['tell',      'told',      'told',      'contar'],
            ['think',     'thought',   'thought',   'pensar'],
            ['throw',     'threw',     'thrown',    'tirar'],
            ['understand', 'understood', 'understood', 'comprender'],
            ['wake up',   'woke up',   'woken up',  'despertarse'],
            ['wear',      'wore',      'worn',      'llevar puesto'],
            ['win',       'won',       'won',       'ganar'],
            ['write',     'wrote',     'written',   'escribir'],
          ];

          $num_random = random_int(0, count($irregularVerbs) - 1);
          $num_random_tiempo = random_int(0, 2);

          $tiempo = ["infinitivo", "pasado", "participio"];

          $verbo = $irregularVerbs[$num_random];
          depurar($verbo);
          $formas_verbales = [$verbo[0], $verbo[1], $verbo[2]];
          shuffle($formas_verbales);
          depurar($formas_verbales);

          function depurar($array) {

            print("<pre>");
            print_r($array);
            print("</pre>");

          }

            $test = $_GET['tiempo_pedido'];
          echo $test;
          print("<form action='index.php'>");
          print("<label>¿Cuál es el $tiempo[$num_random_tiempo] de \"$verbo[3]\": </label>");
          foreach ($formas_verbales as $forma_verbal) {
            print("<input class='respuesta' type='radio' name='respuesta' > $forma_verbal");
          }
          print("<br>");
          print("<input type='hidden' id='tiempo_pedido' name='tiempo_pedido' value='$num_random_tiempo'>");
          print("<input type='hidden' id='ctfvgybhu' name='tiempo_escogido' value='$'>");
          print("<input class='button b1' type='submit' value='Mostrar'>");
          print("<input class='button b2' type='reset' value='Borrar'>");
          print("</form>");

          print("<div id='correcto'>");
          if (isset($_POST["respuesta"]) && isset($_POST["tiempo_pedido"]) && isset($_POST["tiempo_escogido"])) {
            $respuesta = $_POST["respuesta"];
            if ($respuesta === $verbo[$num_random_tiempo]) {
              print("¡Respuesta correcta!");
            } else {
              print("¡Respuesta incorrecta!");
              print("<br>El $tiempo[$num_random_tiempo] de $verbo[3] es $verbo[$num_random_tiempo]");
            }
          }
          print("</div>");

          
        ?>
        <a href="">Reiniciar</a>
      </div>
    </main>
    <footer>
      <p><i>2º DAW</i></p>
      <p><i>Desarrollo Web En Entorno Servidor</i></p>
      <p><i>Juan Fernández Herreros</i></p>
    </footer>
  </body>
</html>
