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

if (elgg_is_active_plugin('members')) {
    

    $title = elgg_echo('river_activity_3C:newestmembers');
    $num = (int) elgg_get_plugin_setting('num_new', 'river_activity_3C');
    $box_view = elgg_get_plugin_setting('view_riverbox', 'river_activity_3C');

    $options = array(
	'types' => 'user',
	'limit' => $num,
	'full_view' => false,
	'pagination' => false,
	'list_type' => 'gallery',
	'gallery_class' => 'elgg-gallery-users',
	'size' => 'tiny',
        );
    
    if (elgg_get_plugin_setting('view_avatar', 'river_activity_3C') == yes){
        $options['metadata_names'] = 'icontime';
        $river_body = elgg_list_entities_from_metadata ($options);
    }else{
        $river_body = elgg_list_entities_from_metadata ($options);
    }
    
    if (elgg_is_logged_in()){
    $river_body .= '<p style="text-align:right; margin:3px 3px;"><a href="'.elgg_get_site_url().'members"><b>'.elgg_echo('river_activity_3C:viewmore').'</b></a></p>';
        echo elgg_view_module($box_view, $title, $river_body);
    }else{
        $options['limit'] = '12';
        $river_body = elgg_list_entities_from_metadata ($options);
        echo elgg_view_module('info', $title, $river_body);
    }
    
    }
    
