<?php

print "<div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3'>";

try {
    
    $query = "SELECT * FROM receta;";
    $stmt = $db -> query($query);

    if ($stmt->rowCount() <= 0) {
        print "No hay recetas";
    } else {

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cod_receta = $fila["cod_receta"];
            $nombre = $fila["nombre"];
            $foto = $fila["foto"];
            $descripcion = $fila["descripcion"];
            $pdf = $fila["pdf"];
            $tiempo = $fila["tiempo"];

            $categorias = $db->prepare("select nombre from categoria where cod_categoria in (select cod_categoria from pertenece where cod_receta = :cod_receta);");
            $categorias->bindParam(":cod_receta", $cod_receta);
            $categorias->execute();

            $categorias_lista = [];
            while ($categoria = $categorias->fetch(PDO::FETCH_ASSOC)) {
                $categorias_lista[] = $categoria["nombre"];
            }
/* 
            print("<pre>");
            print_r($categorias_lista);
            print("</pre>");
             */

            if (count($categorias_lista) > 0) {
                $cat = implode(", ", $categorias_lista);
            } else {
                print "No tiene categoria";
            } 

            print "
            <div class='col'>
                <div class='card shadow-sm'>
                    <img src='img/$foto' class='bd-placeholder-img card-img-top' width='100%' height='225' alt='$nombre'>
                    <div class='card-body'>
                        <p class='card-text'><strong>$nombre</strong></p>
                        <p class='card-text'>$descripcion</p>
                        <p class='card-text'><small><strong>Categorías:</strong> $cat</small></p>
                        <div class='d-flex justify-content-between align-items-center'>
                            <div class='btn-group'>
                                <a href='pdf/$pdf' class='btn btn-sm btn-outline-secondary' target='_blank'>PDF</a>
                            </div>
                            <small class='text-body-secondary'>$tiempo</small>
                        </div>
                    </div>
                </div>
            </div>";

        }

    }

} catch (PDOException $e) {
    echo "<p>Error: " . $e->getMessage() . "</p>";
}
/* 
    if (file_exists($file)) { 
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
 */
?>
