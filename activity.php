<?php // content="text/plain; charset=utf-8"
date_default_timezone_set('America/Chicago');
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');

$datay1 = array(3,3,3,3,4);

// Setup the graph
$graph = new Graph(300,250);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->SetBox(false);
$graph->title->Set('Fancy Graph');
$graph->subtitle->Set('(Not Live Yet)');
$graph->xaxis->title->Set('Time Passing');
$graph->yaxis->title->Set('# of Players');

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels(array(date('gA', strtotime('-4 hour')), date('gA', strtotime('-3 hour')), date('gA', strtotime('-2 hour')), date('gA', strtotime('-1 hour')), date('gA')));
$graph->xgrid->SetColor('#E3E3E3');

//$graph->setScale('intlin');

// Create the first line
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('Player Count');

$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();

?>
