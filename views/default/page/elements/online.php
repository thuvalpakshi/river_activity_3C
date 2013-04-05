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



$title = elgg_echo('river_activity_3C:online');
$box_view = elgg_get_plugin_setting('view_riverbox', 'river_activity_3C');
   	
$onlineusers = array(
		'type' => 'user', 
		'limit' => false,
		"relationship" => "member_of_site",
		"relationship_guid" => $vars["config"]->site_guid,
		"inverse_relationship" => TRUE,
                "joins" => array("JOIN " . $vars["config"]->dbprefix . "users_entity ue ON e.guid = ue.guid"),
		"wheres" => array("ue.last_action >= " . (time() - 600)),
		"order_by" => "ue.last_action desc",
		"full_view" => FALSE,
		"pagination" => FALSE,
                "list_type" => "Gallery",
                "gallery_class" => "elgg-gallery-users",
                "size" => "tiny",
                );
    $river_body = elgg_list_entities_from_relationship($onlineusers);
    
    if (elgg_is_logged_in()){
        echo elgg_view_module($box_view, $title, $river_body);
    }else{
        echo elgg_view_module('info', $title, $river_body);
    }
    

