<?php
/*
 * Satheesh PM, BARC Mumbai
 * www.satheesh.anushaktinagar.net
 */

elgg_push_breadcrumb(elgg_echo("river_activity_3C:birthdays"), "river_activity_3C/");

$current_month_date = date('F', strtotime('now'));
$prev_month_date = date('F', strtotime('-1 months')); 
$next_month_date = date('F', strtotime('+1 months')); 

switch ($vars['page']) {

        case 'prev_month':
		$content = elgg_view('page/birthdays/prev_month');
                elgg_push_breadcrumb(elgg_echo(elgg_echo('river_activity_3C:birthdays').' in '.$prev_month_date));
		break;
	case 'next_month':
		$content = elgg_view('page/birthdays/next_month');	
                elgg_push_breadcrumb(elgg_echo(elgg_echo('river_activity_3C:birthdays').' in '.$next_month_date));	
                break;
	case 'current_month':
        default:    
		$content = elgg_view('page/birthdays/current_month');
                elgg_push_breadcrumb(elgg_echo(elgg_echo('river_activity_3C:birthdays').' in '.$current_month_date));	
		break;
}



$title = elgg_echo("river_activity_3C:birthdays");
	
$body = elgg_view_layout('content', array(
	'content' => $content,
        'sidebar' => elgg_view('river_activity_3C/sidebar'),
	'title' => $title,
	'filter_override' => elgg_view('river_activity_3C/nav', array('selected' => $vars['page'])),
        ));


echo elgg_view_page($title, $body);
