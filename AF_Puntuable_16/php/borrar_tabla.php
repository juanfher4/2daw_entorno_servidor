
<?php
echo "<div class='cont2'>";
echo "<h2>BORRAR TABLA</h2>";
echo '
<form action="" method="post">
    <select name="borrarTabla" id="">
        <option value="S" name="S">Proveedores</option>
        <option value="P" name="P">Piezas</option>
        <option value="SP" name="SP">Proveedores y piezas</option>
    </select>
    <input class="button" type="submit" name="borrar_tabla" value="Borrar">
</form>
';

function borrar_tabla($db) {                              // Función para mostrar la tabla

    if (isset($_POST["borrarTabla"])) {
        $tabla = $_POST["borrarTabla"];
    
        try {

            $stmt = $db->prepare("DROP TABLE $tabla");
            $stmt->execute();

            echo "Se ha borrado la tabla: $tabla <br>";

        } catch (PDOException $e) {
          echo "Error: la tabla tiene una clave ajena que apunta a otra tabla.";
        }

    }

}

borrar_tabla($db);

echo "</div>";

?>
