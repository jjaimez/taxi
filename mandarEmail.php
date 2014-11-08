<!Doctype HTML>
<html lang="es">
	<head>
		 <title>R&iacute;o Cuarto Taxi</title>
        <link rel="shortcut icon" href="imagenes/icon.ico" type="image/x-icon"/> 
        <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <meta name="description" content="R&iacute;o Cuarto Taxi se trata de una aplicaci&oacute;n sencilla y f&aacute;cil de para solicitar taxis o remises en la ciudad de R&iacute;o Cuarto, C&oacute;rdoba, Argentina.">
        <meta name="keywords" contenct="HTML5, CSS3, Javascript, PHP">
		<link rel="stylesheet" href="css/enviarEmail.css">	
	</head>	
	<body>
		<div id="agrupar">
		<nav id="menu">
			<ul>
                <li><figure><img src="imagenes/logo64.png"></figure></li>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="empresas.html">Empresas</a></li>
                <li><a href="acercaDe.html">Acerca de</a></li>
                <li><a href="contacto.html">Contacto</a></li>
            </ul>
		</nav>
		<section id="texto">
<?php
function recogerDato($campo){
	return isset($_REQUEST[$campo])?$_REQUEST[$campo]:' ';
}
	$email = recogerDato('email');
	$message = recogerDato('message');
	$nombre = recogerDato('name');
	$asunto = recogerDato('asunto');
	$telefono = recogerDato('telephone');
	$para="softwaretecpro@gmail.com";
	$mensaje="Datos del formulario de contacto\n". "nombre: ".$nombre." \n"."email: ".$email." \n"."telefono: ".$telefono." \n"."Mensaje ".$message;
	mail($para,$asunto,$mensaje) or die("Error!");;
	echo "<p>Gracias por contactarnos</p>";
	echo "<p>Su solicitud ha sido enviada, en breve nos pondremos en contacto con usted.</p>";
?>
</section>		
		</div>	
	</body>
</html>