<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL);
  
  $metric = 'temperature';
  
  /*$metric = $_GET["metric"];
  $start_date = $_GET["start_date"];
  $end_date = $_GET["end_date"];*/
  // Connecting, selecting database
  
	$link = mysqli_connect('mysql.eecs.ku.edu', 'smar', 'SunShine24-7', 'smar')
		or die('Could not connect: ' . mysqli_connect_error());
	//echo 'Connected successfully';
	//mysqli_select_db('smar') or die('Could not select database');

	// Insert new user information into pb_users table.
	$query = "SELECT " . $metric. " FROM Garden_Data;";
	//$query = "SELECT * FROM Garden_Data;";
	$result = mysqli_query($link, $query);
	if(mysqli_num_rows($result) != 0){
		while($row=mysqli_fetch_assoc($result)) $output[]=$row;
		print(json_encode($output));
		// Free resultset
		mysqli_free_result($result);
		
	}else{
    echo "<br>No rows were found.";
  }
  mysqli_close($link);
?>
