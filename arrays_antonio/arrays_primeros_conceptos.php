<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8" />
	<meta name="description" content="Matrices en PHP"/>
	<meta name="keywords" content="PHP,diseño web,arrays,matrices"/>
	<title>PRIMEROS CONCEPTOS DE ARRAYS</title>
	<link rel="stylesheet" href="./Estilos.css"/>

</head>

<body>
	<header id="cabeceraweb">
	
		<h1>INTRODUCCIÓN A ARRAYS</h1>
	</header>
	
	<section id="seccionPrincipal">
		<?php
			//Aquí ponemos nuestro código en PHP. Podríamos tener varias secciones de este tipo en el documento.
			
			/*******************************************/
			//Ejemplo de creación de Arrays:
			/*******************************************/
			$dias= array("Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo"); //Usando la palabra reservada "array", estoy
																							//inicializando con una serie de valores.
			$temperaturas=[23,14,31,10];//También puedo crear e inicializar arrays usando la forma corta,
										//usando simplemente corchetes y los valores dentro.
			$vacio=array(15); //Creo un array vacío con 15 posiciones. Eso se hace poniendo un solo valor.
			$datos=array(); //Creo un array vacío.
			$datos=[];//Creo un array vacío.
			$ejemplo=["clave1"=>"valor1","clave2"=>"valor2","clave3"=>3]; //Array asociativo.
			$ejemplo2=["clave1"=>"valor1","clave2"=>[30,40],"clave3"=>array(60,70,80)];
			
			
			/*******************************************/
			//Visualización de los arrays:
			/*******************************************/
			echo "Segundo valor del array \$dias:<br>  $dias[1]"; //Muestra el valor que haya en la posición 1 del array $dias.
			echo "<br>";
			echo "Primer valor de array \$temperaturas:<br> $temperaturas[0]"; //Muestra el valor de la posición 0 del array $temperaturas.
			echo "<br><br><br>";
			echo "<div id='codigo'>";
			echo "Visualización de arrays de forma estructurada: <br><br>";
			echo "<pre>";
			echo "ARRAY \$dias:<br><br>";
			var_dump($dias); //Esta función muestra los valores de tipos de datos compuestos,
							//como los arrays. Los muestra de forma estructurada, es decir,
							//Que muestra no solo sus valores, sino la posición en el array, el tipo de dato, etc.
							//Es una función muy útil para esto.
			echo "<br>";
			echo "ARRAY \$temperaturas:<br><br>";
			var_dump($temperaturas);
			echo "ARRAY \$ejemplo:<br><br>";
			print_r($ejemplo);  //Función, que al igual que var_dump() también muestra de forma estructurada un tipo de dato 
								//compuesto como es un array. Solo muestra los índices y los valores.
			echo "<br><br><br>";
			echo "ARRAY \$ejemplo2:<br><br>";
			print_r($ejemplo2);
			echo "</pre>";
			echo "</div>";
							
		?>
		
	</section>
	<footer id="Pie_principal">
		<br><br><br><br><br>
		<small><p> Pie de p&aacute;gina </p></small>
		<p>E-mail de contacto con el profesor: </p>
		<address>iesabderainformatica@gmail.com</address>
	</footer>
</body>
</html>
