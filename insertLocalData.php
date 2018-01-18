<?php

require_once "lib/nusoap.php";

$data = $_GET['data'];


$client = new nusoap_client("serviceLocalJSON.wsdl", true);

$error = $client->getError();
if ($error) {
	echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
}

$result = $client->call("insertDataJSON", array("data" =>$data));

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