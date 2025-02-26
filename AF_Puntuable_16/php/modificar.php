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

          echo "<form action='' method='post'>";
          echo "<table style='' align=center border='2' >";
          $campos=$db->query("show columns from $tabla;");
          
          echo "<tr>";
          foreach($campos as $registro) {
            echo "<th>$registro[0]</th>";
          }
          echo "</tr>";
          
          $resultado = $db->query("SELECT * FROM $tabla");
          while ($registro=$resultado->fetch(PDO::FETCH_ASSOC)) {
            foreach($campos as $campo) {
              $id = $registro[$campo[0]];
              echo $id;
            }

            $bool = TRUE;
            
            echo "<tr>";
            foreach($registro as $campo => $valor) {

                if ($bool == TRUE) {
                    echo "<td>";
                    echo "<input style='background-color: rgb(217, 217, 217); cursor: auto;' type='text' value='$valor' name='datos[$campo][]' readonly>";
                    echo "</td>";
                    $bool = FALSE;
                } else {
                    echo "<td>";
                    echo "<input type='text' value='$valor' name='datos[$campo][]'>";
                    echo "</td>";
                }

            }
            echo "<tr>";

          }

          echo "<input type='hidden' name='tabla' value='$tabla'>";
          echo '<tr><td><input class="button" type="submit" name="modificar" value="Modificar"></td></tr>';

          echo "</table>";

        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }

    }

}

function modificar_tabla($db, $tabla, $datos) {

  try {

    echo $tabla;

    print("<pre>");
    print_r($datos);
    print("</pre>");
/* 
    foreach ($datos as $values) {

      foreach ($values as $value) {
        echo $value;
      }
      echo "<br>";
    }
 */
    $campos=$db->query("show columns from $tabla;")->fetchAll();
    $cols1 = [];
    $cols2 = [];

    foreach ($campos as $value) {
      $los_dos = $value[0]. " = :".$value[0]."";
      echo $los_dos;
      echo "<br>";

      array_push($cols1, $los_dos);
      //array_push($cols2, ":$value[0]");
      //$stmt = $db->prepare("UPDATE $tabla SET Nombre = :Nombre, F_plantacion = :F_plantacion, N_ejemplares = :N_ejemplares WHERE Codplanta = :Codplanta");
    }

    $frase = implode(", ", $cols1);
    echo $frase;
    
    $stmt = $db->prepare("UPDATE $tabla SET $frase WHERE ".$cols1[0]);
    
    //$stmt = $db->prepare("UPDATE $tabla SET ".$cols1[$key]." WHERE ".$cols1[0]."");

    // Preparar
    //$stmt = $db->prepare("INSERT INTO plantas (Codplanta, Nombre, F_plantacion, N_ejemplares) VALUES (:Codplanta, :Nombre, :F_plantacion, :N_ejemplares)");
/* 
    print("<pre>");
    var_dump($cols1);
    print("</pre>");
 */
/* 
    print("<pre>");
    print_r($cols2);
    print("</pre>");
 */
    $primero = implode(", ", $cols1); // Cod_prov, Nombre, edad, ciudad, status
    $segundo = implode(", ", $cols2); // :Cod_prov, :Nombre, :edad, :ciudad, :status
/* 
    echo $primero;
    echo "<br>";
    echo $segundo;
 */
    //$stmt = $db->prepare("UPDATE $tabla SET ".$primero." = ".$segundo.",");

    foreach ($campos as $value_cols) {
      echo "<br>";
      foreach ($datos[$value_cols[0]] as $value) {
        /* print($value_cols[0]);

        print("<pre>");
        print_r($value);
        print("</pre>");
 */
        $stmt->bindParam(":".$value_cols[0]."", $value);
      }
    }


    $stmt->execute();
    echo "Se han cambiado las entradas exitosamente";

  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

}

salida_tabla($db);

if (isset($_POST["modificar"])) {
  $tabla = $_POST["tabla"];
  $datos = $_POST["datos"];

  modificar_tabla($db, $tabla, $datos);

}

?>

</div>
