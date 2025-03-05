<?php

if (isset($_POST["nombre_filtrar"])) {
    $nombreFiltro = $_POST["nombre_filtrar"];
} else {
    $nombreFiltro = "";
}

if (isset($_POST['tipo_filtrar'])) {
    $tiposFiltro = $_POST['tipo_filtrar'];
} else {
    $tiposFiltro = [];
}

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

?>