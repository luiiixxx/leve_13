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
//Consulta si los datos que concuerdan
$sql = mysql_query("SELECT TypeOfUser FROM users WHERE Username = '$Username'");
$TypeOfUser = mysql_fetch_assoc($sql);

if ($TypeOfUser['TypeOfUser'] == "Student") {
    echo $TypeOfUser['TypeOfUser'] . "|";
    $GetSql = mysql_query("SELECT Username, Name, LastName, SchoolName, Grade, Email, Nickname FROM students WHERE  Username =  '$Username'");
    while ($row = mysql_fetch_assoc($GetSql)) {
        echo $row['Name'] . "|".$row['LastName'] . "|".$row['SchoolName'] . "|".$row['Grade'] . "|".$row['Email'] . "|".$row['Nickname'];
    }

}
else if($TypeOfUser['TypeOfUser'] == "Teacher") {
    echo $TypeOfUser['TypeOfUser'] . "|";
    $GetSql = mysql_query("SELECT Username, Name, LastName, Area, Email, Nickname FROM teachers WHERE  Username =  '$Username'");
    while ($row = mysql_fetch_assoc($GetSql)) {
        echo $row['Name'] . "|".$row['LastName'] . "|".$row['Area'] . "|".$row['Email'] . "|".$row['Nickname'];
    }
}
else if($TypeOfUser['TypeOfUser'] == "Admin") {
	echo $TypeOfUser['TypeOfUser'] . "|" . $Username;
}


//Se cierra la conección con la base de datos
mysql_close($conect);
?>
