<?php 
// datos para la coneccion a mysql 
$db_hostname = 'localhost';
$db_database = 'taxi';
$db_username = 'root';
$db_password= '';

$con = new mysqli($db_hostname,$db_username,$db_password,$db_database); 
if ($con->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}
?>