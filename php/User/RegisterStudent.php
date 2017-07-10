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
$SchoolName = mysql_real_escape_string($_GET['SchoolName']);
$Grade = mysql_real_escape_string($_GET['Grade']);
$Email = mysql_real_escape_string($_GET['Email']);
$NickName = mysql_real_escape_string($_GET['Nickname']);
$Password = mysql_real_escape_string($_GET['Password']);

//Inserción de los datos en la base de datos
$Register = mysql_query("INSERT INTO students VALUES ('$Username','$Name', '$LastName', '$SchoolName', '$Grade', '$Email', '$NickName', '')");
$Update = mysql_query("UPDATE  users SET Password =  sha1('$Password'), Register = 'YES' WHERE  Username =  '$Username'");
//Verificación si se inserto correctamente los datos
if ($Register && $Update) echo 'Registro realizado con exito';
else echo 'Error al registrar';

mysql_close($conect);
?>
