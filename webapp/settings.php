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
  
	<script type="text/javascript">
	function showValue(newValue)
	{
		document.getElementById("range").innerHTML=newValue;
	}
	</script>
			
	<script type="text/javascript">
	function updateTextInput(id, val) {
		document.getElementById(id).value=val; 
	}
	</script>
</head>

<body>

   <!-- <h1>Profile Page</h1> -->
    <div id ="content-wrapper">
        <div id="content" class="content-style">
		<h5> Settings</h5>
		<div style="padding:5%;">
		<form name="submitSettings" action='process_settings.php' method='post'>
						
			<label>Raspberry PI ID: </label>
			<select name="pids">
        <?php
          
            $link = mysqli_connect('mysql.eecs.ku.edu', 'drmullin', 'skl00ker', 'drmullin')
            or die('Could not connect: ' . mysqli_connect_error());
            
            $query = "SELECT pi FROM GPIO_Pins";
            $result = mysqli_query($link, $query) or die(mysqli_error());
            $result = mysqli_query($link, $query);
			  if(mysqli_num_rows($result) > 0){
				  while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value = '" . $row['pi'] . "'>" . $row['pi'] . "</option>\n";
          }
        }else{
          echo "<script type='text/javascript'>";
          echo "alert('No Raspberry Pis have been set up')";
          echo "</script>";
        }
            
        ?>
				<!--<option value="PI1">1</option>
				<option value="PI2">2</option>
				<option value="PI3">3</option>-->
			</select>
			<br/>
			
			<input type="checkbox" value="automated" checked>Automate garden
			<br/><br/><br/>
				
			<label for='temp'>Set Temperature (°F): </label>
			<input type="text" name="temp" id="temp" value="" placeholder="70">  60
			<input type="range" name="temp_slider" min="60" max="80" value="70" onchange="updateTextInput('temp', this.value)">  80                                                     
			<br/>
			
			<label for='soil_moisture'>Set Soil Moisture Level: </label>
			<input type="text" name="soil_moisture" value="" id="soil_moisture" placeholder="40">  300
			<input type="range" name="moisture_slider" min="300" max="700" value="50" onchange="updateTextInput('soil_moisture', this.value)">  700                 

			<br/><br/><br/>
			
			Select Days:<br>
			<input type="radio" value="weekly" checked>Weekly
			<input type="checkbox" value="sunday">Sun
			<input type="checkbox" value="monday">Mon
			<input type="checkbox" value="tuesday">Tues
			<input type="checkbox" value="wednesday">Wed
			<input type="checkbox" value="thursday">Thurs
			<input type="checkbox" value="friday">Fri
			<input type="checkbox" value="saturday">Sat
			<br/><br/>
			
			Start Time:
			<input type="text" id="timeHours" value=""> :
			<input type="text" id="timeMinutes" value=""> (hh:mm)
			<br/><br/>
			
			Run Every:
			<input type="text" id="runHours" value=""> Hours
			<input type="text" id="runMinutes" value=""> Minutes
			<br/><br/>
			
			Duration:
			<input type="text" id="durHours" value=""> Minutes
			<input type="text" id="durMinutes" value=""> Seconds
			<br/><br/><br/><br/>
			
			<input type='submit' value='Submit' style='width:90px;'>
			<input type='submit' value='Cancel' style='width:90px;'>
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
            <h4><a href="statistics.php">&#8801; Statistics</a></h4>
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
