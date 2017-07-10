<?php
/*
* Este archivo Php permitirá la validación de incio de sesión de los usuarios
*/
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Accept, X-Access-Token, X-Application-Name, X-Request-Sent-Time');

require_once ("Conect.php");

//Se guardan los datos obtenidos por el metodo GET en variables
$Username = mysql_real_escape_string($_GET['Username']);
$Password = mysql_real_escape_string($_GET['Password']);
//Consulta si los datos que concuerdan
$sql = mysql_query("SELECT * FROM users WHERE Username = '$Username' AND Password = sha1('$Password')");


//Verificación si se consultó correctamente los datos
if ($sql) {

	//Obtención del numero de datos que concuerdan
	//Valores: 1 o 0
	//1 = Si existen datos
	//0 = No existen datos
	$Dates = mysql_num_rows($sql);
	if ($Dates == 1) {
		$Verify = mysql_query("SELECT Register, TypeOfUser FROM users WHERE Username = '$Username'");
		if (mysql_num_rows($Verify) > 0) {
    		while ($row = mysql_fetch_assoc($Verify)) {
        		echo $Dates.";".$row['Register'].";".$row['TypeOfUser'];
    		}
		}
		
	}
	
}
?>
