      
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Arduino Weather Station</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="javascript/jquery-1.11.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="javascript/dist/jquery.jqplot.min.js"></script>
	<script type="text/javascript" src="javascript/dist/plugins/jqplot.canvasTextRenderer.min.js"></script>
	<script language="javascript" type="text/javascript" src="javascript/dist/plugins/jqplot.dateAxisRenderer.js"></script>
	<script type="text/javascript" src="javascript/dist/plugins/jqplot.canvasAxisLabelRenderer.min.js"></script>
	<link rel="stylesheet" type="text/css" hrf="javascript/dist/jquery.jqplot.min.css" />




  </head>

	<body>
	    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="#">Project name</a>
	        </div>
	        <div class="collapse navbar-collapse">
	          <ul class="nav navbar-nav">
	            <li class="active"><a href="#">Home</a></li>
	            <li><a href="#about">About</a></li>
	            <li><a href="#contact">Contact</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </div>
	    <div style="margin:60px 0px;" class="container">
	      <div class="row">	
	      	<div class="col-md-3">	
		        <div class="panel panel-default">
					<div class="panel-heading">Station</div>
				  		<div class="panel-body">
				  			<p>City:</p>
				    		<p>Latitude:</p>
				    		<p>Longitude</p>
				  		</div>	
					</div>

					<table class="table  table-bordered table-striped">
		      		<thead>Parameters</thead>
					<tr>
						<td>Temperature</td>
						<td>25</td>
					</tr>
					<tr>
						<td>Air humidity</td>
						<td>50 %</td>
					</tr>
					<tr>
						<td>Accumulated rainfall</td>
						<td>20 mm</td>
					</tr>
					<tr>
						<td>Barometric Pressure</td>
						<td>t21</td>
					</tr>
					<tr>
						<td>Wind direction</td>
						<td>270 oNV</td>
					</tr>
					<tr>
						<td>Wind speed</td>
						<td>2.9 m/s</td>
					</tr>
				</table>    
			</div>
			<div class="col-md-9">
				<form class="form-horizontal" role="form">
		      		<select class="form-control">
						<option>Temperature</option>
						<option>Air humidity</option>
						<option>Accumulated rainfall</option>
						<option>Barometric Pressure</option>
						<option>Wind direction</option>
						<option>Wind speed</option>
					</select>
				</form>    
	     		<div style="margin:20px 0px;" id="chart1"> </div>
	    		
	    		
	
			<?php
	    	
	    	$host = 'localhost';
			$database = 'weatherstation';
			$user = 'root';
			$pass= '';
			
			// Create connection
			$con = mysql_connect($host,$user,$pass) or print (mysql_error());
			mysql_select_db($database, $con) or print(mysql_error());
			$sql = "SELECT distinct hour(wstn_date) as wstn_date, wstn_value FROM data where wstn_prmt_seq = 1 order by wstn_seq desc limit 30";
			$result = mysql_query($sql, $con);
			
			/* Escreve resultados até que não haja mais linhas na tabela 
			
			while($consulta = mysql_fetch_array($result)) {
				print "['$consulta[wstn_date]', $consulta[wstn_value]],";
			}
	    	*/
	    	
	    	  $weeknumbers = array();
				$completedquestionnaires = array();
				
				
				$output = array();
				while($row=mysql_fetch_array($result)){
				    $temp1[] = $row['wstn_date'];
				    $temp2[] = $row['wstn_value'];
				
				    $output[] = array($row['wstn_date']*1.0, $row['wstn_value']*1.0);
				}
				$outputString = json_encode($output);
									    		
				
	    	?>	
	    		
	    		
	<script type="text/javascript" >

	 	 var line1 = <?php echo $outputString; ?>;
								
/*var dataArray = [['0:00',25],['01:00',20],['02:00',20],];*/

								
	 	$(document).ready(function(){
  			var plot1 = $.jqplot ('chart1', [line1],{
  				title:'Temperature',
				axes: {
					yaxis:{
						min: 0,
						max: 100,
						label:'',
		          		labelRenderer: jQuery.jqplot.CanvasAxisLabelRenderer,
		          		labelOptions:{angle:-90}
		          	}
				},
  				 series: [{color: 'red', highlightColors: ['aqua', 'black', 'blue', 'fuchsia', 'gray', 'green', 'lime', 'maroon', 'navy', 'olive', 'purple', 'red', 'silver', 'teal', 'white', 'yellow']}],
  				
  			});
		});
		


    </script>
    
			</div>    
		</div>
    </div>
  </body>
</html>
