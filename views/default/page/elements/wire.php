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



if (elgg_is_active_plugin('thewire')){
$title = elgg_echo('river_activity_3C:wire');
//$river_body = elgg_view_form('thewire/add', array('name' => 'river_activity_3C_wire'));
$river_body = elgg_view('page/elements/forms');
$box_view = elgg_get_plugin_setting('view_riverbox_wire', 'river_activity_3C');

echo elgg_view_module($box_view, '', $river_body);
}



//echo elgg_view('page/elements/forms');