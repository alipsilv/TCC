<?php
/*
 * Created on 31/08/2014
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>

<?php

/*
 * 
 * array dentro de array [{"wstn_prmt_seq":"1","wstn_value":"32.0"},{"wstn_prmt_seq":"1","wstn_value":"32.0"}]*/
 
   	$data =  $_GET['data'];
    $dateTime =  date("Y-m-d H:i:s");
    $arr = json_decode($data,true);
    
    foreach($arr as $item) { //foreach element in $arr
    	$string = "insert into data(wstn_prmt_seq, wstn_value, wstn_date) values(" . $item['wstn_prmt_seq'] . "," . $item['wstn_value'] . "," . $dateTime . ")";
    	echo $string;
       	switch ($item['wstn_prmt_seq']) {
    		case "1":
        		$tempf = $item['wstn_value'];	
        		break;
   		    case "2":
        		$humidity = $item['wstn_value'];
        		break;
		}
	}
	//2014-31-08+21%3A02%3A35
	 $dateTime =  date("Y-m-d"). "+" . date("H"). "%3A". date("i"). "%3A". date("s");
	$url = "http://weatherstation.wunderground.com/weatherstation/updateweatherstation.php?ID=ISOPAULO84&PASSWORD=aWe513&dateutc=". $dateTime."&tempf=". $tempf;
	// Inicia o cURL acessando uma URL
	$cURL = curl_init($url);
	// Define a opção que diz que você quer receber o resultado encontrado
	curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
	// Executa a consulta, conectando-se ao site e salvando o resultado na variável $resultado
	$resultado = curl_exec($cURL);
	// Encerra a conexão com o site
	curl_close($cURL);
	
	echo $resultado;
	
 //   $response = http_post_fields("http://weatherstation.wunderground.com/weatherstation/updateweatherstation.php?ID=ISOPAULO84&PASSWORD=aWe513&dateutc=". $dateTime ."&tempf=". $tempf);
   
  /*  $sql = "insert into data(wstn_prmt_seq, wstn_value, wstn_date) values( $arr['wstn_prmt_seq'],$arr['wstn_value'],$dateTime)";
    
    // Create connection
    $con = mysql_connect($host,$user,$pass) or print (mysql_error());
    mysql_select_db($database, $con) or print(mysql_error());
    $result = mysql_query($sql, $con);
    mysql_close($con);
    */
   
?>