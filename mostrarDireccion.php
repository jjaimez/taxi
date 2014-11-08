<?php
echo "<!Doctype HTML>
	<html lang='es'>
	<head>		
		<title>R&iacute;o Cuarto Taxi</title>
		<link rel='shortcut icon' href='imagenes/icon.ico' type='image/x-icon'/> 
		<meta charset='UTF-8'>
		<meta name=​'viewport' content=​'width=device-width, initial-scale=2.0'>
		<meta name='description' content='R&iacute;o Cuarto Taxi se trata de una aplicaci&oacute;n sencilla y f&aacute;cil de para solicitar taxis o remises en la ciudad de R&iacute;o Cuarto, C&oacute;rdoba, Argentina.'>
		<meta name='keywords' contenct='HTML5, CSS3, Javascript, PHP'>
		<script type='text/javascript' language='javascript' src='lytebox.js'></script>
		<link rel='stylesheet' href='lytebox.css' type='text/css' media='screen' />	
		<script type='text/javascript' src='http://maps.googleapis.com/maps/api/js?key=AIzaSyCWcDSkf5DDRXiMp-jD-BcFdFEDRHycSeY&sensor=false&region=AR&language=es'></script>  
	</head>	
	<body onload='initialize()'>";
		$latO = $_REQUEST['latO'];
		$lngO = $_REQUEST['lngO'];
		$latD = $_REQUEST['latD'];
		$lngD = $_REQUEST['lngD'];
			echo "<script>";
			echo "	
					var marcadorHasta = 'http://www.colectivosriocuarto.com/imagenes/hasta.png';
					var marcadorDesde = 'http://www.colectivosriocuarto.com/imagenes/desdee.png';
					var mapOptions = {
			          center: new google.maps.LatLng(-33.1265506, -64.3414028),
			          zoom: 13,
			          mapTypeId: google.maps.MapTypeId.ROADMAP
			        };

			        function placeMarker() {
						new google.maps.Marker({position: {lat:".$latO.", lng:".$lngO."}, map: map, icon : marcadorDesde});
						if (".$latD." != 0){
							new google.maps.Marker({position: {lat:".$latD.", lng:".$lngD."}, map: map, icon : marcadorHasta});
						}
					};

			        function initialize() { //Inicializa el mapa en Rio Cuarto
		                geocoder = new google.maps.Geocoder();        
		                map = new google.maps.Map(document.getElementById('map_canvas'),mapOptions);
		            	placeMarker();
		          }";
			echo "</script>";
		
		echo "<div id='map_canvas' name='map_canvas' style='width: 1000px; height: 478px;'></div>
	</body>
</html>";
?>