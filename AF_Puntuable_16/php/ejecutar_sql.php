
<div class='cont2'>
<h2>EJECUTAR SQL</h2>

<p>Introduce una sentencia SQL:</p>
<form action="" method="post">
    <textarea name="texto" id="" cols="30" rows="10"></textarea><br>
    <input class="button" type="submit" name="ejecutar" value="Ejecutar">
    <input class="button" type="reset" name="borrar" value="Borrar">
</form>

<?php


function ejecutar_sql($db) {                              // Función para mostrar la tabla

    if (isset($_POST["texto"])) {
        $texto = $_POST["texto"];
        echo $texto;
        //$tabla = $stmt->fetchAll(PDO::FETCH_ASSOC);

        
    
        try {

            $stmt = $db->prepare($texto);
            $stmt->execute();

        } catch (PDOException $e) {
            echo "Error: " ;
        }

    }

}

ejecutar_sql($db);

?>

</div>
