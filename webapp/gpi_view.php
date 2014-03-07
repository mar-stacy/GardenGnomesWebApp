
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
<body link="#B8B8B8" vlink="#B8B8B8">
  
  <div id ="content-wrapper">
        <div id="content" class="content-style">
        <?php
		
		$view = $_GET['view'];
		$link = mysqli_connect('mysql.eecs.ku.edu', 'drmullin', 'skl00ker', 'drmullin')
			or die('Could not connect: ' . mysqli_connect_error());
		switch($view){
		  case "main":
		   //put on/off switch here
			on_off_switch();
			break;
		  case "statistics":
			echo "This is where I want to display my graph";
			//callStatistics($link);
			/*echo "<h3>This is where I want to display my graph</h3>
					<img src='metrics_graph.php'/>";
			*/break;
		  case "settings":
			echo "Configurations coming soon.";
			break;
		  default:
			echo "Error in getting view.";
		}
		
		function on_off_switch(){
			 header("location: button.php");
		}
		
		function callStatistics($link){

			
			return;
		}
		  
	?>
</div>
    </div>
    
       <div id ="header-wrapper">
			<img id="logo" src="../gpi_logo.jpg" alt="GPI">

		 <div id="header" class="header-style">
            <h4><a href="main.php">&#8801; Home</a></h4>
            <br>
            <h4><a href="gpi_view.php?view=main">&#8801; Controls</a></h4>
            <br>
            <h4><a href="statistics.html">&#8801; Statistics</a></h4>
            <br>
            <h4><a href="gpi_view.php?view=settings">&#8801; Settings</a></h4>
            <br>
        </div>
        <div id="footer">
			<!-- Insert footer info here -->
        </div>
    </div>
</body>

</html>
