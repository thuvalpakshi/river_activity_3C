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

if (elgg_is_active_plugin('profile_manager')){

        $title = elgg_echo('river_activity_3C:birthdays');
        $title_today = elgg_echo('river_activity_3C:today');
        $title_tomorrow = elgg_echo('river_activity_3C:tomorrow');
        $title_upcoming = elgg_echo('river_activity_3C:upcoming');
        $box_view = elgg_get_plugin_setting('view_riverbox', 'river_activity_3C');
        $bday = elgg_get_plugin_setting('birth_day', 'river_activity_3C');
        $bday_view = elgg_get_plugin_setting('view_birthday', 'river_activity_3C');
        
        $today = date('m, d', strtotime("now"));
        $tomorrow = date('m, d', strtotime("+1 day"));
        $upcoming =  date('m, d', strtotime("+15 day"));

        $day15 = strtotime(date('15 F Y'));
        $month_now = date('m', strtotime("0 months", $day15));
        $month_next = date('m', strtotime("+1 months", $day15));

        $options = array(
            'metadata_names' => 'BD_month',
            'metadata_values' => array($month_now, $month_next),
            'types' => 'user',
            'limit' => false,
            'full_view' => false,
            'pagination' => false,
            
        );
        
        $birthday_members = new ElggBatch('elgg_get_entities_from_metadata', $options);
          
        if ($birthday_members) {
                elgg_push_context('widgets');
                $dob_today = '';
                $dob_tomorrow = '';
                $dob_upcoming = '';
        
                foreach ($birthday_members as $birthday_member) {
                    $dob = strtotime($birthday_member->$bday);
                    $birthmonth = date('m', $dob);
                    $birthdate = date('m, d', $dob);
                    $bd = date('d, F', $dob);
                
                if ($bday_view == 'icon'){
                        if ($birthdate == $today){
			$dob_today .= elgg_view_entity_icon($birthday_member, 'tiny', array($options));
			}else if ($birthdate == $tomorrow){
			$dob_tomorrow .= elgg_view_entity_icon($birthday_member, 'tiny', array($options));
                      	}else if (($birthdate > $tomorrow) && ($birthdate <= $upcoming)){
			$dob_upcoming .= elgg_view_entity_icon($birthday_member, 'tiny', array($options));
			}
                }else {
                        if ($birthdate == $today){
			$dob_today .= elgg_view_entity($birthday_member, array($options)).$bd;
			}else if ($birthdate == $tomorrow){
			$dob_tomorrow .= elgg_view_entity($birthday_member, array($options)).$bd;
                      	}else if (($birthdate > $tomorrow) && ($birthdate <= $upcoming) ){
			$dob_upcoming .= elgg_view_entity($birthday_member, array($options)).$bd;
			}
                }}
                elgg_pop_context();
                
                if ($dob_today) {
                    $dob_today .= '<p style="text-align:right; margin:3px 3px;"><a href="'.elgg_get_site_url().'river_activity_3C"><b>'.elgg_echo('river_activity_3C:viewmore').'</b></a></p>';
                    echo elgg_view_module($box_view, $title_today, $dob_today);
                    } 
                if ($dob_tomorrow){
                    $dob_today .= '<p style="text-align:right; margin:3px 3px;"><a href="'.elgg_get_site_url().'river_activity_3C"><b>'.elgg_echo('river_activity_3C:viewmore').'</b></a></p>';
                    echo elgg_view_module($box_view, $title_tomorrow, $dob_tomorrow);
                    } 
                if ($dob_upcoming){
                    $dob_today .= '<p style="text-align:right; margin:3px 3px;"><a href="'.elgg_get_site_url().'river_activity_3C"><b>'.elgg_echo('river_activity_3C:viewmore').'</b></a></p>';
                    echo elgg_view_module($box_view, $title_upcoming, $dob_upcoming);
                    } 
        }else {
            $river_body = elgg_echo ('river_activity_3C:birthdays-no');
                    echo elgg_view_module($box_view, $title, $river_body);
                    } 
}else{
    $title = elgg_echo('river_activity_3C:birthdays');
    $river_body = elgg_echo ('river_activity_3C:birthdays-no');
    echo elgg_view_module($box_view, $title, $river_body);
}

