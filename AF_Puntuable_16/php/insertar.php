
<div class='cont2'>
<h2>INSERTAR DATOS</h2>
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

          echo '<form action="" method="post">';

          echo "<table style='' align=center border='2' >";
          $campos=$db->query("show columns from $tabla;")->fetchAll();
          
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
            echo "</tr>";

          }

          echo "<tr>";
          foreach ($campos as $registro) {
            echo "<td><input type='text' name='datos[]'></td>";
          }
          echo "<input type='hidden' name='tabla' value='$tabla'>";
          echo '<td><input class="button" type="submit" name="insertar" value="Insertar"></td>';
          echo "</tr>";

          echo "</table>";
          echo "</form";

        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }

    }

}

function insertar_datos($db, $datos, $tabla) {                                  // Función para insertar filas

  try {

    print("<pre>");
    print_r($datos);
    print("</pre>");

    foreach ($datos as $value) {
      
      if (isset($_POST[$datos[0]])) {

        if (empty($value)) {
          $value = NULL;
        } else {
          $value;
        }

      }

    }

    $campos=$db->query("show columns from $tabla;")->fetchAll();
    $cols1 = [];
    $cols2 = [];

    foreach ($campos as $value) {
      array_push($cols1, $value[0]);
      array_push($cols2, ":$value[0]");
    }
    
    // Preparar
    //$stmt = $db->prepare("INSERT INTO plantas (Codplanta, Nombre, F_plantacion, N_ejemplares) VALUES (:Codplanta, :Nombre, :F_plantacion, :N_ejemplares)");

    /* print_r($cols1);
    print_r($cols2); */

    $primero = implode(", ", $cols1); // Cod_prov, Nombre, edad, ciudad, status
    $segundo = implode(", ", $cols2); // :Cod_prov, :Nombre, :edad, :ciudad, :status
    /* echo $primero;
    echo $segundo; */
    $stmt = $db->prepare("INSERT INTO $tabla (".$primero.") VALUES (".$segundo.")");

    foreach ($campos as $key => $value_cols) {
      /* print($value_cols[0]);
      echo $datos[$key];
      echo "<br>"; */
      $stmt->bindParam(":$value_cols[0]", $datos[$key]);
    }

    $stmt->execute();
    echo "Se han creado las entradas exitosamente";

  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

}

salida_tabla($db);

if (isset($_POST["insertar"]) && isset($_POST["tabla"])) {
  $datos = $_POST["datos"];
  $tabla = $_POST["tabla"];

  insertar_datos($db, $datos, $tabla);

}

?>

</div>
