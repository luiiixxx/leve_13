<?php
/*
* Este archivo Php permitirá la conección a la base de datos que guarda los datos de los usuarios
*/
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Accept, X-Access-Token, X-Application-Name, X-Request-Sent-Time');

//La variable guardará la conección con MySQL
$con = mysql_connect('mysql.hostinger.es','u849383476_admin','c1uqtNo7RAW54!;*$I');
mysql_select_db('u849383476_data', $con) or die ("Error: No es posible establecer la conexión");

?>
