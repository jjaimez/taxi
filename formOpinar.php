<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/formOpinar.css">
	<script type="text/javascript" language="javascript" src="js/formOpinar.js"></script>
</head>
<body>
	<?php
		$linkpost = $_GET['empresa'];
	?>
	<form action="<?php echo $linkpost.'php';?>" id="formulario" method="post">
				<p>Nombre: <input type="text" size="1" id="nombreOpinion" name="nombreOpinion"/></p>				
        		<p>*Preferencias:<input type="text" size="1" id="preferOpinion" name="preferOpinion"/></p>
        		<p>*Puntualidad:<input type="text" size="1" id="puntOpinion" name="puntOpinion"/></p>
        		<p>*Autos:<input type="text" size="1" id="AutosOpinion" name="AutosOpinion"/></p>
        		<p>*Precio:<input type="text" size="1" id="PrecioOpinion" name="PrecioOpinion"/></p>
        		<p>*Respeto de las leyes de transito:<input type="text" size="1" id="leyOpinion" name="leyOpinion"/></p>
        		<p>Opinion: <textarea id="opinionOpinion" name="opinionOpinion"> </textarea></p>
        		<input type="button" value="Enviar" onclick="validarDatos()" id="botonBuscar"><br><br>
        		<p>* Por favor complete con numeros del 1 al 10</p>
	</form>
</body>
</html>