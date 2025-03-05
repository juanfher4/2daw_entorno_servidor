<section class="py-5 text-center container">
    <h1>Recetas de Cocina</h1>
    <form method="post">
        <button class="btn btn-dark" name="insertar">Insertar Receta</button>
        <button class="btn btn-dark" name="filtrar">Filtrar Recetas</button>
    </form>
    </section>

    <div class="container">
    <?php

    if (isset($_POST['insertar'])) {
        print "
        <div class='cont_form mb-5'>
            <h4>INSERTAR NUEVA RECETA</h4>
            <form method='post' enctype='multipart/form-data'>
                <label>Nombre:</label><br>
                <input type='text' name='nombre' class='form-control' required><br>

                <label>Foto:</label><br>
                <input type='file' name='foto' class='form-control' accept='.jpg, .jpeg, .png, .gif' required><br>

                <label>Descripción:</label><br>
                <textarea name='descripcion' class='form-control' rows='5' required></textarea><br>

                <label>Archivo PDF:</label><br>
                <input type='file' name='pdf' class='form-control' accept='.pdf' required><br>

                <label>Categorías:</label><br>";
                
                $stmt = $db->query("SELECT cod_categoria, nombre FROM Categoria");
                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $nombre = $fila["nombre"];
                    $cod_categoria = $fila["cod_categoria"];
                    echo "<input type='checkbox' name='tipo[]' value='" . $cod_categoria . "'> " . $nombre . "<br>";
                }
                print"
                <br>
                <label>Tiempo:</label><br>
                <input type='number' name='tiempo' class='form-control' required><br>

                <button class='btn btn-dark' name='insertar2'>Guardar Receta</button>
            </form>
        </div>";
    }

    if (isset($_POST['insertar2'])) {
        
        include "insertar.php";

    }

    if (isset($_POST['filtrar'])) {
        print "
        <div class='cont_form mb-5'>
            <h4>FILTRAR RECETAS</h4>
            <form method='post'>
            <label>Filtrar por Nombre:</label><br>
            <input type='text' name='nombre_filtrar' class='form-control' placeholder='Escribe el nombre'><br>

            <label>Filtrar por Categoría:</label><br>";
                
            $stmt = $db->query("SELECT nombre FROM Categoria");
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $nombre = $fila["nombre"];
                echo "<input type='checkbox' name='tipo[]' value='" . $nombre . "'> " . $nombre . "<br>";
            }
            print"
            <br>
            <button class='btn btn-dark' name='filtrar_tipo'>Filtrar</button>
            </form>
        </div>";
    }

    if (isset($_POST['filtrar_tipo']) || isset($_POST['nombre_filtrar'])) {

        include "filtrar.php";
        
    } else {
        
        include "mostrar_recetas.php";

    }
    ?>
    </div>
</div>
