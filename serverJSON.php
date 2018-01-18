<?php
require_once "lib/nusoap.php";
 
function insertDataJSON($data) {
	
	$host = "mysql.hostinger.com.br";
    $database = "u191786021_ws";
    $user = "u191786021_aline";
    $pass= "weather";
 
    $dateTimeW =  date("Y-m-d"). "+" . date("H"). "%3A". date("i"). "%3A". date("s");
    $dateTimeSQL =  date("Y-m-d H:i:s");
    $arr = json_decode($data,true);
    
    $con = mysql_connect($host,$user,$pass) or print (mysql_error());
    mysql_select_db($database, $con) or print(mysql_error());
    
    foreach($arr as $item) {
    	$sql = "insert into data(wstn_prmt_seq, wstn_value, wstn_date) values(" . $item['wstn_prmt_seq'] . "," . $item['wstn_value'] . "," . "'". $dateTimeSQL ."')";
    	$result = mysql_query($sql, $con);
    	/*
    	 * O Location Wunderground seguirá uma lógica qndo dispusermos do módulo gps    	
    	 * 1 - Parâmetro de temperatura fahrenheit F
    	 * 2 - Humidade em %
    	 * 
    	 */
    	  	
    	switch ($item['wstn_prmt_seq']) {
    		case "1":
        		$tempf = $item['wstn_value'];	
        		break;
   		    case "2":
        		$humidity = $item['wstn_value'];
        		break;
		}
	}
	mysql_close($con);
	
	//Grava no Wunderground
	$url = "http://weatherstation.wunderground.com/weatherstation/updateweatherstation.php?ID=ISOPAULO84&PASSWORD=aWe513&dateutc=". $dateTimeW."&tempf=". $tempf;
	$cURL = curl_init($url);
	curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($cURL);
	curl_close($cURL);
	
    return  "sucess" ;
}
 

$server = new soap_server();
$server->configureWSDL("serverJSON", "urn:serverJSON");

$server->register("insertDataJSON",
		array("data" => "xsd:string"),
		array("return" => "xsd:string"),
		"urn:serverJSON",
		"urn:serverJSON#insertDataJSON",
		"rpc",
		"encoded",
		"Insert data into table");

$server->service($HTTP_RAW_POST_DATA);
?>