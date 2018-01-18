<?php
$host = 'localhost';
$database = 'weatherstation';
$user = 'root';
$pass= '';

// Create connection
$con = mysql_connect($host,$user,$pass) or print (mysql_error());
mysql_select_db($database, $con) or print(mysql_error());
$sql = "SELECT distinct date_format(wstn_date,'%d-%m-%Y %k') as wstn_date, wstn_value FROM data where wstn_prmt_seq = 1 order by wstn_seq desc limit 30";
$result = mysql_query($sql, $con);

/* Escreve resultados até que não haja mais linhas na tabela */

/*while($consulta = mysql_fetch_array($result)) {
	print "['$consulta[wstn_date]', $consulta[wstn_value]],";
}*/

	$output = array();
				while($row=mysql_fetch_array($result)){
				    $temp1[] = $row['wstn_date'];
				    $temp2[] = $row['wstn_value'];
				
				    $output[] = array($row['wstn_date'], $row['wstn_value']);
				}
				$outputString = json_encode($output);
				echo $outputString; 

mysql_free_result($result);
mysql_close($con);


?>
