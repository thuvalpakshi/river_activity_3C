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

$msg_html = elgg_get_plugin_setting('html_msg', 'river_activity_3C');
$title = elgg_echo('river_activity_3C:html');
$box_view = elgg_get_plugin_setting('view_riverbox', 'river_activity_3C');

if($msg_html){
    $river_body = $msg_html;
}else{
    $river_body = elgg_echo('river_activity_3C:html-no');
}

echo elgg_view_module($box_view, $title, $river_body);

