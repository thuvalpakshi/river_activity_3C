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

if (elgg_is_active_plugin('tidypics')) {

       $title = elgg_echo('river_activity_3C:photo');
	$num =  (int) elgg_get_plugin_setting('num_photo', 'river_activity_3C');
        $box_view = elgg_get_plugin_setting('view_riverbox', 'river_activity_3C');
        
	$latest_photos = elgg_get_entities_from_metadata(array(
		"type" => "object",
		"subtype" => "album",
                "limit" => $num,
		"full_view" => false,
		"pagination" => false,
		"view_type_toggle" => false
        ));
	
        if ($latest_photos) {
                elgg_push_context('widgets');
                $river_body = '';
                foreach ($latest_photos as $latest_photo) {
                        $river_body .= elgg_view_entity($latest_photo, array('full_view' => false));
                }
                elgg_pop_context();
                $river_body .= '<p style="text-align:right; margin:3px 3px;"><a href="'.$vars["url"].'photos/all"><b>'.elgg_echo('river_activity_3C:viewmore').'</b></a></p>';
                echo elgg_view_module($box_view, $title, $river_body);
        }else {
            $river_body = elgg_echo ('river_activity_3C:photo-no');
            echo elgg_view_module($box_view, $title, $river_body);
        }
 
}

