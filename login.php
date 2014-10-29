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
		<?php 
			session_start();			
			$db_hostname = 'localhost';
			$db_database = 'taxi';
			$db_username = 'root';
			$db_password= '';
			
			$con = mysql_connect($db_hostname,$db_username,$db_password); 
			mysql_select_db($db_database,$con); 

			//$con = new mysqli($db_hostname, $db_username, $db_password, $db_database);

			function verificar_login($usuario,$contrasenha,&$result) { 
			    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' and password = '$contrasenha'"; 
			   $rec = mysql_query($sql); 
			   // $rec = $con->query($sql); 
			    $count = 0; 
			     while($row = mysql_fetch_object($rec)) // $row = $rec->fetch_object()
			    { 
			        $count++; 
			        $result = $row; 
			    } 
			  
			    if($count == 1) 
			    { 
			        return 1; 
			    } 
			  
			    else 
			    { 
			        return 0; 
			    } 
			} 
			  
			if(!isset($_SESSION['userid'])) 
			{ 
			    if(isset($_POST['login'])) 
			    { 
			        if(verificar_login($_POST['usuario'],$_POST['contrasenha'],$result) == 1) 
			        { 
			            $_SESSION['userid'] = $result->idusuario; 
			            header("location:ingreso.html"); 
			        } 
			        else 
			        { 
			            echo '<div class="error">Su usuario es incorrecto, intente nuevamente.</div>'; 
			        } 
			    }
			} else {
				header("location:ingreso.php"); 
			}

	?> 	
	</head>	
	<body>
		<div id="agrupar">			
		<section id="columna">
			<form action="" id="formulario" method="post">
        		<p>Usuario</p>
        		<input type="text" id="usuario" name="usuario"/> <br><br>
        		<p>Contraseña</p>
        		<input type="text" id="contrasenha" name="contrasenha"/><br><br>
        		<p>Recordar&nbsp; &nbsp;<input type="checkbox" name="recordar" value="recordar"></p><br>
        		<input type="submit" value="Ingresar"  id="botonBuscar" name="login"><br><br>        		
        	</form>        	
        </div>	
	</body>
</html>