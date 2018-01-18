
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

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
          <a class="navbar-brand" href="#">How to do it?</a>
          <a class="navbar-brand" href="graph.php">Weather Now</a>
        </div>
   
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Welcome!</h1>
        <p>Site about a mobile  weather station, prototyped in arduino. The hardware explores places, localizes itself getting a lot of weather information such temperature, humidity, barometric pressure, CO concentration, accumulated rain, wind speed and direction... ufa! It's beautiful, pure magic! It is worth to check! :D</p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-6">
        	<h3>You can check wunderground analysis here!</h3>
        	<span style="display: block !important; width: 180px; text-align: center; font-family: sans-serif; font-size: 12px;">
        		<a href="http://www.wunderground.com/personal-weather-station/dashboard?ID=ISOPAULO84" title="Lorena, BRAZIL Weather Forecast" target="_blank">
        		<img width="160" src="http://weathersticker.wunderground.com/weathersticker/cgi-bin/banner/ban/wxBanner?bannertype=wu_bluestripes_metric&pwscode=ISOPAULO84&ForcedCity=Lorena&ForcedState=BRAZIL&language=EN"/></a>
        		<br>
        		<a href="http://www.wunderground.com/personal-weather-station/dashboard?ID=ISOPAULO84" title="Get latest Weather Forecast updates" style="font-family: sans-serif; font-size: 12px" target="_blank">Click for weather forecast</a></span>
        </div>
        <div class="col-md-6">
          <h3>About me</h3>
          <p>No words to describe such a perfect creature. Engineering student, sweet and kind girl.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       </div>
        </div>

      <hr>

      <footer>
        <p>&copy; Company 2014</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>