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
</head>
<body>

    <div id ="content-wrapper">
        <div id="content" class="content-style">
		 <?php 
				$link = mysqli_connect('mysql.eecs.ku.edu', 'drmullin', 'skl00ker', 'drmullin')
				or die('Could not connect: ' . mysqli_connect_error());
				$qc = 0;
				if ($_POST['temp'] != NULL){
					$q[$qc] = "temp = " .$_POST['temp'];
					$qc++;
				}	
				if ($_POST['soil_moisture'] != NULL){					
					$q[$qc] = "soil = " .$_POST['soil_moisture'];
					if ($qc != 0)
						$q[$qc] = ", " . $q[$qc];
					$qc++;
				}			
				for ($i = 0; $i < $qc; $i++){
					$set_str = $set_str . $q[$i];
					
				}
				echo $set_str . "<br>";
				$query = "UPDATE GPIO_Pins SET " . $set_str . " WHERE Pi = " . $_POST['pids'];
				echo $query;
				$result = mysqli_query($link, $query) or die(mysqli_error());	
	?>
		
		
		
		<form name="submitSettings" action='settings.php' method='post'>
			
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
