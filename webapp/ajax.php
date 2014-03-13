<?php
$query=mysql_connect("mysql.eecs.ku.edu","drmullin", "skl00ker");
mysql_select_db('drmullin');
if(isset($_POST['value']))
{
  $value=$_POST['value'];
	mysql_query("update GPIO_Pins set Water='$value' where Pi='1'");
	echo "<h2>The sprinkler is: " .$value."</h2>";
}

?>