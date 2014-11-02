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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/ingreso.js"> </script>			  
	</head>	
	<body>
		<div id="pendiente">
			<?php
			session_start();			
			include "conexion.php";

			if(isset($_POST['hiddenInput'])){
				$hiddenid = $_POST['hiddenid'];
				$hiddenInput = $_POST['hiddenInput'];
				$query = "UPDATE pedido SET estado='en camino', minutos =".$hiddenInput." WHERE id=".$hiddenid.";";
				$rec = mysqli_query($con,$query);				
			}

			if(isset($_POST['hiddenidfuera'])){
				$hiddenidfuera = $_POST['hiddenidfuera'];
				$query = "UPDATE pedido SET estado='afuera' WHERE id=".$hiddenidfuera.";";
				$rec = mysqli_query($con,$query);
			}

			if(isset($_POST['hiddenidViajando'])){
				$hiddenidViajando = $_POST['hiddenidViajando'];
				$query = "UPDATE pedido SET estado='terminado' WHERE id=".$hiddenidViajando.";";
				$rec = mysqli_query($con,$query);
			}

			if(isset($_POST['hiddenideliminar'])){
				$hiddenideliminar = $_POST['hiddenideliminar'];
				$query = "DELETE FROM pedido WHERE id=".$hiddenideliminar.";";
				$rec = mysqli_query($con,$query);
			}

			?>			
			<ul>
				<?php
					$query = "SELECT * FROM pedido where empresa='empresa ejemplo' and estado = 'pendiente' order by id desc;";
					$rec = mysqli_query($con,$query);
					while($row = mysqli_fetch_object($rec)) // $row = $rec->fetch_object()
					{ 
						echo "<li>";
						echo "<p>Id:&nbsp;".$row->id."&nbsp;Pasajeros:&nbsp;".$row->pasajeros."</p>";
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
						echo "<form action='' method='post' id='formRespuesta".$row->id."'> <input type='hidden' values='' id='hiddenInput".$row->id."' name='hiddenInput'><input type='hidden' values='' id='hiddenid".$row->id."' name='hiddenid'></form>";
						echo "<p><input type='button' value='Ver mapa'>&nbsp;&nbsp;<input type='button' onclick='respuesta(".$row->id.");'value='Responder'></p>";
						echo "</li>";
						$query2 = "UPDATE pedido SET leida='si' WHERE id=".$row->id.";";
						$rec2 = mysqli_query($con,$query2);						
					} 
				?>
			</ul>
        </div>
        <div id="camino">	  
        	<ul>
        		<?php
					$query = "SELECT * FROM pedido where empresa='empresa ejemplo' and estado = 'en camino' order by id desc;";
					$rec = mysqli_query($con,$query);		
					while($row = mysqli_fetch_object($rec)) // $row = $rec->fetch_object()
					{ 
						echo "<li>";
						echo "<p>Id:&nbsp;".$row->id."&nbsp;Pasajeros:&nbsp;".$row->pasajeros."</p>";
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
						echo "<form action='' method='post' id='formAfuera".$row->id."'><input type='hidden' values='' id='hiddenidfuera".$row->id."' name='hiddenidfuera'></form>";
						echo "<p><input type='button' value='Ver mapa'>&nbsp;&nbsp;<input type='button' onclick='afuera(".$row->id.");'value='Avisar'></p>";
						echo "</li>";
					} 
				?>
        	</ul>     	
        </div>
        <div id="viaje">	      
        	<?php
					$query = "SELECT * FROM pedido where empresa='empresa ejemplo' and estado = 'afuera' order by id desc;";
					$rec = mysqli_query($con,$query);		
					while($row = mysqli_fetch_object($rec)) // $row = $rec->fetch_object()
					{ 
						echo "<li>";
						echo "<p>Id:&nbsp;".$row->id."&nbsp;Pasajeros:&nbsp;".$row->pasajeros."</p>";
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
						echo "<form action='' method='post' id='formViajando".$row->id."'><input type='hidden' values='' id='hiddenidViajando".$row->id."' name='hiddenidViajando'></form>";
						echo "<p><input type='button' value='Ver mapa'>&nbsp;&nbsp;<input type='button' onclick='viajando(".$row->id.");'value='Finalizar'></p>";
						echo "</li>";
					} 
				?>
        </div>
        <div id="finalizado">	
        	<?php
					$query = "SELECT * FROM pedido where empresa='empresa ejemplo' and estado = 'terminado' order by id desc;";
					$rec = mysqli_query($con,$query);		
					while($row = mysqli_fetch_object($rec)) // $row = $rec->fetch_object()
					{ 
						echo "<li>";
						echo "<p>Id:&nbsp;".$row->id."&nbsp;Pasajeros:&nbsp;".$row->pasajeros."</p>";
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
						echo "<form action='' method='post' id='formeliminar".$row->id."'><input type='hidden' values='' id='hiddenideliminar".$row->id."' name='hiddenideliminar'></form>";
						echo "<p><input type='button' onclick='eliminar(".$row->id.");'value='Eliminar'></p>";
						echo "</li>";
					} 
				?>        	
        </div>	
	</body>
</html>