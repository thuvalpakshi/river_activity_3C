<?php
/*
 * Satheesh PM, BARC Mumbai
 * www.satheesh.anushaktinagar.net
 */

$current_month_date = date('F', strtotime('now'));
$prev_month_date = date('F', strtotime('-1 months')); 
$next_month_date = date('F', strtotime('+1 months')); 

$tabs = array(
	'prev_month' => array(
		'title' => elgg_echo(elgg_echo('river_activity_3C:birthdays').' in '.$prev_month_date),
		'url' => "river_activity_3C/prev_month",
		'selected' => $vars['selected'] == 'prev_month',
	),
        'current_month' => array(
		'title' => elgg_echo(elgg_echo('river_activity_3C:birthdays').' in '.$current_month_date),
		'url' => "river_activity_3C/current_month",
		'selected' => $vars['selected'] == 'current_month',
	),
	'next_month' => array(
		'title' => elgg_echo(elgg_echo('river_activity_3C:birthdays').' in '.$next_month_date),
		'url' => "river_activity_3C/next_month",
		'selected' => $vars['selected'] == 'next_month',
	),


   
);

echo elgg_view('navigation/tabs', array('tabs' => $tabs));
