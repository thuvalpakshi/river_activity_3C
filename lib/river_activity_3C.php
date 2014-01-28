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

function river_activity_3C_page_handler($page) {
    $base = elgg_get_plugins_path() . 'river_activity_3C/pages/river_activity_3C/';
    if (!isset($page[0])) {
        $page[0] = 'current_month';
    }
    $vars = array();
    $vars['page'] = $page[0];
    require_once "$base/index.php";
    return true;
}

function river_activity_3C_login_check(){
    $bday = elgg_get_plugin_setting('birth_day', 'river_activity_3C');
    if(!isset(elgg_get_logged_in_user_entity()->show_popup)){
    	elgg_get_logged_in_user_entity()->show_popup = 'yes';
    }else{
        elgg_get_logged_in_user_entity()->show_popup = 'yes';
    }

    if(elgg_get_logged_in_user_entity()->$bday){
    if((!isset(elgg_get_logged_in_user_entity()->BD_month)) || (elgg_get_logged_in_user_entity()->BD_month != date('m', strtotime(elgg_get_logged_in_user_entity()->$bday)))){
    	elgg_get_logged_in_user_entity()->BD_month = date('m', strtotime(elgg_get_logged_in_user_entity()->$bday));
        }
    }
}

//Functions For sending out Birthday Wishes.
function river_activity_3C_bday_mailer($hook, $entity_type, $returnvalue, $params){
        
        $bday = elgg_get_plugin_setting('birth_day', 'river_activity_3C');
        elgg_set_ignore_access(true);
        $siteurl = elgg_get_site_entity()->url;
        $sitename = elgg_get_site_entity()->name;
        $siteemail = elgg_get_site_entity()->email;
        $from = $sitename.' <'.$siteemail.'>';
        $month = date('m', strtotime("now"));
    
        $options = array(
            'metadata_names' => 'BD_month',
            'metadata_values' => $month,
            'types' => 'user',
            'limit' => false,
            'full_view' => false,
            'pagination' => false,
            
        );

        $bd_users = new ElggBatch('elgg_get_entities_from_metadata', $options);
        $bd_today = date('j, F', strtotime('now')); 
        
        foreach ($bd_users as $bd_user){
            $bd_name = $bd_user->name;
            $bd_email = $bd_user->email;
            $bd_day = date('j, F', strtotime($bd_user->$bday));
        if ($bd_day == $bd_today){
            if($bd_email){
            $message = elgg_echo('river_activity_3C:bday_message', array($bd_name, $bd_day, $sitename, $siteurl));
            elgg_send_email($from, $bd_email, elgg_echo('river_activity_3C:bday_message:subject'), $message);
            $result = elgg_echo("river_activity_3C:bday_mailer_cron_true");
            }else{
            $result = elgg_echo("river_activity_3C:bday_mailer_cron_false");
            }
        }
        }
        elgg_set_ignore_access(false);
        return $returnvalue.$result;
}


