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
					include "conexion.php";
					$nombreEmpresa = $_REQUEST['empresa'];
					if(isset($_POST['preferOpinion'])) {				
						$preferOpinion = $_POST['preferOpinion'];
						$puntOpinion = $_POST['puntOpinion'];
						$AutosOpinion = $_POST['AutosOpinion'];
						$PrecioOpinion = $_POST['PrecioOpinion'];
						$opinionOpinion = $_POST['opinionOpinion'];
						$nombreOpinion = $_POST['nombreOpinion'];
						$leyOpinion = $_POST['leyOpinion'];						
						$query = "INSERT INTO opiniones (`preferencias`,`puntualidad`,`autos`,`precio`,`ley`,`opinion`,`nombre`,`empresa`) VALUES ('$preferOpinion','$puntOpinion','$AutosOpinion','$PrecioOpinion','$leyOpinion','$opinionOpinion','$nombreOpinion','".$nombreEmpresa."');";
						$rec = mysqli_query($con,$query);
					}

					$query = "SELECT * FROM opiniones where empresa='".$nombreEmpresa."';";
					$result = mysqli_query($con,$query);
					$preferencias = 0;
					$puntualidad = 0;
					$autos = 0;
					$leyes = 0;
					$precio = 0;
					$opiniones = array();
					$nombres = array();
					$filas = mysqli_num_rows($result);
					$i = 0;
					while($row = mysqli_fetch_object($result)){
						$preferencias = $preferencias + $row->preferencias;
						$puntualidad = $puntualidad + $row->puntualidad;
						$autos = $autos + $row->autos;
						$leyes = $leyes + $row->ley;
						$precio = $precio + $row->precio;
						$opiniones[$i] = $row->opinion;
						$nombres[$i] = $row->nombre;
						$i = $i+1;
					}						
			echo "<section id='titulo'>";
			echo "<img src='imagenes/".$nombreEmpresa.".jpg'>
			</section>		
			<section id='datos'>";
			$query = "SELECT * FROM empresa where nombre='".$nombreEmpresa."';";
			$rec = mysqli_query($con,$query);
			while($row = mysqli_fetch_object($rec)){
				echo "<p id='nombreEmpresa'>".$nombreEmpresa."</p>
				<p>Telefono: ".$row->telefono."</p>
				<p>Direccion: ".$row->direccion."</p>
				<p><input type='button' id='btnOpinar' onclick='opinar()' value='Opinar'></p>";
			}
			?>	
			</section>
			<section id="puntajes">
			<p>Preferencias: <?php echo round($preferencias/$filas,1);?></p>	
			<p>Puntualidad: <?php echo round($puntualidad/$filas,1);?></p>	
			<p>Autos: <?php echo round($autos/$filas,1);?></p>	
			<p>Precio: <?php echo round($precio/$filas,1);?></p>	
			<p>Respeto de las leyes de transito: <?php echo round($leyes/$filas,1);?></p>			
			</section>
			<section id="formSection" name="formSection">
			<?php echo "
				<form action='remiseria1.php?empresa=".$nombreEmpresa."' id='formularioOpinion' method='post'><br>";?>
				<p class="noMargin">Nombre: <input class="noMargin" type="text" id="nombreOpinion" name="nombreOpinion"/></p><br><br>			
        		<p class="noMargin">*Preferencias: <input class="noMargin" type="text" size="1" id="preferOpinion" name="preferOpinion"/></p><br><br>	
        		<p class="noMargin">*Puntualidad: <input class="noMargin" type="text" size="1" id="puntOpinion" name="puntOpinion"/></p><br><br>
        		<p class="noMargin">*Autos: <input class="noMargin" type="text" size="1" id="AutosOpinion" name="AutosOpinion"/></p><br><br>	
        		<p class="noMargin">*Precio: <input class="noMargin" type="text" size="1" id="PrecioOpinion" name="PrecioOpinion"/></p><br>	<br>
        		<p class="noMargin">*Respeto de las leyes de transito: <input class="noMargin" type="text" size="1" id="leyOpinion" name="leyOpinion"/></p><br>
        		<p>Opinion: (Maximo 300 caracteres)<textarea wrap="hard" id="opinionOpinion"  rows="5" cols="60" name="opinionOpinion"  maxlength="300"> </textarea></p>
        		<p><input class="noMargin" type="button" value="Cancelar" onclick="inicializar()" id="botonBuscar">  <input class="noMargin" type="button" value="Enviar" onclick="validarDatos()" id="botonBuscar"></p>
        		<p>* Por favor complete con numeros del 1 al 10</p>        		
			</form>		
			</section>	
			<section id="opinones" scrolling="yes">
			<p id="nombreEmpresa">Opiniones:</p>
			<?php
				for ($i = count($opiniones)-1; $i >= 0; $i--) {
					$aux = $opiniones[$i];
					$aux2 = $nombres[$i];
					echo "<p class='bordeTop'>".$aux2.":</p>";
					echo "<p class='noMargin'>".$aux."</p>";
				}	
			?>
			</section>
		</div>
	</body>
</html>			