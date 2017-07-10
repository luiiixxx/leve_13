<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Accept, X-Access-Token, X-Application-Name, X-Request-Sent-Time');
require_once("Conect.php");

$Result = mysql_query("SELECT Test, NameTest, NumQuestions, Teacher FROM alltests");

if (mysql_num_rows($Result) > 0) {
    while ($row = mysql_fetch_assoc($Result)) {
        echo "Test:".$row['Test'] . "|NameTest:".$row['NameTest'] . "|NumQuestions:".$row['NumQuestions'] . "|Teacher:".$row['Teacher'] . ";";
    }
}

?>
