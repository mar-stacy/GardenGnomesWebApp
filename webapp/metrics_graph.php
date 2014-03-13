<?php
	  include('phpgraphlib-master/phpgraphlib.php');
	  $graph = new PHPGraphLib(1000,500);
  	$data = unserialize(urldecode(stripslashes($_GET['mydata'])));
    $time = unserialize(urldecode(stripslashes($_GET['time'])));
    $d_min = min($data);
    $d_max = max($data);
    $avg = ($d_min + $d_max)/2;
    $m_name = $_GET['metrics'];
    $graph->addData($data);
	  $graph->setTitle($m_name . ' vs. Time');
	  $graph->setBars(false);
	  $graph->setLine(true);
	  $graph->setDataPoints(true);
	  $graph->setDataPointColor('maroon');
	  $graph->setDataValues(true);
	  $graph->setDataValueColor('maroon');
	  $graph->setXValues(false);
    $graph->setGoalLine($avg);
    $graph->setGoalLineColor('red');
    $graph->setRange($d_min - ($d_min*.1), $d_max + ($d_max*.10));
	  $graph->createGraph();

?>