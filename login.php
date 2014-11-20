		<?php 
			session_start();			
			include "conexion.php"; 

			if (!isset($_SESSION['usuario'])){
				 if(isset($_POST['usuario']))  { 
			    $sql = "SELECT * FROM usuarios WHERE usuario = '".$_POST['usuario']."' and password = '".$_POST['contrasenha']."'"; 
			    $rec = mysqli_query($con,$sql); 
			    $count = 0; 
			     while($row = mysqli_fetch_object($rec)) 
			    { 
			        $count++; 
			        $result = $row; 
			    } 
			  
			    if($count == 1) 
			    { 
			    	 $_SESSION['usuario'] = $_POST['usuario'];
			         header("location:ingreso".$_POST['usuario'].".php"); 
			    } 
			  
			    else 
			    { 
			        echo '<div class="error">Su usuario es incorrecto, intente nuevamente.</div>'; 
			    } 
				} 
			} else {
				header("location:ingreso".$_SESSION['usuario'].".php"); 
			}
	?> 	
<!Doctype HTML>
<html lang="es">
	<head>
		<title>R&iacute;o Cuarto Taxi</title>
		<link rel="shortcut icon" href="imagenes/icon.ico" type="image/x-icon"/> 
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<meta name="description" content="R&iacute;o Cuarto Taxi se trata de una aplicaci&oacute;n sencilla y f&aacute;cil de para solicitar taxis o remises en la ciudad de R&iacute;o Cuarto, C&oacute;rdoba, Argentina.">
		<meta name="keywords" contenct="HTML5, CSS3, Javascript, PHP">
		<link rel="stylesheet" href="css/login.css">	
	</head>	
	<body>
		<div id="agrupar">			
		<section id="columna">
			<form action="" id="formulario" method="post">
        		<p>Usuario</p>
        		<input type="text" id="usuario" name="usuario"/> <br><br>
        		<p>Contraseña</p>
        		<input type="password" id="contrasenha" name="contrasenha"/><br><br>	
        		<input type="submit" value="Ingresar"  id="botonBuscar" name="login"><br><br>        		
        	</form>        	
        </div>	
	</body>
</html>