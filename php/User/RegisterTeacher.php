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
$Username = mysql_real_escape_string($_GET['Username']);
$Name = mysql_real_escape_string($_GET['Name']);
$LastName = mysql_real_escape_string($_GET['LastName']);
$Area = mysql_real_escape_string($_GET['Area']);
$Email = mysql_real_escape_string($_GET['Email']);
$NickName = mysql_real_escape_string($_GET['Nickname']);
$Password = mysql_real_escape_string($_GET['Password']);
$NameTable = $Username."groups";
//Inserción de los datos en la base de datos
$Register = mysql_query("INSERT INTO teachers VALUES ('$Username','$Name', '$LastName', '$Area', '$Email', '$NickName', '')");
$Update = mysql_query("UPDATE  users SET Password =  sha1('$Password'), Register = 'YES' WHERE  Username =  '$Username'");
$NewTable = mysql_query("CREATE TABLE `$NameTable` (`Code` varchar(12) NOT NULL, `Name` varchar(100) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1");
//Verificación si se inserto correctamente los datos
if ($Register && $Update && $NewTable) echo 'Registro realizado con exito';
else echo 'Error al registrar';

mysql_close($conect);
?>
