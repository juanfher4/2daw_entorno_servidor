
<?php
echo "<div class='cont2'>";
echo "<h2>CONSULTAR DATOS</h2>";
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

          echo "<table style='' align=center border='2' >";
          $campos=$db->query("show columns from $tabla;");
          
          echo "<tr>";
          foreach($campos as $registro) {
            echo "<th>".$registro[0]."</th>";
          }
          echo "</tr>";
          
          $resultado = $db->query("SELECT * FROM $tabla");
          while ($registro=$resultado->fetch(PDO::FETCH_ASSOC)) {
            
            echo "<tr>";
            foreach($registro as $valor) {
              echo "<td>",$valor,"</td>";
            }
            echo "<tr>";

          }

          echo "</table>";

        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }

    }

}

salida_tabla($db);

echo "</div>";

?>
