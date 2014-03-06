 <?php
 
 $dbconn = mysql_connect("mysql.eecs.ku.edu","drmullin", "skl00ker") or
		    die('Could not connect: ' . mysql_error());
		    mysql_select_db('drmullin') or die('Could not select database');
			
	$query = "SELECT Water FROM GPIO_Pins WHERE Pi = 1;";
    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
    if(mysql_num_rows ($result)){
      $row = mysql_fetch_row($result);
	  echo $row[0];
	  //send value of water to Pi here.
	  
	}
?>	