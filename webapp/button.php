<?php
	$link = mysql_connect('mysql.eecs.ku.edu', 'drmullin', 'skl00ker', 'drmullin')
	or die('Could not connect: ' . mysql_connect_error());
?>

<script type="text/javascript"src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js">
</script>
<script type="text/javascript">
$(document).ready(function(){
$('#myonoffswitch').click(function(){
var myonoffswitch=$('#myonoffswitch').val();
if ($("#myonoffswitch:checked").length == 0)
{
var a=myonoffswitch;
}
else
{
var a="off";
}

$.ajax({
type: "POST",
url: "ajax.php",
data: "value="+a ,
success: function(html){
$("#display").html(html).show();
}
});

});
});
</script>

<script type="text/javascript">
$(document).ready( function(){
$(".cb-enable").click(function(){
var parent = $(this).parents('.switch');
$('.cb-disable',parent).removeClass('selected');
$(this).addClass('selected');
$('.checkbox',parent).attr('checked', true);
});
$(".cb-disable").click(function(){
var parent = $(this).parents('.switch');
$('.cb-enable',parent).removeClass('selected');
$(this).addClass('selected');
$('.checkbox',parent).attr('checked', false);
});
});
</script>
<html>
<head>
    <meta charset="UTF-8">
    <title>The Garden Pi</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="http://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../css/css-frames-style.css" />
</head>
<body>
<div id ="content-wrapper">
	<div id="content" class="content-style">
		<h5> Sprinkler Status </h5>
		<p> Click to switch the status </p>
		<div class="onoffswitch" >
			<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch"
			<?php

				$query3=mysql_query("select * from GPIO_Pins where Pi=1");
				$query4=mysql_fetch_array($query3);
				if($query4['Water']=="off")
				{
				echo "checked";
				}
				
			?>>
			<label class="onoffswitch-label" for="myonoffswitch">
			<div class="onoffswitch-inner"></div>
			<div class="onoffswitch-switch"></div>
			</label>
		</div>
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