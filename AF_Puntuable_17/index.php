<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Recetas de Cocina</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

    <header data-bs-theme="dark">
      <div class="text-bg-dark collapse" id="navbarHeader" style="">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4>About</h4>
              <p class="text-body-secondary">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4>Contact</h4>
              <ul class="list-unstyled">
                <li><a href="#" class="text-white">Follow on Twitter</a></li>
                <li><a href="#" class="text-white">Like on Facebook</a></li>
                <li><a href="#" class="text-white">Email me</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
            <strong>Album</strong>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

    <main class="main">
    <div class="capa_blanca pb-5">
    <section class="py-5 text-center container">
        <h1>Recetas de Cocina</h1>
        <form method="post">
          <button class="btn btn-dark" name="insertar">Insertar Receta</button>
          <button class="btn btn-dark" name="filtrar">Filtrar Recetas</button>
        </form>
      </section>

      <div class="container">
        <?php
        $file = "recetas.txt";

        if (isset($_POST['insertar'])) {
          print "
          <div class='cont_form mb-5'>
            <h4>INSERTAR NUEVA RECETA</h4>
            <form method='post' enctype='multipart/form-data'>
              <label>Nombre:</label><br>
              <input type='text' name='nombre' class='form-control' required><br>

              <label>Foto:</label><br>
              <input type='file' name='foto' class='form-control' required><br>

              <label>Descripción:</label><br>
              <textarea name='descripcion' class='form-control' rows='5' required></textarea><br>

              <label>Archivo PDF:</label><br>
              <input type='file' name='pdf' class='form-control' required><br>

              <label>Categorías:</label><br>
              <input type='checkbox' name='tipo[]' value='verduras'> Verduras
              <input type='checkbox' name='tipo[]' value='arroces'> Arroces
              <input type='checkbox' name='tipo[]' value='guisos'> Guisos
              <input type='checkbox' name='tipo[]' value='postres'> Postres
              <input type='checkbox' name='tipo[]' value='bebidas'> Bebidas<br><br>

              <button class='btn btn-dark' name='insertar2'>Guardar Receta</button>
            </form>
          </div>";
        }

        if (isset($_POST['insertar2'])) {
          $nombre = $_POST['nombre'];
          $descripcion = $_POST['descripcion'];
          $tipos = implode(',', $_POST['tipo']);
          $foto = $_FILES['foto'];
          $pdf = $_FILES['pdf'];

          move_uploaded_file($foto['tmp_name'], "img/" . $foto['name']);
          move_uploaded_file($pdf['tmp_name'], "pdf/" . $pdf['name']);

          $lineas = file_exists($file) ? file($file) : [];
          $cont = count($lineas) + 1;

          $receta = "$cont\t{$foto['name']}\t$nombre\t$descripcion\t{$pdf['name']}\t$tipos\n";

          $fp = fopen($file, "a");
          fwrite($fp, $receta);
          fclose($fp);

          print "<p>Receta añadida</p>";
        }

        if (isset($_POST['filtrar'])) {
          print "
          <div class='cont_form mb-5'>
            <h4>FILTRAR RECETAS</h4>
            <form method='post'>
              <label>Filtrar por Nombre:</label><br>
              <input type='text' name='nombre_filtrar' class='form-control' placeholder='Escribe el nombre'><br>

              <label>Filtrar por Categoría:</label><br>
              <input type='checkbox' name='tipo_filtrar[]' value='verduras'> Verduras
              <input type='checkbox' name='tipo_filtrar[]' value='arroces'> Arroces
              <input type='checkbox' name='tipo_filtrar[]' value='guisos'> Guisos
              <input type='checkbox' name='tipo_filtrar[]' value='postres'> Postres
              <input type='checkbox' name='tipo_filtrar[]' value='bebidas'> Bebidas<br><br>

              <button class='btn btn-dark' name='filtrar_tipo'>Filtrar</button>
            </form>
          </div>";
        }

        if (isset($_POST['filtrar_tipo']) || isset($_POST['nombre_filtrar'])) {
          $nombreFiltro = $_POST['nombre_filtrar'] ?? '';
          $tiposFiltro = isset($_POST['tipo_filtrar']) ? $_POST['tipo_filtrar'] : [];
          
          print "<div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3'>";
          if (file_exists($file)) {
            $fp = fopen($file, "r");
            while (!feof($fp)) {
              $line = fgets($fp);
              if ($line) {
                $linea = explode("\t", $line);
                $cont = $linea[0];
                $foto = $linea[1];
                $nombre = $linea[2];
                $descripcion = $linea[3];
                $pdf = $linea[4];
                $tipos = $linea[5];

                $nombreCoincide = strpos(strtolower($nombre), strtolower($nombreFiltro)) !== false; // si está el nombre devuelve false

                $tiposCoinciden = false;
                foreach ($tiposFiltro as $tipo) {
                  if (strpos(strtolower($tipos), strtolower($tipo)) !== false) {
                    $tiposCoinciden = true;
                    break;
                  }
                }

                if ($nombreCoincide && (empty($tiposFiltro) || $tiposCoinciden)) {
                  print "
                  <div class='col'>
                    <div class='card shadow-sm'>
                      <img src='imágenes/$foto' class='bd-placeholder-img card-img-top' width='100%' height='225' alt='$nombre'>
                      <div class='card-body'>
                        <p class='card-text'><strong>$nombre</strong></p>
                        <p class='card-text'>$descripcion</p>
                        <div class='d-flex justify-content-between align-items-center'>
                          <div class='btn-group'>
                            <a href='documentos/$pdf' class='btn btn-sm btn-outline-secondary' target='_blank'>pdf</a>
                          </div>
                          <small class='text-body-secondary'>$tipos</small>
                        </div>
                      </div>
                    </div>
                  </div>";
                }
              }
            }
            fclose($fp);
          } else {
            print "<p>No hay recetas disponibles</p>";
          }
          print "</div>";
        } else {
          print "<div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3'>";
          if (file_exists($file)) {
            $fp = fopen($file, "r");
            while (!feof($fp)) {
              $line = fgets($fp);
              if ($line) {
                $linea = explode("\t", $line);
                $cont = $linea[0];
                $foto = $linea[1];
                $nombre = $linea[2];
                $descripcion = $linea[3];
                $pdf = $linea[4];
                $tipos = $linea[5];

                print "
                <div class='col'>
                  <div class='card shadow-sm'>
                    <img src='imágenes/$foto' class='bd-placeholder-img card-img-top' width='100%' height='225' alt='$nombre'>
                    <div class='card-body'>
                      <p class='card-text'><strong>$nombre</strong></p>
                      <p class='card-text'>$descripcion</p>
                      <div class='d-flex justify-content-between align-items-center'>
                        <div class='btn-group'>
                          <a href='documentos/$pdf' class='btn btn-sm btn-outline-secondary' target='_blank'>pdf</a>
                        </div>
                        <small class='text-body-secondary'>$tipos</small>
                      </div>
                    </div>
                  </div>
                </div>";
              }
            }
            fclose($fp);
          } else {
            print "<p>No hay recetas disponibles</p>";
          }
          print "</div>";
        }
        /* 
        echo "<pre>";
        print_r($_FILES);
        echo "</pre>";
 */
        ?>
      </div>
    </div>
    </main>

    <footer class="text-center py-3 bg-dark text-white">
      <p><i>2º DAW</i></p>
      <p><i>Desarrollo Web En Entorno Servidor</i></p>
      <p><i>Juan Fernández Herreros</i></p>
    </footer>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
