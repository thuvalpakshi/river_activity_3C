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

if (elgg_is_active_plugin('event_manager')) {
        $title = elgg_echo('river_activity_3C:event');
	$num =  (int) elgg_get_plugin_setting('num_event', 'river_activity_3C');
        $box_view = elgg_get_plugin_setting('view_riverbox', 'river_activity_3C');
        
        
        $event_options = array("limit" => 10);

	elgg_push_context('widgets');
	$events = event_manager_search_events($event_options);

	$latest_events = elgg_view_entity_list($events['entities'], array("count" => $events["count"], "offset" => 0, "limit" => $num, "pagination" => false, "full_view" => false));

        if ($latest_events) {

                $river_body = '<marquee behavior="scroll" direction="up" scrollamount="2" onmouseover="stop()" onmouseout="start()" style="overflow:hidden;">'.$latest_events.'</marquee>';

	elgg_pop_context();

                $river_body .= '<p style="text-align:right; margin:3px 3px;"><a href="'.elgg_get_site_url().'events"><b>'.elgg_echo('river_activity_3C:viewmore').'</b></a></p>';
        }else {
                $river_body = elgg_echo ('river_activity_3C:event-no');
                $river_body .= '<p style="text-align:right; margin:3px 3px;"><a href="'.elgg_get_site_url().'events/event/new"><b>'.elgg_echo('river_activity_3C:Addevent').'</b></a></p>';
        }

echo elgg_view_module($box_view, $title, $river_body);

}
