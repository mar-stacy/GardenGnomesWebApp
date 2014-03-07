
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
	$query = "SELECT  time, " . $metric . " FROM Data WHERE " . $metric . " <> 0 ORDER BY time DESC LIMIT 20 ;";
	//$query = "SELECT * FROM Garden_Data;";
	$result = mysqli_query($link, $query);
	if(mysqli_num_rows($result) != 0){
		  $count = 1;
		  while ($row = mysqli_fetch_array($result)) {
        $data[$count] = $row[1];
        $count = $count + 1;
		  }
      }
      ?>
      <img src="metrics_graph.php?mydata=<?php echo urlencode(serialize($data)); ?>&metrics=<?php echo $m_name; ?>" />
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
