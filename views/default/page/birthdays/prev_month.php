<?php
/*
 * Satheesh PM, BARC Mumbai
 * www.satheesh.anushaktinagar.net
*/

if (elgg_is_active_plugin('profile_manager')){

$bday = elgg_get_plugin_setting('birth_day', 'river_activity_3C');

$day15 = strtotime(date('15 F Y'));
$prev_month_date = date('F', strtotime('-1 months', $day15)); 
$month = date('m', strtotime("-1 months", $day15));

$title = elgg_echo(elgg_echo('river_activity_3C:birthdays_in_month').' in '.$prev_month_date);

elgg_set_ignore_access(true);

$options = array(
            'metadata_names' => 'BD_month',
            'metadata_values' => $month,
            'types' => 'user',
            'limit' => false,
            'full_view' => false,
            'pagination' => false,
            
        );

$birthday_members = new ElggBatch('elgg_get_entities_from_metadata', $options);    
elgg_set_ignore_access(false);
$body = '';

if ($birthday_members) {

    foreach ($birthday_members as $birthday_member) {
        $dob = strtotime($birthday_member->$bday);
        $birthmonth = date('m', $dob);
        $bd = date('d, F', $dob);
        
        if($birthmonth == $month){
                    $body .= elgg_view_entity_icon($birthday_member, 'medium');
            }

    }
    echo elgg_view_module('info', $title, $body);
}else {
    $body = elgg_echo ('river_activity_3C:birthdays-no');
    echo elgg_view_module('info', $title, $body);
}
}else{
    $title = elgg_echo('river_activity_3C:birthdays');
    $river_body = elgg_echo ('river_activity_3C:birthdays-no');
    echo elgg_view_module($box_view, $title, $river_body);
    
}

