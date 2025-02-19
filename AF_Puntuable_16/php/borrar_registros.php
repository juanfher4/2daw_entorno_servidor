
<?php
echo "<div class='cont2'>";
echo "<h2>BORRAR REGISTROS</h2>";
echo '
<form action="" method="post">
  <select name="salidaTabla" id="">
      <option value="S" name="S">Proveedores</option>
      <option value="P" name="P">Piezas</option>
      <option value="SP" name="SP">Proveedores y piezas</option>
  </select>
  <input class="button" type="submit" name="consultar" value="Consultar">
</form>
';

function salida_tabla($db) {                              // Función para mostrar la tabla

    if (isset($_POST["salidaTabla"])) {
        $tabla = $_POST["salidaTabla"];
        echo "Tabla: $tabla";
    
        try {

            echo '<form action="" method="post">';

            echo "<table>";
            $campos=$db->query("show columns from $tabla;");
            
            echo "<tr>";
            foreach($campos as $registro) {
                echo "<th>".$registro[0]."</th>";
            }
            echo "</tr>";

            $i = 1;

            $resultado = $db->query("SELECT * FROM $tabla");
            while ($registro=$resultado->fetch(PDO::FETCH_ASSOC)) {
                
                /* print_r($registro); */
                echo "<tr>";
                foreach($registro as $valor) {
                echo "<td>",$valor,"</td>";
                }
                echo '<td><input type="checkbox" id="" name="filas[]" value="'.$tabla.$i.'"></td>';
                echo "<tr>";

                $i++;

            }

            echo "<tr>";
            echo "<td>Borrar todos<td>";
            echo '<td><input type="checkbox" id="borrar_todos" name="borrar_todos" value="'.$tabla.'"><td>';
            echo "</td>";

            echo "<input type='hidden' name='tabla' value='$tabla'>";
            echo '<tr><td><input class="button" type="submit" name="borrar" value="Borrar"></td></tr>';

            echo "</table>";
            echo "</form>";

        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }

    }

}

function borrar_registros($filas, $tabla, $db) {

    echo "borrar_registros ";
    print_r($filas);

    try {

        $campos=$db->query("show columns from $tabla;")->fetchAll();
        $id = $campos[0][0];
        print($id);

        foreach ($filas as $value) {
            $stmt = $db->prepare('delete from '.$tabla.' where '.$id.' = "'.$value.'";');
            $stmt->execute();
        }
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
}

function borrar_todos_registros($borrar_todos, $db) {

    try {

        $stmt = $db->prepare("delete from $borrar_todos");
        $stmt->execute();
        
        echo "Se han borrado las filas de la tabla: $borrar_todos <br>";
    
    } catch (PDOException $e) {
        echo "ERROR: no se pueden borrar los registros porque su clave a punta a otra ajena en la tabla $borrar_todos.";
    }
    
}

salida_tabla($db);

if (isset($_POST["borrar"])) {

    if (isset($_POST["filas"]) && isset($_POST["tabla"])) {
        $filas = $_POST["filas"];
        $tabla = $_POST["tabla"];
        
        borrar_registros($filas, $tabla, $db);

    } elseif (isset($_POST["borrar_todos"])) {
        $borrar_todos = $_POST["borrar_todos"];

        borrar_todos_registros($borrar_todos, $db);

    }

}

echo "</div>";

?>
