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


$anyentitys = explode(",", elgg_get_plugin_setting('anyentity', 'river_activity_3C'));
$num =  (int) elgg_get_plugin_setting('num_anyentity', 'river_activity_3C');
$box_view = elgg_get_plugin_setting('view_riverbox', 'river_activity_3C');

foreach ($anyentitys as $anyentity)
{
        $title = elgg_echo('river_activity_3C:'.$anyentity);
	$latest_s = elgg_get_entities_from_metadata(array(
		"type" => "object",
		"subtype" => $anyentity,
                "limit" => $num,
		"full_view" => false,
		"pagination" => false,
		"view_type_toggle" => false
        ));
	
        if ($latest_s) {
                elgg_push_context('widgets');
                $river_body = '';
                foreach ($latest_s as $latest_) {
                        $river_body .= elgg_view_entity($latest_, array('full_view' => false));
                }
                elgg_pop_context();              
        }else {
            $river_body = elgg_echo ('river_activity_3C:anyentity-no');
        }
echo elgg_view_module($box_view, $title, $river_body);

}


