<!Doctype HTML>
<html lang="es">
	<head>
		<link rel="stylesheet" type="text/css" href="css/remiserias.css">
	</head>
	<body>
		<div>	
			<?php 
					session_start();			
					$db_hostname = 'localhost';
					$db_database = 'taxi';
					$db_username = 'root';
					$db_password= '';
					
					$con = mysql_connect($db_hostname,$db_username,$db_password); 
					mysql_select_db($db_database,$con); 

					$query = "SELECT * FROM opiniones where empresa='empresa ejemplo';";
					$result = mysql_query($query);
					$preferencias = 0;
					$puntualidad = 0;
					$autos = 0;
					$leyes = 0;
					$precio = 0;
					$opiniones = array();
					$nombres = array();
					$filas = mysql_num_rows($result);
					$i = 0;
					while($row = mysql_fetch_array($result)){
						$preferencias = $preferencias + $row['preferencias'];
						$puntualidad = $puntualidad + $row['puntualidad'];
						$autos = $autos + $row['autos'];
						$leyes = $leyes + $row['ley'];
						$precio = $precio + $row['precio'];
						$opiniones[$i] = $row['opinion'];
						$nombres[$i] = $row['nombre'];
						$i = $i+1;
					}
			?>		
			<section id="datos">
			<p id="titulo">REMISERIA 1</p>
			<img src="">
			<p>Telefono: 4545454</p>
			<p>Direccion: Ejemplo 2104 (Banda Norte)</p>
			</section>
			<section id="puntajes">
			<p>Preferencias: <?php echo ($preferencias/$filas);?></p>	
			<p>Puntualidad: <?php echo ($puntualidad/$filas);?></p>	
			<p>Autos: <?php echo ($autos/$filas);?></p>	
			<p>Precio: <?php echo ($precio/$filas);?></p>	
			<p>Respeto de las leyes de transito: <?php echo ($leyes/$filas);?></p>	
			</section>
			<p><input type="button" value="Opinar"></p>
			<section id="opinones">
			<p>Opiniones:</p>
			<?php
				for ($i = 0; $i < $count = count($opiniones); $i++) {
					$aux = $opiniones[$i];
					$aux2 = $nombres[$i];
					echo "<p>Nombre: ".$aux2."</p>";
					echo "<p>".$aux."</p>";
				}	
			?>
			</section>
		</div>
	</body>
</html>			