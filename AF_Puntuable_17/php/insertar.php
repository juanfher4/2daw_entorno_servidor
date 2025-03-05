<?php

try {

    /************************************************************************/
    /*                                                                      */
    /*   1. Primero inicializo las variables                                */
    /*   2. Después pongo los ficheros y fotos en sus respectivas carpetas  */
    /*   3. Saco la clave primaria                                          */
    /*   4. Preparo y ejecuto las sentencias sql en las dos tablas          */
    /*                                                                      */
    /************************************************************************/

    /* 1. */
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $categorias = $_POST["tipo"];
    $foto = $_FILES["foto"];
    $pdf = $_FILES["pdf"];
    $tiempo = $_POST["tiempo"];

    /* 2. */
    move_uploaded_file($foto["tmp_name"], "img/" . $foto["name"]);
    move_uploaded_file($pdf["tmp_name"], "pdf/" . $pdf["name"]);

    /* 3. */
    $query = $db->query("SELECT COUNT(*) FROM Receta");
    $recetas = $query->fetchColumn();
    $cod_receta = $recetas + 1;

    /* 4 */
    $stmt = $db->prepare("INSERT INTO Receta (cod_receta, nombre, descripcion, foto, pdf, tiempo) VALUES (:cod_receta, :nombre, :descripcion, :foto, :pdf, :tiempo)");
    $stmt->bindParam(":cod_receta", $cod_receta);
    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":descripcion", $descripcion);
    $stmt->bindParam(":foto", $foto["name"]);
    $stmt->bindParam(":pdf", $pdf["name"]);
    $stmt->bindParam(":tiempo", $tiempo);
    $stmt->execute();

    $stmt = $db->prepare("INSERT INTO Pertenece (cod_receta, cod_categoria) VALUES (:cod_receta, :cod_categoria)");
    foreach ($categorias as $cod_categoria) {
        $stmt->bindParam(":cod_receta", $cod_receta);
        $stmt->bindParam(":cod_categoria", $cod_categoria);
        $stmt->execute();
    }

    print "<p>Receta añadida</p>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
