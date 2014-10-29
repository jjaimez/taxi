<!Doctype HTML>
<html lang="es">
	<head>
		<title>R&iacute;o Cuarto Taxi</title>
		<link rel="shortcut icon" href="imagenes/icon.ico" type="image/x-icon"/> 
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<meta name="description" content="R&iacute;o Cuarto Taxi se trata de una aplicaci&oacute;n sencilla y f&aacute;cil de para solicitar taxis o remises en la ciudad de R&iacute;o Cuarto, C&oacute;rdoba, Argentina.">
		<meta name="keywords" contenct="HTML5, CSS3, Javascript, PHP">	
		<link rel="stylesheet" href="css/ingreso.css">	
	</head>	
	<body>
		<div id="pendiente">
			<?php
			session_start();			
			$db_hostname = 'localhost';
			$db_database = 'taxi';
			$db_username = 'root';
			$db_password= '';
			
			$con = mysql_connect($db_hostname,$db_username,$db_password); 
			mysql_select_db($db_database,$con);

			if(isset($_POST['hiddenInput'])){
				$hiddenid = $_POST['hiddenid'];
				$hiddenInput = $_POST['hiddenInput'];
				$query = "UPDATE pedido SET estado='en camino', minutos =".$hiddenInput." WHERE id=".$hiddenid.";";
				$rec = mysql_query($query);
				if ($rec){
					echo "TODO PIOLA";
				} ELSE {
					echo mysql_error();
				}	
			}

			?>			
			<ul>
				<?php
					$query = "SELECT * FROM pedido where empresa='empresa ejemplo' and estado = 'pendiente' order by id desc;";
					$rec = mysql_query($query);
					while($row = mysql_fetch_object($rec)) // $row = $rec->fetch_object()
					{ 
						echo "<li>";
						echo "<p>id:&nbsp;".$row->id."&nbsp;Pasajeros:&nbsp;".$row->pasajeros."</p>";
						echo "<p>Origen:&nbsp".$row->direccion_origen."</p>";
						echo "<p>Destino:&nbsp".$row->direccion_destino."</p>";
						if ($row->fumador == 1){
							$fumador = "si";
						} else {
							$fumador = "no";
						}
						if ($row->conversador == 1){
							$conversador = "si";
						} else {
							$conversador = "no";
						}
						echo "<p>Fumador:&nbsp".$fumador."</p>";
						echo "<p>Conversador:&nbsp".$conversador."</p>";
						echo "<form id='formRespuesta'> <input type='hidden' values='' id='hiddenInput' name='hiddenInput'><input type='hidden' values='' id='hiddenid' name='hiddenid'></form>";
						echo "<p><input type='button' value='Ver mapa'>&nbsp;&nbsp;<input type='button' onclick='respuesta(".$row->id.");'value='Responder'></p>";
						echo "</li>";
					} 


				?>
				<form>
					<input type='hidden' values='' id='hiddenInput'>
				</form>
			</ul>
        </div>
        <div id="camino">	  
        	En Camino      	
        </div>
        <div id="viaje">	      
        	En Viaje  	
        </div>
        <div id="finalizado">	
        	Finalzado        	
        </div>	
	</body>
</html>