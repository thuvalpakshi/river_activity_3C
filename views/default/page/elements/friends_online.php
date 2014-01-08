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



$title = elgg_echo('river_activity_3C:friendsonline');
$box_view = elgg_get_plugin_setting('view_riverbox', 'river_activity_3C');

$onlinefriends = elgg_get_entities_from_relationship(array(
            'type' => 'user',
            "limit" => false,
            'relationship' => 'friend',
            'relationship_guid' => elgg_get_logged_in_user_guid(),
            'inverse_relationship' => false,
            'full_view' => false,
            'pagination' => false,
            'list_type' => 'gallery',
            'gallery_class' => 'elgg-gallery-users',
        ));

   elgg_push_context('widgets');
    $river_body = '';
    foreach ($onlinefriends as $onlinefriend){
        if (($onlinefriend->last_action)-(time()-600)>0){
            $river_body .= elgg_view_entity_icon($onlinefriend, 'tiny', array('full_view' => false, 'pagination' => false,));
        }

    }            
    elgg_pop_context();
    if($river_body){
    echo elgg_view_module($box_view, $title, $river_body);
    }else {
    $river_body = elgg_echo('river_activity_3C:friendsonline-no');
    echo elgg_view_module($box_view, $title, $river_body);
}



