<?php

require_once "lib/nusoap.php";

$sensorID = $_GET['sensorID'];
$date = $_GET['date'];
$value = $_GET['value'];

$client = new nusoap_client("service.wsdl", true);

$error = $client->getError();
if ($error) {
	echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
}

$result = $client->call("insertMeasure", array("sensorID" =>$sensorID,"date" => $date,"value"=>$value));

if ($client->fault) {
	echo "<h2>Fault</h2><pre>";
	print_r($result);
	echo "</pre>";
}
else {
	$error = $client->getError();
	if ($error) {
		echo "<h2>Error</h2><pre>" . $error . "</pre>";
	}//aqui é sucesso
}
?>