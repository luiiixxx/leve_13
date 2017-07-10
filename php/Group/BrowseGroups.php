<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Accept, X-Access-Token, X-Application-Name, X-Request-Sent-Time');

require_once("Conect.php");

$Table = mysql_real_escape_string($_GET['Table']);

$Result = mysql_query("SELECT Code, Name FROM $Table");

if (mysql_num_rows($Result) > 0) {
    while ($row = mysql_fetch_assoc($Result)) {
        echo "Code:".$row['Code'] . "|Name:".$row['Name'].";";
    }
}

?>
