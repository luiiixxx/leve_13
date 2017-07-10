<?php
/*
* Este archivo Php permitirá la validación de incio de sesión de los usuarios
*/
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Accept, X-Access-Token, X-Application-Name, X-Request-Sent-Time');

require_once ("Conect.php");

$Username = mysql_real_escape_string($_GET['Username']);
$TypeOfUser = mysql_real_escape_string($_GET['TypeOfUser']);

/*
* 101 = Registro correcto
* 202 = Usuario ya registrado
*/
$Result = mysql_query("SELECT Username FROM users WHERE Username = '$Username'");

if (mysql_num_rows($Result) > 0) {
    echo '204';
}
else {
	$sql = mysql_query("INSERT INTO users VALUES('', '$Username', sha1('$Username'), '$TypeOfUser', 'NOT')");
	if ($sql) {
		echo '101';
	}
	else {
		echo 'Registro erroneo';
	}
}
?>