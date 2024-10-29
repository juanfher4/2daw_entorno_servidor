<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Numeros primos en PHP">
	<meta name="keywords" content="PHP,Formularios,Javascript,diseño web,primos">
	<title>MOSTRAR NUMEROS PRIMOS</title>
	<link rel="stylesheet" href="./Estilos.css">
	<script language="JavaScript">
	  //La siguiente funcion comprueba que ningún campo del formulario "formulario_operaciones" se quede vacio, y que lo introducido sea UN
	  //números. Y muestra el mensaje adecuado.
	  function valida_envia(){
		//Compruebo que los campos no están vacíos.
		if (document.formulario_operaciones.numero1.value.length==0){
		   alert("Tienes que escribir un número");
		   document.formulario_operaciones.numero1.focus();
		   return 0;
		}
		//Compruebo que lo introducido sea un número y no un caracter o una cadena de caracteres.
		if (isNaN(parseFloat(document.formulario_operaciones.numero1.value))){
			alert("Debes introducir un dato numérico");
			document.formulario_operaciones.numero1.focus();
			return 0;
		}
		//parseFloat(cadena)  --> Donde parseFloat convierte su argumento, la cadena cadena, e intenta retornar un número de punto flotante. 
		//Si encuentra un caracter diferente a un signo (+ o -), un número (0-9), un punto decimal, o un exponente, entonces retorna 
		//el valor hasta antes del punto e ignora este caracter y todos los caracteres sucesivos. Si el primer caracter no puede ser convertido 
		//a un número, retorna "NaN" (no es número).
		//Está también la función parseInt() que convierte a entero una cadena.
		
		//isNaN(Valor_a_probar)  --> La función isNaN evalúa un argumento para determinar si éste no es un número. 
		//Donde "Valor_a_probar" es el valor que desea evaluar. Las funciones parseFloat y parseInt retornan 'NaN' cuando evalúan un valor que no es 
		//un número.
		
		
		//el formulario se envia cuando se haya escrito bien el número pedido.
		document.formulario_operaciones.submit();
	  } 

	</script>
</head>

<body>
	<header id="cabeceraweb">
	
		<h1>INTRODUCE UN NÚMERO PARA MOSTRAR LOS PRIMOS ENTRE 1 Y DICHO NÚMERO:</h1>
	</header>
	<section id="seccionPrincipal">

		<form name='formulario_operaciones' action='' method='post'>
			<table>
				<tr>
					<td>Escribe un número  : </td>
					<td><input type='text' name='numero1' value='' size=15></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="button" value="Mostrar" onclick="valida_envia()">
						<input type="reset" value="Borrar">
					</td>
				</tr>
			</table>
			<br /><br />
		</form>
		<!-- Utilizando la validación propia de HTML5 en el campo "numero1" no necesitaríamos de la validación
				en JavaScript. Solo habría que poner el campo "numero1" de la siguiente forma:
				<input type="number" name="numero1" id="numero1" min="1" placeholder="Introduce un número mayor o igual a 1">-->
		
		
		<?php
			/*Ahora muestro los resultados, pero solo cuando se ha pulsado el botón "Mostrar" del formulario*/
			if (isset($_POST['numero1'])) {
				$num1=$_POST['numero1'];
				
				function es_primo($numero){
					//Comprueba si el número que le pasamos por argumento es primo o no.
					//Devuelve 0 si no es primo y 1 en caso contrario.
					$divisor=0;
					
					for($i=1;$i<=$numero;$i++){
						if($numero%$i==0){ /* $i es un divisor del número pasado por parámetro */
							$divisor++;
						}
					}
					if ($divisor==2 || $numero==1){
						return 1;  /*Devolverá 1 si el número es primo. */
					}
					else{
						return 0; /*Devolverá 0 si el número no es primo */
					}
					
				}

				function mostrar($valores,$num1){
					//Muestra el array $valores por pantalla, separando los números por comas
					echo ("Los nÚmeros primos entre el 1 y $num1 son: <br><br>");
					for($i=0;$i<count($valores)-1;$i++){
						print($valores[$i].",");
					}
					print($valores[count($valores)-1]);
	
				}
	
				function cogerValores($tope){
					//Introduce en un array los números primos hasta el valor $tope
					//Devuelve el array con los números introducidos.
					$lista=[];
					$posicion=0;
					
					for ($i=0;$i<=$tope;$i++){
						if(es_primo($i)){ 
							$lista[$posicion]=$i;
							$posicion++;
						}
					}
					return $lista;
				}
	
				$valores=cogerValores($num1);
				mostrar($valores,$num1);
				
				
			}
		?>
	
	</section>
	<footer id="Pie_principal">
		<br><br><br><br><br>
		<small><p> Pie de p&aacute;gina </p></small>
		<p>Ejercicios PHP</p>
		<address>iesabderainformatica@gmail.com</address>
	</footer>
</body>
</html>
