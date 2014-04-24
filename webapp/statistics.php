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
	
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#from" ).datepicker({
      changeMonth: true,
      changeYear: true,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
		
      }
    });
    $( "#to" ).datepicker({
      changeMonth: true,
	  changeYear: true,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
  </script>
</head>

<body>

   <!-- <h1>Profile Page</h1> -->
    <div id ="content-wrapper">
		<div id="content" class="content-style">
			<h5>View Statistics</h5><br/>
			<p>Choose a Raspberry Pi: </p>
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
			<br/><br/>
			<p>Choose a metric:</p>
			<form name="submitMetrics" action='process_statistics.php' method='post'>
			 <select name="metrics">
					<option value='temp'>Temperature</option>
					<option value='humd'>Humidity</option>
					<option value='soil'>Soil Moisture</option>
				</select>
				<br><br> <p>Choose granularity:</p>
				<select name="granularity">
					<option value='hour'>By Hour</option>
					<option value='day'>By Day</option>
					<option value='month'>By Month</option>
					<option value='year'>By Year</option>
				</select>
				<br><br>
				<p>Choose date range:</p>
				<label for="from">From</label>
				<input type="text" name="start" id="from">
				<label for="to">to</label>
				<input type="text" name="end" id="to">
				<br><br>
			  <input type='submit' value='Submit' style='width:90px;'>
			</form>
			
			
			

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
