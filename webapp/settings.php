<html>

<head>
    <meta charset="UTF-8">
    <title>The Garden Pi</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="http://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../css/css-frames-style.css" />
    <script src="../scripts/jquery.js"></script>
	
  <style type="text/css"> 
	  
	label {
			display: inline-block; 
			width:10em;
	}
	</style>
  
</head>

<body>

   <!-- <h1>Profile Page</h1> -->
    <div id ="content-wrapper">
        <div id="content" class="content-style">
		<h5> Settings</h5>
		<div style="padding:5%;">
		<form name="submitSettings" action='settings.php' method='post'>
			<label for='temp'>Set Temperature: </label>
			<input type="text" name="temp" id="temp" placeholder="25">
			<br/>
			<label for='soil_moisture'>Set Soil Moisture Level: </label>
			<input type="text" name="soil_moisture" id="soil_moisture" placeholder="40">
			<br/>
			<label for='humidity'>Set Ideal Temperature: </label>
			<input type="text" name="humidity" id="humidity" placeholder="40">
			<br/>
			
			<input type='submit' value='Submit' style='width:90px;'>
		</form>
		</div>
        </div>
    </div>
    
       <div id ="header-wrapper">
		<img id="logo" src="../gpi_logo.jpg" alt="GPI">

		<div id="header" class="header-style">
            <h4><a href="main.php">&#8801; Home</a></h4>
            <br>
            <h4><a href="button.php">&#8801; Controls</a></h4>
            <br>
            <h4><a href="statistics.html">&#8801; Statistics</a></h4>
            <br>
            <h4><a href="settings.php">&#8801; Settings</a></h4>
            <br>
        </div>
        <div id="footer">
			<!-- Insert footer info here -->
        </div>
    </div>


</body>
</html>
