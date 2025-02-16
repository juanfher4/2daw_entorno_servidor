
<div class='cont2'>
<h2>EJECUTAR SQL</h2>

<p>Introduce una sentencia SQL:</p>
<form action="" method="post">
    <label for="">Consulta 1 </label>
    <input type="radio" name="consulta" value="consulta1" id=""> Mostrar todos los proveedores menores de 20 años y cuyo nombre contenga la letra "A" al principio. <br>
    <label for="">Consulta 2 </label>
    <input type="radio" name="consulta" value="consulta2" id=""> Mostrar todos los proveedores que sean de Almería, Granada, Málaga y Jaén. <br>
    <label for="">Consulta 3 </label>
    <input type="radio" name="consulta" value="consulta3" id=""> Mostrar los proveedores que no tengan status asignado y sean de Málaga. <br>
    <label for="">Consulta 4 </label>
    <input type="radio" name="consulta" value="consulta4" id=""> Mostrar el/los proveedores con menor edad. <br>
    <input class="button" type="submit" name="ejecutar" value="Ejecutar">
    <input class="button" type="reset" name="borrar" value="Borrar">
</form>

<?php


function ejecutar_sql($db) {                              // Función para mostrar la tabla

    if (isset($_POST["ejecutar"]) && isset($_POST["consulta"])) {
        $consulta = $_POST["consulta"];

        if ($consulta == "consulta1") {
            $entrada = "SELECT * FROM S WHERE edad < 20 AND nombre LIKE 'A%';";
        } elseif ($consuta == "consulta2") {
            $entrada = "SELECT * FROM S WHERE ciudad IN ('Almeria', 'Granada', 'Malaga', 'Jaen');";
        } elseif ($consulta == "consulta3") {
            $entrada = "SELECT * FROM S WHERE status < null AND ciudad LIKE 'Malaga';";
        } elseif ($consulta == "consulta4") {
            $entrada = "SELECT * FROM S WHERE edad LIKE (SELECT MIN(edad) FROM S);";
        }
    
        try {

            $stmt = $db->prepare($entrada);
            $stmt->execute();

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

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }

}

ejecutar_sql($db);

?>

</div>
