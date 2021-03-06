<?php
echo "<!Doctype HTML>
	<html lang='es'>
	<head>		
		<title>R&iacute;o Cuarto Taxi</title>
		<link rel='shortcut icon' href='imagenes/icon.ico' type='image/x-icon'/> 
		<meta charset='UTF-8'>
		<meta name=​'viewport' content=​'width=device-width, initial-scale=1.0'>
		<meta name='description' content='R&iacute;o Cuarto Taxi se trata de una aplicaci&oacute;n sencilla y f&aacute;cil de para solicitar taxis o remises en la ciudad de R&iacute;o Cuarto, C&oacute;rdoba, Argentina.'>
		<meta name='keywords' contenct='HTML5, CSS3, Javascript, PHP'>			
		<link rel='stylesheet' href='css/home.css'>
		<script type='text/javascript' src='http://maps.googleapis.com/maps/api/js?key=AIzaSyCWcDSkf5DDRXiMp-jD-BcFdFEDRHycSeY&sensor=false&region=AR&language=es'></script>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
		<script type='text/javascript' src='js/home.js'></script>";

	include "conexion.php";
			if(isset($_POST['origen'])) {
				mysqli_begin_transaction($con);
				$origen = $_POST['origen'];
				$empresa = $_POST['empresa'];
				$lat_origen = $_POST['lat_origen'];
				$lng_origen = $_POST['lng_origen'];
				$nropasajeros = $_POST['nropasajeros'];
				$estado = "pendiente";
				$queryValores = array();
				$query = "INSERT INTO pedido (lat_origen,lng_origen,direccion_origen,pasajeros,estado,empresa,fumador,conversador";
				if(isset($_POST['destino'])){
					$destino = $_POST['destino'];
					if ($destino != ""){
					$lat_destino = $_POST['lat_destino'];
					$lng_destino = $_POST['lng_destino'];
					$queryValores[0] = $lat_destino;
					$queryValores[1] = $lng_destino;
					$queryValores[2] = $destino;
					$query = $query . ",lat_destino,lng_destino,direccion_destino";
					}
				}
				if(isset($_POST['fumador'])){
					$fumador = 1;
				} else { 
					$fumador = 0;
				}
				if(isset($_POST['conversador'])){
					$conversador = 1;
				} else {
					$conversador = 0;	
				}
				$query = $query . ") VALUES ( '$lat_origen','$lng_origen','$origen','$nropasajeros','$estado','$empresa','$fumador','$conversador'";
				for ($i = 0; $i < $count = count($queryValores); $i++) {
					$aux = $queryValores[$i];
					$query = $query . ",'$aux'";
				}
				$query = $query . ");";
				$rec = mysqli_query($con,$query);
				echo "<script>alert('Muchas gracias por utilizar este servicio, en brebedad responderemos su pedido');</script>";															
			 };

echo "</head>
	<body onload='initialize()'>		
		<div id='agrupar'>
		<nav id='menu'>
			<ul>
				<li><figure><img src='imagenes/logo64.png'></figure></li>
				<li>Inicio</li>
				<li><a href='acercaDe.html'>Acerca de</a></li>
				<li><a href='contacto.html'>Contacto</a></li>
			</ul>  
		</nav>
		<section id='columna'>
			<form action='' id='formulario' method='post'>				
        		<p>Direcci&oacute;n de origen</p>
        		<input type='text' id='origen' name='origen'/> <br><br>
        		<p>Direcci&oacute;n de destino (Opcional)</p>
        		<input type='text' id='destino' name='destino'/><br><br>
        		<input type='button' value='Buscar Direccion' onclick='codeAddress()' id='botonBuscar'><br><br>
        		<p>Empresa: 
        		   		<select name='empresa' id='empresa'>
        		   		<option selected='selected' value='jacinto'>Al azar</option>
						<option value='empresa1'>Empresa 1</option>
						<option value='empresa2'>Empresa 2</option>
						<option value='empresa3'>Empresa 3</option>
						</select >
				</p> <br>
        		<p>Numero de pasajeros
        		<input type='text' size='2' id='pasajeros' name='nropasajeros'/></p><br>
        		<p>Preferencias (Opcional)</p><br>
        		<p>Fumador&nbsp; &nbsp;<input type='checkbox' name='fumador' value='fumador'></p><br>
				<p>Conversador&nbsp; &nbsp;<input type='checkbox' name='conversador' value='conversador'></p><br>
				<input type='hidden' id='lat_origen' name='lat_origen' value=''>
				<input type='hidden' id='lng_origen' name='lng_origen' value=''>
				<input type='hidden' id='lat_destino' name='lat_destino' value=''>
				<input type='hidden' id='lng_destino' name='lng_destino' value=''>
        		<input type='button' value='Pedir' onclick='validarDatos()' id='botonBuscar'><br><br>
        	</form>
        	<p style='text-align: center'>
        		<a href='https://www.facebook.com/TecProSoftware'><img src='imagenes/facebook.png'></a>  
			</p>			
			<br>	
		</section>	
		</div>
		<div id='map_canvas' name='map_canvas'></div>
		<div id='map_canvas2' name='map_canvas2'></div>";
		if(isset($_POST['origen'])) {
			echo "<script type='text/javascript'>  window.onload =  window.setInterval(function() { $('#map_canvas2').append($('<div>').load('auxindes.php?id=".mysqli_insert_id($con)."'));}, 5000);</script>";
			mysqli_commit($con);
		}
	echo "</body>
</html>";
?>