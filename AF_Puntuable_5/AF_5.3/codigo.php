<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AF 5.1</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <header>
      <h1>AF_5.3</h1>
<!-- Se requiere hacer dos páginas web. En la primera de ellas aparecerá un formulario con 3
campos de texto. Uno para preguntar el nombre del usuario, el 2º para preguntar su primer
apellido y otro para preguntar la contraseña.
Al pulsar sobre el botón "Enviar" debemos recoger en otra página web dichos datos y
comparar con los datos (Nombre, Apellido y Clave) que tengamos en una matriz como la
siguiente:
Nombre Apellido Clave Perfil
Ana Martín Ana1000 Perfil1
Ana Gómez Ana2000 Perfil2
Fernando Duque Motril2222 Perfil3
Maria González Profe333 Perfil4
Benito Pérez Benito1111 Perfil5
  *      *       *         *
La matriz anterior debéis crearla vosotros con los datos que aquí se ven (es como si fuese
nuestra base de datos de usuarios). Si os fijáis, la última fila de la matriz tendrá un "*" en cada
campo para saber que esa es precisamente la última fila.
Al comparar con los datos de la matriz anterior, debemos verificar si los datos introducidos son
correctos. En caso de no serlo, mostraremos un mensaje diciendo que los datos no son
correctos. Y en caso de serlo debemos mostrar un mensaje con el "Perfil" de acceso que le
correspondería para entrar en el sistema.
Nota: "Al comparar en la matriz, debemos hacerlo como si no supiésemos la cantidad de
usuarios que tiene la matriz. En este momento hay 5 usuarios, pero podría haber 1000, por
tanto, hacer un algoritmo que valga para cualquier número de usuarios".
 -->
    </header>
    <main>
      <div>
      <?php

        if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["clave"])) {
          $nombre = $_POST["nombre"];
          $apellido = $_POST["apellido"];
          $clave = $_POST["clave"];

          $perfil1= [
            "nombre" => "Ana",
            "apellido" => "Martín",
            "clave" => "Ana1000",
            "perfil" => "Perfil1"
          ];

          $perfil2= [
            "nombre" => "Ana",
            "apellido" => "Gómez",
            "clave" => "Ana2000",
            "perfil" => "Perfil2"
          ];

          $perfil3= [
            "nombre" => "Fernando",
            "apellido" => "Duque",
            "clave" => "Motril2222",
            "perfil" => "Perfil3"
          ];

          $perfil4= [
            "nombre" => "Maria",
            "apellido" => "González",
            "clave" => "Profe333",
            "perfil" => "Perfil4"
          ];

          $perfil5= [
            "nombre" => "Benito",
            "apellido" => "Pérez",
            "clave" => "Benito1111",
            "perfil" => "Perfil5"
          ];

          $tabla = [$perfil1, $perfil2, $perfil3, $perfil4, $perfil5];
          
          $cont = count($tabla);
/* 
          function($nombre, $apellido, $clave, $cont) {
            $añadir = [
              "nombre" => $nombre,
              "apellido" => $apellido,
              "clave" => $clave,
              "perfil" => "Perfil" . ($cont + 1)
            ];

            $tabla[] = $añadir;

          };
 */
          foreach ($tabla as $key => $value) {
            if ($value["nombre"] == $nombre) {
              print("")
          }

        }

  /* 
          print("<pre>");
          print_r($tabla);
          print("</pre>");
 */

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
