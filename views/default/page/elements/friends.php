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


$title = elgg_echo('river_activity_3C:friends');
$num = (int) elgg_get_plugin_setting('num_friends', 'river_activity_3C');
$box_view = elgg_get_plugin_setting('view_riverbox', 'river_activity_3C');

$friend = elgg_list_entities_from_relationship(array(
            'type' => 'user',
            "limit" => $num,
            'relationship' => 'friend',
            'relationship_guid' => elgg_get_logged_in_user_guid(),
            'inverse_relationship' => false,
            'full_view' => false,
            'pagination' => false,
            'list_type' => 'gallery',
            'gallery_class' => 'elgg-gallery-users',
            'order_by' => 'rand()' 
        ));


	if ($friend) {
		$river_body = $friend;
                $river_body .= '<p style="text-align:right; margin:3px 3px;"><a href="'.elgg_get_site_url().'friends/'.elgg_get_logged_in_user_entity()->username.'"><b>'.elgg_echo('river_activity_3C:viewmore').'</b></a></p>';
	}else {
            
            $river_body = elgg_echo ('river_activity_3C:friends-no');
            $river_body .= '<p style="text-align:right; margin:3px 3px;"><a href="'.elgg_get_site_url().'members"><b>'.elgg_echo('river_activity_3C:addfriends').'</b></a></p>';
        }
    echo elgg_view_module($box_view, $title, $river_body);


    
