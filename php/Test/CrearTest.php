<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Accept, X-Access-Token, X-Application-Name, X-Request-Sent-Time');
require_once ("Conect.php");
$Table = mysql_real_escape_string($_GET['Test']);
$Name = mysql_real_escape_string($_GET['NameTest']);
$NQ = mysql_real_escape_string($_GET['NumQuestions']);
$Teacher = mysql_real_escape_string($_GET['Teacher']);

// sql to create table
$Inserter = mysql_query("INSERT INTO alltests(Test, NameTest, NumQuestions, Teacher) VALUES ('$Table', '$Name','$NQ', '$Teacher')");
$sql = mysql_query("CREATE TABLE $Table(Question TEXT(224) NOT NULL, OpCorrect TEXT(55) NOT NULL, OpIncorrectA TEXT(55) NOT NULL, OpIncorrectB TEXT(55) NOT NULL, OpIncorrectC TEXT(55) NOT NULL)");


if ($sql  && $Inserter) {
	mkdir("../Img/Tests/" . $Table, 0777, true);  //recomedado  
    echo "Test creado correctamente";
} else {
    echo "Error al crear el Test";
}

mysql_close($conect);
?>
