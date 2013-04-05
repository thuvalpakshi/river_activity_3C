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




$title = elgg_echo('river_activity_3C:horoscope');
$box_view = elgg_get_plugin_setting('view_riverbox', 'river_activity_3C');


$horoscopes = array(aries, taurus, gemini, cancer, leo, virgo, libra, scorpio, sagittarius, capricorn, aquarius, pisces);
$horo_body = '';

foreach ($horoscopes as $horoscope){

$horo_body .= '<div title="'.$horoscope.'"><a href="#" onclick="window.open(\'http://www.eastrolog.com/webmaster-new/daily-horoscope/'.$horoscope.'-horoscope.php\',\''.strtoupper($horoscope).'\',\'width=350,height=250,left=\'+(screen.availWidth/2-180)+\',top=\'+(screen.availHeight/2-140)+\'\');return false;" title="'.strtoupper($horoscope).' HOROSCOPE" ><img src="'.elgg_get_site_url().'mod/river_activity_3C/graphics/horoscope/'.$horoscope.'.png" width="100px"/><br />'.strtoupper($horoscope).'</a></div>';

}

$river_body = '<div id="horoscope">'.$horo_body.'</div>';

echo elgg_view_module($box_view, $title, $river_body);

