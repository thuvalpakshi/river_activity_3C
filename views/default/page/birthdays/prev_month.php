<?php
/*
 * Satheesh PM, BARC Mumbai
 * www.satheesh.anushaktinagar.net
*/


$bday = elgg_get_plugin_setting('birth_day', 'river_activity_3C');

$current_month_date = date('F', strtotime('now'));
$prev_month_date = date('F', strtotime('-1 months')); 
$next_month_date = date('F', strtotime('+1 months'));
$month = $prev_month_date;

$title = elgg_echo(elgg_echo('river_activity_3C:birthdays_in_month').' in '.$month);

elgg_set_ignore_access(true);

$options = array(
    'metadata_names' => $bday,
    'types' => 'user',
    'limit' => false,
    'full_view' => false,
    'pagination' => false,
    'order_by_metadata' => array('name' => $bday, 'direction' => ASC, 'as' => 'integer')
);

$birthday_members = new ElggBatch('elgg_get_entities_from_metadata', $options);    
elgg_set_ignore_access(false);
$body = '';

if ($birthday_members) {

    foreach ($birthday_members as $birthday_member) {
        $dob = strtotime($birthday_member->$bday);
        $birthmonth = date('F', $dob);
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


