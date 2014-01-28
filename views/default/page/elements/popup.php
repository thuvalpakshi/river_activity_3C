<?php
/*
 * Satheesh PM, BARC Mumbai
 * www.satheesh.anushaktinagar.net
*/
if (elgg_is_logged_in()){
$msg_html = '<center><h2>'.elgg_echo('river_activity_3C:imp_msg').'</h2></center><br />';
$msg_html .= elgg_get_plugin_setting('html_msg', 'river_activity_3C');
$member = elgg_get_logged_in_user_entity();

if ((elgg_get_context() == 'activity') and ($member->show_popup == 'yes')){
echo '<div id="light" class="popup_content border_green">'.$msg_html.'<br /><br /><a href = "javascript:void(0)" onclick = "document.getElementById(\'light\').style.display=\'none\';document.getElementById(\'fade\').style.display=\'none\'"><b>Close</b></a></div>';
echo '<div id="fade" class="black_overlay"></div><a id="popup" href = "javascript:void(0)" onclick = "document.getElementById(\'light\').style.display=\'block\';document.getElementById(\'fade\').style.display=\'block\'"></a>';
}
$member->deleteMetadata('show_popup');


}