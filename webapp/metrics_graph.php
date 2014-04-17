<?php
	require_once ('jpgraph/src/jpgraph.php');
	require_once ('jpgraph/src/jpgraph_line.php');
  	$data = unserialize(urldecode(stripslashes($_GET['mydata'])));
    $time = unserialize(urldecode(stripslashes($_GET['time'])));


    $d_min = min($data);
    $d_max = max($data);
    $avg = ($d_min + $d_max)/2;
    $m_name = $_GET['metrics'];
    // Setup the graph
    $graph = new Graph(800,650);

    $graph->SetScale("textlin",$d_min - ($d_min * .05),$d_max + ($d_max * .05));
    $graph->SetMargin(50, 0, 0,100 );
    $graph->SetMarginColor('white');
    $graph->SetFrame(false);
    $graph->graph_theme = null;
    $theme_class=new UniversalTheme;

    $graph->SetTheme($theme_class);
    $graph->img->SetAntiAliasing(false);
    $graph->title->Set($m_name . ' vs. Time');
    $graph->SetBox(false);

    $graph->img->SetAntiAliasing();

    $graph->yaxis->HideZeroLabel();
    $graph->yaxis->HideLine(false);
    $graph->yaxis->HideTicks(false,false);

    $graph->xgrid->Show();
    $graph->xgrid->SetLineStyle("solid");
    $graph->xaxis->SetTickLabels($time);
    $graph->xaxis->SetLabelAngle(50);
    $graph->xgrid->SetColor('#E3E3E3');

    // Create the first line
    $p1 = new LinePlot($data);
    $graph->Add($p1);
    $p1->SetColor("#6495ED");

    // Output line
    $graph->Stroke();
	

?>
