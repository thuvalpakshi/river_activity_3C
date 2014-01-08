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


if (elgg_is_logged_in()) {
$user = elgg_get_logged_in_user_entity();
    $img_icon = $user->getIconURL('large');
    echo "<center><img src=\"".$img_icon."\" width=\"156px\" alt=\"".$user->name."\" title=\"".$user->name."\"/></center>";
		if(elgg_is_active_plugin('profile_manager')){
                $today = date('m/d');
		$bday = elgg_get_plugin_setting('birth_day', 'river_activity_3C');
                $dob = strtotime($user->$bday);
                $birthdate = date('m/d', $dob);
                $name = $user->name;
                if ($birthdate == $today){
			echo '<div id="dob">'.elgg_echo('river_activity_3C:welcome').'<br />'.sprintf($name).'!'.elgg_echo('river_activity_3C:birthdaywish').'</div>';
                }else{
			echo '<div id="welcome">'.elgg_echo('river_activity_3C:welcome').'<br /> '.sprintf($name).'!</div>';
                     }
                }else{
		$name = $user->name;
		echo '<div id="welcome">'.elgg_echo('river_activity_3C:welcome').'<br /> '.sprintf($name).'!</div>';
	}
        if (elgg_get_plugin_setting('member_status','river_activity_3C') == 'yes'){
                $membersince = elgg_echo('river_activity_3C:membersince');
                $memberdate = date("j, F Y", $user->time_created);
                $lastlogin = elgg_echo('river_activity_3C:lastlogin');
                if ($user->prev_last_login != 0){
                $lastlogindate = date("j, F Y. h:i:s A", $user->prev_last_login);
                }else{
                $lastlogindate = elgg_echo('river_activity_3C:notloggedin');
                }
               echo '<div id="mem"><div id="left">'.$membersince.' :</div><div id="right">'.$memberdate.'</div><div id="left">'.$lastlogin.' :</div><div id="right">'.$lastlogindate.'</div></div>';
        }
        }
?>

