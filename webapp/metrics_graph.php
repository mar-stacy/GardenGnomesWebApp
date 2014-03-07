<?php
	include('phpgraphlib-master/phpgraphlib.php');
	$graph = new PHPGraphLib(1000,500);
	$data = array();
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
  
  		$link = mysqli_connect('mysql.eecs.ku.edu', 'drmullin', 'skl00ker', 'drmullin')
			or die('Could not connect: ' . mysqli_connect_error());
	$query = "SELECT  time, " . $metric . " FROM Data WHERE " . $metric . " <> 0 LIMIT 20;";
	//$query = "SELECT * FROM Garden_Data;";
	$result = mysqli_query($link, $query);
	if(mysqli_num_rows($result) != 0){
	/*	echo "<h5><b>Statistics for " . $m_name . "</b></h5><br>\n";
		  echo "<table border='1'>\n";
		  echo "\t<tr>\n";
		  echo "\t\t<th>Date-Time</th>\n";
		  echo "\t\t<th>" .$m_name."</th>\n";
		  echo "\t</tr>\n";*/
		  $count = 1;
		  while ($row = mysqli_fetch_array($result)) {
		/*	echo "\t<tr>\n";
			echo "<td>" . $row[0] . "</td>";
			echo "<td>" . $row[1] . "</td>";
			echo "\t</tr>\n";*/
        $data[$count] = $row[1];
        $count = $count + 1;
		  }
      $d_min = min($data);
      $d_max = max($data);
      $avg = ($d_min + $d_max)/2;
      
				
	  $graph->addData($data);
	  $graph->setTitle($m_name . ' vs. Time');
	  $graph->setBars(false);
	  $graph->setLine(true);
	  $graph->setDataPoints(true);
	  $graph->setDataPointColor('maroon');
	  $graph->setDataValues(true);
	  $graph->setDataValueColor('maroon');
    $graph->setGoalLine($avg);
    $graph->setGoalLineColor('red');
    $graph->setRange($d_min - ($d_min*.20), $d_max + ($d_max*.20));
	  $graph->createGraph();
		
		mysqli_free_result($result);
	
	}else{
	echo "<br>No rows were found.";
  }
  mysqli_close($link);
?>