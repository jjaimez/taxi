<?php
include "conexion.php";	


if(isset($_REQUEST['id'])){
	$idex = $_REQUEST['id'];
	if ($idex > 0){
		$query = "SELECT * FROM pedido WHERE id = ".$idex.";";					
		$rec = mysqli_query($con,$query);
		if ($rec){
		while($row = mysqli_fetch_object($rec)) 
		{
			$min = $row->minutos;
			if ($min > 0){			
				echo "<script> alert('El coche llegara en ".$min." minutos');</script>";
			}
		}
		} else {
			echo mysqli_error($con);
		}
	}				
}	 
			 	
?>