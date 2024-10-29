<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Calculos matemáticos">
	<meta name="keywords" content="PHP,Formularios,Javascript,diseño web">
    <title>AF1.1</title>
    <link rel="stylesheet" href="styles.css">
    <script language="Javascript">
        function valida_envia() {
            if(document.formulario_operaciones.nombre.value.length==0){
                alert("Tienes que escribir un nombre.");
                // Con focus haces que el cursor vaya a donde pongas
                document.formulario_operaciones.nombre.focus();
                return 0;
            }
            
            if(document.formulario_operaciones.contraseña.value.length==0){
                alert("Tienes que escribir una contraseña.");
                // Con focus haces que el cursor vaya a donde pongas
                document.formulario_operaciones.contraseña.focus();
                return 0;
            }
            
            
            document.formulario_operaciones.submit();
        }
    </script>
  </head>
  <body>
    <section>
        <form name="formulario_operaciones" action="mostrar.php" method="post">
            <table>
				<tr>
					<td>Escribe un nombre: </td>
					<td><input type="text" name="nombre" value="" size=15></td>
				</tr>
				<tr>
					<td>Escribe una contraseña: </td>
					<td><input type="password" name="contraseña" value="" size=15></td>
				</tr>
				<tr>
                    <td>Elige una marca de coche: </td>
                    <td>
                        <input type="radio" id="marca1" name="marca" value="Audi"> Audi
                        <input type="radio" id="marca1" name="marca" value="Opel"> Opel
                        <input type="radio" id="marca1" name="marca" value="Ferrari"> Ferrari
                    </td>
                </tr>
				<tr>
                    <td>Comunidad/es Autónoma/s: </td>
                    <td>
                        <input type="checkbox" id="andalucia" name="comunidades[]" value="Andalucía"> Andalucía
                        <input type="checkbox" id="aragon" name="comunidades[]" value="Aragón"> Aragón
                        <input type="checkbox" id="baleares" name="comunidades[]" value="Baleares"> Baleares
                        <input type="checkbox" id="canarias" name="comunidades[]" value="Canarias"> Canarias
                        <input type="checkbox" id="cantabria" name="comunidades[]" value="Cantabria"> Cantabria
                        <input type="checkbox" id="castilla_la_mancha" name="comunidades[]" value="Castilla-La_Mancha"> Castilla-La Mancha
                        <input type="checkbox" id="castilla_y_leon" name="comunidades[]" value="Castilla_y_Leon"> Castilla y León
                        <input type="checkbox" id="cataluña" name="comunidades[]" value="Cataluña"> Cataluña
                        <input type="checkbox" id="madrid" name="comunidades[]" value="Comunidad_de_Madrid"> Comunidad de Madrid
                        <input type="checkbox" id="navarra" name="comunidades[]" value="Navarra"> Navarra
                        <input type="checkbox" id="comunidad_valenciana" name="comunidades[]" value="Comunidad_Valenciana"> Comunidad Valenciana
                        <input type="checkbox" id="extremadura" name="comunidades[]" value="Extremadura"> Extremadura
                        <input type="checkbox" id="galicia" name="comunidades[]" value="Galicia"> Galicia
                        <input type="checkbox" id="pais_vasco" name="comunidades[]" value="País Vasco"> País Vasco
                        <input type="checkbox" id="asturias" name="comunidades[]" value="Principado_de_Asturias"> Principiado de Asturias
                        <input type="checkbox" id="murcia" name="comunidades[]" value="Región_de_Murcia"> Región de Murcia
                        <input type="checkbox" id="rioja" name="comunidades[]" value="La_Rioja"> La Rioja
                    </td>
                </tr>
				<tr>
                    <td>Animal: </td>
                    <td>
                        <select id="animal" name="animal">
                            <option value="Gato">Gato</option>
                            <option value="Perro">Perro</option>
                            <option value="Conejo">Conejo</option>
                            <option value="Tigre">Tigre</option>
                            <option value="Lechuza">Lechuza</option>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>Color de fondo: </td>
                    <td>
                        <input type="radio" name="color" value="red"> Rojo
                        <input type="radio" name="color" value="blue"> Azul
                        <input type="radio" name="color" value="yellow"> Amarillo
                    </td>
                </tr>
				<tr>
                    <td>Comentario: </td>
                    <td><textarea id="comentario" name="comentario" rows="10" cols="50" placeholder="Escribe" required></textarea></td>
                </tr>
				<tr>
                    <td>
                        <input type="hidden" name="oculto" value="oculto">
                    </td>
                </tr>
				<tr>
					<td colspan="2" align="center">
						<input class="button" type="button" value="Calcular" onclick="valida_envia()">
						<input class="button" type="reset" value="Borrar">
					</td>
				</tr>
			</table>
        </form>
    </section>
  </body>
</html>
