<?php
include "conexion.php";	


if(isset($_REQUEST['id'])){
	$idex = $_REQUEST['id'];
	if ($idex > 0){
		$query = "SELECT * FROM pedido WHERE id = ".$idex." and anunciado = 'no';";					
		$rec = mysqli_query($con,$query);
		if ($rec){
		while($row = mysqli_fetch_object($rec)) 
		{
			$min = $row->minutos;
			if ($min > 0){			
				echo "<script> alert('El coche llegara en ".$min." minutos');</script>";
				$query = "UPDATE `taxi`.`pedido` SET `anunciado`='si' WHERE `id`=".$idex.";";					
				mysqli_query($con,$query);
			}
		}
		}
		$query = "SELECT * FROM pedido WHERE id = ".$idex." and estado = 'afuera' and anunciado = 'si';";					
		$rec = mysqli_query($con,$query);
		if ($rec){
		while($row = mysqli_fetch_object($rec)) 
		{
			echo "<script> alert('El coche esta afuera');</script>";
			$query = "UPDATE `taxi`.`pedido` SET `anunciado`='sis' WHERE `id`=".$idex.";";					
			mysqli_query($con,$query);
		}
		}
	}				
}	 
			 	
?>