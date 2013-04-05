<?php 
	/*
	 * 3 Column River Acitivity
	 *
	 * @package ElggRiverDash
	 * Full Creadit goes to ELGG Core Team for creating a beautiful social networking script
	 *
         * Modified by Satheesh PM, BARC, Mumbai, India..
         * http://satheesh.anushaktinagar.net
         *
	 * @author ColdTrick IT Solutions
	 * @copyright Coldtrick IT Solutions 2009
	 * @link http://www.coldtrick.com/
	 * @version 1.0
        *
        */

?>

<?php

$start = elgg_get_plugin_setting('start_date',  'river_activity_3C');
$box_view = elgg_get_plugin_setting('view_riverbox', 'river_activity_3C');

$text = elgg_echo('river_activity_3C:part1').elgg_get_site_entity()->name.elgg_echo('river_activity_3C:part2');



$users = get_number_users();
$total = get_number_users(true);

if ($start){
$then = strtotime ($start);
$now = strtotime ("now");
$difference = $now - $then ;
$num = $difference/31557600;
$years = intval ($num);
$num2 = ($num-$years)*12;
$months = intval ($num2);
$num3 = ($num2 - $months)*30.45833;
$days = intval($num3);
$num4 = ($num3 - $days)*24;
$hours = intval($num4);
$num5 = ($num4 - $hours)*60;
$mins = intval($num5);
$num6 = ($num5 - $mins)*60;
$secs = intval($num6);


$title = elgg_echo('river_activity_3C:sitestatus');
$river_body = elgg_echo( "<div align='justify'><b>".$years.elgg_echo('river_activity_3C:year').$months.elgg_echo('river_activity_3C:month').$days.elgg_echo('river_activity_3C:day').$hours.elgg_echo('river_activity_3C:hour').$mins.elgg_echo('river_activity_3C:minute').$secs.elgg_echo('river_activity_3C:second')."</b> ".$text."<b>".$users."</b>". elgg_echo('river_activity_3C:part3') ."<b>".$total."</b>.</div>" );
if (elgg_is_logged_in()){
$river_body .= '<p style="text-align:right; margin:3px 3px;"><a href="'.elgg_get_site_url().'invite"><b>'.elgg_echo('river_activity_3C:invite').'</b></a></p>';
}
}else{
    $river_body = elgg_echo('river_activity_3C:site_status');
}

    if (elgg_is_logged_in()){
        echo elgg_view_module($box_view, $title, $river_body);
    }else{
        echo elgg_view_module('info', $title, $river_body);
    }


