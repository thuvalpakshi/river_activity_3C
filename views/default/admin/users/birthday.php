<?php
/*
 * Satheesh PM, BARC Mumbai
 * www.satheesh.anushaktinagar.net
*/


ini_set('max_execution_time', 1800);

$mt = microtime(true);
if (elgg_is_active_plugin('profile_manager')){
    
$bday = elgg_get_plugin_setting('birth_day', 'river_activity_3C');
$title = elgg_echo('river_activity_3C:birthdays');
elgg_set_ignore_access(true);

$options = array(
    'metadata_names' => $bday,
    'types' => 'user',
    'limit' => false,
    'full_view' => false,
    'pagination' => false,
);

$birthday_members = new ElggBatch('elgg_get_entities_from_metadata', $options);

$body = '<table width="100%" border="1px"><tr><td><b>Member Name</b><br /></td><td><b>DOB Entered</b><br /></td><td><b>Formatted DOB<br /></b></td><td><b>Member Guid</b><br /></td></tr>';
$dob = '';
if ($birthday_members){
$counter_m = '';

foreach ($birthday_members as $birthday_member) {
        
        $dob = strtotime($birthday_member->$bday);
        $birthmonth = date('m', $dob);
        $bd = date('F, d Y', $dob);

        if((!isset($birthday_member->BD_month)) || ($birthday_member->BD_month != $birthmonth)){
    	$birthday_member->BD_month = $birthmonth;
    	$counter_m .= $birthday_member->name.", ";
        }
        $body .= '<tr><td>'.$birthday_member->name.'</td><td>'.$birthday_member->$bday.'</td><td>'.$bd.'</td><td>'.$birthday_member->guid.'</td></tr>';
}
$body .= "</table>";

$title_change = "Members Changed Their Birthday Month";
$body_change = $counter_m;
echo elgg_view_module('inline', $title_change, $body_change);

echo elgg_view_module('inline', $title, $body);

}else{
$body = "There is no birthday members";
echo elgg_view_module('inline', $title, $body);
}

elgg_set_ignore_access(false);


/*
//Function to delete the non-proper birthdays in profile

$bday = elgg_get_plugin_setting('birth_day', 'river_activity_3C');
$title = elgg_echo('river_activity_3C:birthdays');

elgg_set_ignore_access(true);

$membs = array('77946', '87293', '80838', '46259', '88466', '70025', '61854', '76435', '84255', '64505', '86566', '55721', '41808', '57323', '83439', '87541', '69616', '41594', '86693', '86014', '72150', '83512', '81158', '67017', '82484', '80249', '79165', '83144', '88660', '80978', '79601', '67548', '12977', '2406', '88417', '77456', '88543', '79985', '79082', '87278', '80793', '63126', '79708', '87650', '15513', '59604', '85184', '79103', '20466', '5929', '86061', '61821', '24708', '23705', '9184', '86262', '80927', '61263', '42801', '82665', '82698', '79579', '83302', '79895', '77097', '72975', '57162', '55758', '55227', '20170', '16033', '23324', '88288', '88650', '16084', '63597', '20214', '60699', '87711', '42526', '70575', '80940', '82549', '61642', '68902', '49605', '6937', '68588', '87433', '84387', '84815', '68486', '12568', '2293', '61632', '68553', '45104', '87491', '55286', '68303', '67055', '49622', '72393', '43702', '2157', '19208', '87777', '64517', '80679', '78593', '88035', '43693', '80327', '68072', '73928', '1811', '4870', '36877', '69939', '45690', '6181', '68129', '5467', '80952', '82342', '79423', '57415', '79742', '61938', '79389', '79299', '72798', '79457', '70086', '78142', '41284');
$body = '';
foreach ($membs as $memb){
$member = get_user($memb);

$member->deleteMetadata($bday);
$body .= elgg_view_entity_icon($member, 'small');
}

echo elgg_view_module('inline', $title, $body);

elgg_set_ignore_access(false);
*/


}else{
    $title = elgg_echo('river_activity_3C:birthdays');
    $body = elgg_echo ('river_activity_3C:birthdays-no');
    echo elgg_view_module('inline', $title, $body);
}

echo sprintf("Time taken: %.4fs\n", microtime(true) - $mt);