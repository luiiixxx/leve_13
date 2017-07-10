<?php
/*
* Este archivo Php insertará los datos de los usuarios estudiantes en una tabla de la base de datos
*
*/
//Permisos para que Unity pueda aceder a este archivo Php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Accept, X-Access-Token, X-Application-Name, X-Request-Sent-Time');

require_once ("Conect.php");

//Se guardan los datos obtenidos por el metodo GET en variables
$Code = mysql_real_escape_string($_GET['Code']);
$Username = mysql_real_escape_string($_GET['Username']);
$Name = mysql_real_escape_string($_GET['Name']);
$SchoolName = mysql_real_escape_string($_GET['SchoolName']);

//Inserción de los datos en la base de datos
$Inserter = mysql_query("INSERT INTO $Code VALUES ('$Username', '$Name', '$SchoolName')");
//Verificación si se inserto correctamente los datos
if ($Inserter) 
	echo 'Insertado realizado con exito';
else echo 'Error al Insertado';
?>
