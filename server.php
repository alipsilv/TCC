<?php
require_once "lib/nusoap.php";
 
function insertMeasure($sensorID, $date, $value) {
	
    $sql = "insert into measure(msre_sensor_id, msre_data, msre_value) values($sensorID,$date,$value)";
    $host = "mysql.hostinger.com.br";
    $database = "u191786021_ws";
    $user = "u191786021_aline";
    $pass= "weather";
    
    // Create connection
    $con = mysql_connect($host,$user,$pass) or print (mysql_error());
    mysql_select_db($database, $con) or print(mysql_error());
    $result = mysql_query($sql, $con);
    mysql_close($con);
    return "success";
}
 

$server = new soap_server();
$server->configureWSDL("server", "urn:server");

$server->register("insertMeasure",
		array("sensorID" => "xsd:string","date" => "xsd:string","value" => "xsd:string"),
		array("return" => "xsd:string"),
		"urn:server",
		"urn:server#insertMeasure",
		"rpc",
		"encoded",
		"Insert data into table");

$server->service($HTTP_RAW_POST_DATA);
?>