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


$box_view = elgg_get_plugin_setting('view_riverbox_sitemsg', 'river_activity_3C');
$messages  = elgg_get_plugin_setting('system_messages',  'river_activity_3C');
$title = elgg_echo('river_activity_3C:system_message');

if (elgg_get_context() == 'activity'){
    $river_body = '<div id="site_messages_activity">'.$messages.'</div>';
}else {
    $river_body = '<div id="site_messages">'.$messages.'</div>';
}

echo elgg_view_module($box_view, $title, $river_body);



