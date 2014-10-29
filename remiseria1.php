<!Doctype HTML>
<html lang="es">
	<head>
		<link rel="stylesheet" href="css/remiserias.css">	
		<script type="text/javascript" src="js/formOpinar.js"> </script>
	</head>
	<body onload="inicializar()">
		<div>	
			<?php 
					session_start();
					error_reporting(0);			
					$db_hostname = 'localhost';
					$db_database = 'taxi';
					$db_username = 'root';
					$db_password= '';
					
					$con = mysql_connect($db_hostname,$db_username,$db_password); 
					mysql_select_db($db_database,$con); 

					if(isset($_POST['preferOpinion'])) {				
						$preferOpinion = $_POST['preferOpinion'];
						$puntOpinion = $_POST['puntOpinion'];
						$AutosOpinion = $_POST['AutosOpinion'];
						$PrecioOpinion = $_POST['PrecioOpinion'];
						$opinionOpinion = $_POST['opinionOpinion'];
						$nombreOpinion = $_POST['nombreOpinion'];
						$leyOpinion = $_POST['leyOpinion'];						
						$query = "INSERT INTO opiniones (`preferencias`,`puntualidad`,`autos`,`precio`,`ley`,`opinion`,`nombre`,`empresa`) VALUES ('$preferOpinion','$puntOpinion','$AutosOpinion','$PrecioOpinion','$leyOpinion','$opinionOpinion','$nombreOpinion','empresa ejemplo');";
						$rec = mysql_query($query);
						if ($rec){
							echo "TODO PIOLA";
						} ELSE {
							echo mysql_error();
						}
					}

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
			<section id="titulo">			
			<img src="imagenes/logoramallo.jpg">
			</section>		
			<section id="datos">
			<p id="nombreEmpresa">Remiseria 1</p>
			<p>Telefono: 4545454</p>
			<p>Direccion: Ejemplo 2104 (Banda Norte)</p>
			<p><input type="button" id="btnOpinar" onclick="opinar()" value="Opinar"></p>	
			</section>
			<section id="puntajes">
			<p>Preferencias: <?php echo round($preferencias/$filas,1);?></p>	
			<p>Puntualidad: <?php echo round($puntualidad/$filas,1);?></p>	
			<p>Autos: <?php echo round($autos/$filas,1);?></p>	
			<p>Precio: <?php echo round($precio/$filas,1);?></p>	
			<p>Respeto de las leyes de transito: <?php echo round($leyes/$filas,1);?></p>			
			</section>
			<section id="formSection">
			<form action="" id="formularioOpinion" method="post">
				<p>Nombre: <input type="text" size="1" id="nombreOpinion" name="nombreOpinion"/></p>				
        		<p>*Preferencias:<input type="text" size="1" id="preferOpinion" name="preferOpinion"/></p>
        		<p>*Puntualidad:<input type="text" size="1" id="puntOpinion" name="puntOpinion"/></p>
        		<p>*Autos:<input type="text" size="1" id="AutosOpinion" name="AutosOpinion"/></p>
        		<p>*Precio:<input type="text" size="1" id="PrecioOpinion" name="PrecioOpinion"/></p>
        		<p>*Respeto de las leyes de transito:<input type="text" size="1" id="leyOpinion" name="leyOpinion"/></p>
        		<p>Opinion: (Maximo 300 caracteres)<textarea id="opinionOpinion"  rows="5" cols="60" name="opinionOpinion"> </textarea></p>
        		<input type="button" value="Enviar" onclick="validarDatos()" id="botonBuscar">
        		<p>* Por favor complete con numeros del 1 al 10</p>
			</form>		
			</section>	
			<section id="opinones">
			<p id="nombreEmpresa">Opiniones:</p>
			<?php
				for ($i = count($opiniones)-1; $i >= 0; $i--) {
					$aux = $opiniones[$i];
					$aux2 = $nombres[$i];
					echo "<p class='bordeTop'>".$aux2.":</p>";
					echo "<p>".$aux."</p>";
				}	
			?>
			</section>
		</div>
	</body>
</html>			