<?php if (elgg_get_plugin_setting('links','river_activity_3C') == 'yes'){ ?>

<ul class="elgg-menu elgg-menu-page elgg-menu-page-default">

    <li class="elgg-menu"><a href="<?php echo elgg_get_site_url(); ?>profile/<?php echo $user->username; ?>/edit/"><img alt=""  src="<?php echo elgg_get_site_url(); ?>mod/river_activity_3C/graphics/icons/settings.png" style="vertical-align: middle; "/><?php echo elgg_echo('river_activity_3C:editprofile'); ?></a></li>
    <li class="elgg-menu"><a href="<?php echo elgg_get_site_url(); ?>avatar/edit/<?php echo $user->username; ?>/"><img alt=""  src="<?php echo elgg_get_site_url(); ?>mod/river_activity_3C/graphics/icons/profile.png" style="vertical-align: middle; "/><?php echo elgg_echo('river_activity_3C:editavatar'); ?></a></li>
    <?php if (elgg_is_active_plugin('messageboard')){ ?>
    <li class="elgg-menu"><a href="<?php echo elgg_get_site_url(); ?>messageboard/owner/<?php echo $user->username; ?>"><img alt=""  src="<?php echo elgg_get_site_url(); ?>mod/river_activity_3C/graphics/icons/questions.png" style="vertical-align: middle; "/><?php echo elgg_echo('river_activity_3C:messageboard'); ?></a></li>
    <?php } 

    if (elgg_is_active_plugin('messages')){
	$num_messages = messages_count_unread();
	if($num_messages){
		$num = $num_messages;
	} else {
		$num = 0;
	}
	if($num == 0){
?>

<li class="elgg-menu"><a href="<?php echo elgg_get_site_url(); ?>messages/inbox/<?php echo $user->username; ?>"><img src="<?php echo elgg_get_site_url(); ?>mod/river_activity_3C/graphics/icons/mail.png" style="vertical-align: middle; "/><?php echo elgg_echo('river_activity_3C:inbox'); ?></a></li>
<?php } else { ?>
<li class="elgg-menu"><a href="<?php echo elgg_get_site_url(); ?>messages/inbox/<?php echo $user->username; ?>"><img src="<?php echo elgg_get_site_url(); ?>mod/river_activity_3C/graphics/icons/mail.png" style="vertical-align: middle; "/><font color="red"><?php echo elgg_echo('river_activity_3C:inbox'); ?> [<?php echo $num; ?>]</font></a></li>
<?php  }} 
    if (elgg_is_active_plugin('friend_request')){
        $requests = array(
			"type" => "user",
			"relationship" => "friendrequest",
			"relationship_guid" => elgg_get_logged_in_user_guid(),
			"inverse_relationship" => true,
			"count" => true
		);

	$count = elgg_get_entities_from_relationship($requests);

	if(!empty($count)){
?>
<li class="elgg-menu"><a href="<?php echo elgg_get_site_url(); ?>friend_request/<?php echo $user->username; ?>"><img alt=""  src="<?php echo elgg_get_site_url(); ?>mod/river_activity_3C/graphics/icons/friends.png" style="vertical-align: middle; "/><font color="red"><?php echo elgg_echo('river_activity_3C:friendrequest'); ?>[<?php echo $count; ?>]</font></a></li>
<?php } else { ?>
<li class="elgg-menu"><a href="<?php echo elgg_get_site_url(); ?>friend_request/<?php echo $user->username; ?>"><img alt=""  src="<?php echo elgg_get_site_url(); ?>mod/river_activity_3C/graphics/icons/friends.png" style="vertical-align: middle; "/><?php echo elgg_echo('river_activity_3C:friendrequest'); ?></a></li>
<?php }} if (elgg_is_active_plugin('members')){ ?>
<li class="elgg-menu"><a href="<?php echo elgg_get_site_url(); ?>invite/"><img alt=""  src="<?php echo elgg_get_site_url(); ?>mod/river_activity_3C/graphics/icons/home.png" style="vertical-align: middle; "/><?php echo elgg_echo('river_activity_3C:invites'); ?></a></li>
<li class="elgg-menu"><a href="<?php echo elgg_get_site_url(); ?>members/"><img alt=""  src="<?php echo elgg_get_site_url(); ?>mod/river_activity_3C/graphics/icons/members.png" style="vertical-align: middle; "/><?php echo elgg_echo('river_activity_3C:members'); ?></a></li>
<?php } if (elgg_is_active_plugin('groups')){ ?>
<li class="elgg-menu"><a href="<?php echo elgg_get_site_url(); ?>groups/all?filter=discussion"><img alt=""  src="<?php echo elgg_get_site_url(); ?>mod/river_activity_3C/graphics/icons/groups.png" style="vertical-align: middle; "/><?php echo elgg_echo('river_activity_3C:discussions'); ?></a></li>
<li class="elgg-menu"><a href="<?php echo elgg_get_site_url(); ?>groups/invitations/<?php echo $user->username; ?>"><img alt=""  src="<?php echo elgg_get_site_url(); ?>mod/river_activity_3C/graphics/icons/help.png" style="vertical-align: middle; "/><?php echo elgg_echo('river_activity_3C:invitation'); ?></a></li>
<?php } if (elgg_is_active_plugin('bookmarks')){ ?>
<li class="elgg-menu"><a href="<?php echo elgg_get_site_url(); ?>bookmarks/all/"><img alt=""  src="<?php echo elgg_get_site_url(); ?>mod/river_activity_3C/graphics/icons/favorites.png" style="vertical-align: middle; "/><?php echo elgg_echo('river_activity_3C:bookmarks'); ?></a></li>
<?php } ?>
<li class="elgg-menu"><a href="<?php echo elgg_get_site_url(); ?>settings/user/<?php echo $user->username; ?>"><img alt=""  src="<?php echo elgg_get_site_url(); ?>mod/river_activity_3C/graphics/icons/task.png" style="vertical-align: middle; "/><?php echo elgg_echo('river_activity_3C:setting'); ?></a></li>

</ul>
<?php } ?>

