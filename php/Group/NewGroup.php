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
$Table = mysql_real_escape_string($_GET['Table']);
$Code = mysql_real_escape_string($_GET['Code']);
$Name = mysql_real_escape_string($_GET['Name']);

//Inserción de los datos en la base de datos
$InserterT = mysql_query("INSERT INTO allgroups VALUES ('$Code', '$Name')");
$InserterGroup = mysql_query("INSERT INTO $Table VALUES ('$Code', '$Name')");
$InserterG = mysql_query("CREATE TABLE `$Code` (`Username` varchar(32) NOT NULL, `Name` varchar(100) NOT NULL, `SchoolName` varchar(100) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1");
//Verificación si se inserto correctamente los datos
if ($InserterT && $InserterGroup && $InserterG) 
	echo 'Insertado realizado con exito';
else echo 'Error al Insertar';
?>
