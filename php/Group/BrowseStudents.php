<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Accept, X-Access-Token, X-Application-Name, X-Request-Sent-Time');

require_once("Conect.php");

$Code = mysql_real_escape_string($_GET['Code']);

$Result = mysql_query("SELECT Username, Name, SchoolName FROM $Code");

if (mysql_num_rows($Result) > 0) {
    while ($row = mysql_fetch_assoc($Result)) {
        echo "Username:".$row['Username'] . "|Name:".$row['Name']. "|SchoolName:".$row['SchoolName'].";";
    }
}

?>
