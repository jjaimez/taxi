<?php		
include "conexion.php";
$nombreEmpresa = $_REQUEST['empresa'];
$q = mysqli_query($con,"SELECT * FROM pedido where empresa='".$nombreEmpresa."' and estado = 'pendiente' and leida='no' order by id desc;");
$afected = mysqli_num_rows($q);
if ($afected > 0) {
	mysqli_begin_transaction($con);
	echo "<link rel='stylesheet' href='css/ingreso.css'>";
	while($row = mysqli_fetch_object($q)) 
					{ 	
						echo "<META HTTP-EQUIV='refresh' content='5' URL='Notificacion.mp3'>";
						echo "<embed src ='$Notificacion' hidden='true' autostart='true'></embed>";	
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
						echo "<p><a href='mostrardireccion.php?latO=".$row->lat_origen."&lngO=".$row->lng_origen."&latD=".$row->lat_destino."&lngD=".$row->lng_destino."' class='lytebox' data-title='Direcciones' data-lyte-options='width:1016 height:816 scrollbars:no'></a><input type='button' value='Ver mapa'></a>&nbsp;&nbsp;<input type='button' onclick='respuesta(".$row->id.");'value='Responder'></p>";
						echo "</li>";
						$query2 = "UPDATE pedido SET leida='si' WHERE id=".$row->id.";";
						$rec2 = mysqli_query($con,$query2);
					}
					mysqli_commit($con);
				}
				mysqli_close($con);
?>