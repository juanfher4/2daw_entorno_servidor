<div class='cont2'>
<h2>MODIFICAR DATOS</h2>
<form action="" method="post">
  <select name="salidaTabla" id="">
      <option value="S" name="S">Proveedores</option>
      <option value="P" name="P">Piezas</option>
      <option value="SP" name="SP">Proveedores y piezas</option>
  </select>
  <input class="button" type="submit" name="consultar" value="Consultar">
</form>

<?php

function salida_tabla($db) {                              // Función para mostrar la tabla

    if (isset($_POST["salidaTabla"])) {
        $tabla = $_POST["salidaTabla"];
        echo "Tabla: $tabla";
    
        try {

          echo "<table style='' align=center border='2' >";
          $campos=$db->query("show columns from $tabla;");
          
          echo "<tr>";
          foreach($campos as $registro) {
            echo "<th>$registro[0]</th>";
          }
          echo "</tr>";
          
          $resultado = $db->query("SELECT * FROM $tabla");
          while ($registro=$resultado->fetch(PDO::FETCH_ASSOC)) {

            $bool = TRUE;
            
            echo "<tr>";
            foreach($registro as $campo => $valor) {

                if ($bool == TRUE) {
                    echo "<td>";
                    echo "<input style='background-color: rgb(217, 217, 217); cursor: auto;' type='text' value='$valor' readonly>";
                    echo "</td>";
                    $bool = FALSE;
                } else {
                    echo "<td>";
                    echo "<input type='text' value='$valor'>";
                    echo "</td>";
                }

            }
            echo "<tr>";

          }

          echo '<tr><td><input class="button" type="submit" name="modificar" value="Modificar"></td></tr>';

          echo "</table>";

        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }

    }

}

salida_tabla($db);

if (isset($_POST["modificar"])) {
           
}

?>

</div>
