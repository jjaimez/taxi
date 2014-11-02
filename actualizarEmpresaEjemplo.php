<?php

session_start();			
include "conexion.php";

  //Query the database and get the count 
$q = mysqli_query($con,"SELECT * FROM pedido where empresa='empresa ejemplo' and estado = 'pendiente' and leida='no' order by id desc;");
$afected = mysqli_num_rows($q);
if ($afected > 0) {
	echo "<link rel='stylesheet' href='css/ingreso.css'>";
	while($row = mysqli_fetch_object($q)) 
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
				} 
?>