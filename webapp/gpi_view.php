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
			callStatistics($link);
			
			break;
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
			$metric = $_POST['metrics'];
			switch($metric){
				case "temp":
					$m_name = "Temperature";
					break;
				case "soil":
					$m_name = "Soil Moisture";
					break;
				case "humd":
					$m_name = "Humidity";
					break;
				default:
					break;
			}
			$query = "SELECT  time, " . $metric . " FROM Data;";
			//$query = "SELECT * FROM Garden_Data;";
			$result = mysqli_query($link, $query);
			if(mysqli_num_rows($result) != 0){
				echo "<h5><b>Statistics for " . $m_name . "</b></h5><br>\n";
				  echo "<table border='1'>\n";
				  echo "\t<tr>\n";
				  echo "\t\t<th>Date-Time</th>\n";
				  echo "\t\t<th>" .$m_name."</th>\n";
				  echo "\t</tr>\n";
				  while ($row = mysqli_fetch_array($result)) {
					echo "\t<tr>\n";
					echo "<td>" . $row[0] . "</td>";
					echo "<td>" . $row[1] . "</td>";
					echo "\t</tr>\n";
				  }
				  echo "</table>\n";      
				mysqli_free_result($result);
				/*
				// Setup the graph
				$graph = new Graph(300,250);
				$graph->SetScale("textlin");

				$theme_class=new UniversalTheme;

				$graph->SetTheme($theme_class);
				$graph->img->SetAntiAliasing(false);
				$graph->title->Set('Filled Y-grid');
				$graph->SetBox(false);

				$graph->img->SetAntiAliasing();

				$graph->yaxis->HideZeroLabel();
				$graph->yaxis->HideLine(false);
				$graph->yaxis->HideTicks(false,false);

				$graph->xgrid->Show();
				$graph->xgrid->SetLineStyle("solid");
				$graph->xaxis->SetTickLabels(array('1','2','3','4'));
				$graph->xgrid->SetColor('#E3E3E3');

				// Create the first line
				$p1 = new LinePlot($datay1);
				$graph->Add($p1);
				$p1->SetColor("#6495ED");
				$p1->SetLegend('Line 1');
				
				$graph->legend->SetFrameWeight(1);

				// Output line
				$graph->Stroke();*/
			}else{
			echo "<br>No rows were found.";
		  }
		  mysqli_close($link);
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
