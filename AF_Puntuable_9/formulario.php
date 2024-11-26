<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AF_Puntuable_9</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <header>
      <h2>CALCULAR MÍNIMO COMÚN MÚLTIPLO</h2>
<!-- 
 -->
    </header>
    <main>
        <div>
          <h3>INTRODUCE LOS NÚMEROS PARA CALCULAR SU M.C.M</h3>
          <form action="code.php" method="post">
          <?php
          
            if (isset($_POST["num"])) {
              $cantidad = $_POST["num"];

              for ($i=1; $i <= $cantidad; $i++) {
                
                print("<span>Número $i: </span>");
                print("<input type='number' name='num$i' min='1' max='100' required><br>");

              }

              print("<input class='button b1' type='submit' value='Mostrar'>");
              print("<input class='button b2' type='reset' value='Borrar'>");

            }
          
          ?>
          <form>

            
        </div>
    </main>
    <footer>
      <p><i>2º DAW</i></p>
      <p><i>Desarrollo Web En Entorno Servidor</i></p>
      <p><i>Juan Fernández Herreros</i></p>
    </footer>
  </body>
</html>
