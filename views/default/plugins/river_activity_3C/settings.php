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

//Thanks

    echo "<div class='admin_settings'>".elgg_echo('river_activity_3C:thankyou')."</div>";
    
//Layout
    
    echo "<h3>".elgg_echo('river_activity_3C:layout')."</h3>";
    echo "<div class='admin_settings'>".elgg_echo('river_activity_3C:view_river')." : ";
    echo elgg_view('input/dropdown', array(
            'name' => 'params[view_river]',
            'options_values' => array(
                    '2C' => elgg_echo('river_activity_3C:2C'),
                    '3C' => elgg_echo('river_activity_3C:3C'),
            ),
            'value' => $vars['entity']->view_river,
            ));

    echo "<br />".elgg_echo('river_activity_3C:view_site')." : ";
    echo elgg_view('input/dropdown', array(
            'name' => 'params[view_site]',
            'options_values' => array(
                    '2C' => elgg_echo('river_activity_3C:2C'),
                    '3C' => elgg_echo('river_activity_3C:3C'),
            ),
            'value' => $vars['entity']->view_site,
            ));

    echo "<br />".elgg_echo('river_activity_3C:riverbox')." : ";
    echo elgg_view('input/dropdown', array(
            'name' => 'params[view_riverbox]',
            'options_values' => array(
                    'featured' => elgg_echo('river_activity_3C:featured'),
                    'info' => elgg_echo('river_activity_3C:info'),
                    'popup' => elgg_echo('river_activity_3C:popup'),
                    'aside' => elgg_echo('river_activity_3C:aside'),
            ),
            'value' => $vars['entity']->view_riverbox,
            ));
    echo "</div>";

//Profile and Links
    
    echo "<h3>".elgg_echo('river_activity_3C:profile')."</h3>";
    echo '<div class="admin_settings">'.elgg_echo('river_activity_3C:show_profile').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[show_profile]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->show_profile,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:pos').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[profile_pos]',
            'options_values' => array(
                    'right' => elgg_echo('river_activity_3C:right'),
                    'left' => elgg_echo('river_activity_3C:left')
            ),
            'value' => $vars['entity']->profile_pos,
            ));
    echo "<br />".elgg_echo('river_activity_3C:pir')." : ";
    echo elgg_view('input/text', array(
            'name' => "params[profile_pir]",
            'value' => $vars['entity']->profile_pir,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:member_status').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[member_status]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->member_status,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:links').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[links]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->links,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:iconimage').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[iconimage]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->iconimage,
            ));
    echo "</div>";


//Horoscope
    
    echo "<h3>".elgg_echo('river_activity_3C:horoscopes')."</h3>";
    echo '<div class="admin_settings">'.elgg_echo('river_activity_3C:show_horoscope').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[show_horoscope]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->show_horoscope,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:pos').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[horoscope_pos]',
            'options_values' => array(
                    'right' => elgg_echo('river_activity_3C:right'),
                    'left' => elgg_echo('river_activity_3C:left')
            ),
            'value' => $vars['entity']->horoscope_pos,
            ));
   echo "<br />".elgg_echo('river_activity_3C:pir')." : ";
   echo elgg_view('input/text', array(
            'name' => "params[horoscope_pir]",
            'value' => $vars['entity']->horoscope_pir,
            ));
    echo "</div>";

//Site Status
    
    echo "<h3>".elgg_echo('river_activity_3C:sitestatus')."</h3>";
    echo '<div class="admin_settings">'.elgg_echo('river_activity_3C:status').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[show_status]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->show_status,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:pos').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[status_pos]',
            'options_values' => array(
                    'right' => elgg_echo('river_activity_3C:right'),
                    'left' => elgg_echo('river_activity_3C:left')
            ),
            'value' => $vars['entity']->status_pos,
            ));
   echo "<br />".elgg_echo('river_activity_3C:pir')." : ";
   echo elgg_view('input/text', array(
            'name' => "params[status_pir]",
            'value' => $vars['entity']->status_pir,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:start_date').'  :  ';
    echo elgg_view('input/date', array(
                'name' => 'params[start_date]',
                'value' => $vars['entity']->start_date,
            ));
    echo '</div>';

//Bookmarks
    
    if (elgg_is_active_plugin('bookmarks')){
    echo "<h3>".elgg_echo('river_activity_3C:bookmark')."</h3>";
    echo '<div class="admin_settings">'.elgg_echo('river_activity_3C:show_bookmark').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[show_bookmark]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->show_bookmark,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:pos').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[bookmark_pos]',
            'options_values' => array(
                    'right' => elgg_echo('river_activity_3C:right'),
                    'left' => elgg_echo('river_activity_3C:left')
            ),
            'value' => $vars['entity']->bookmark_pos,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:number').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => "params[num_bookmark]",
            'options_values' => array('1' =>'1','2' => '2','3' => '3','4' => '4','5' => '5'),
            'value' => $vars['entity']->num_bookmark,
            ));
   echo "<br />".elgg_echo('river_activity_3C:pir')." : ";
   echo elgg_view('input/text', array(
            'name' => "params[bookmark_pir]",
            'value' => $vars['entity']->bookmark_pir,
            ));
    echo "</div>";
    }  else {
    echo '<div class="admin_settings"><font color="red"><b>'.elgg_echo('river_activity_3C:bookmark_active').'</b></font></div>';
    }

//Files
    
    if (elgg_is_active_plugin('file')){
    echo "<h3>".elgg_echo('river_activity_3C:file')."</h3>";
    echo '<div class="admin_settings">'.elgg_echo('river_activity_3C:show_file').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[show_file]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->show_file,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:pos').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[file_pos]',
            'options_values' => array(
                    'right' => elgg_echo('river_activity_3C:right'),
                    'left' => elgg_echo('river_activity_3C:left')
            ),
            'value' => $vars['entity']->file_pos,
            ));
   echo "<br />".elgg_echo('river_activity_3C:pir')." : ";
   echo elgg_view('input/text', array(
            'name' => "params[file_pir]",
            'value' => $vars['entity']->file_pir,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:number').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => "params[num_file]",
            'options_values' => array('1' =>'1','2' => '2','3' => '3','4' => '4','5' => '5'),
            'value' => $vars['entity']->num_file,
            ));
    echo "</div>";
    }  else {
    echo '<div class="admin_settings"><font color="red"><b>'.elgg_echo('river_activity_3C:file_active').'</b></font></div>';
    }

//Blogs
    
    if (elgg_is_active_plugin('blog')){
    echo "<h3>".elgg_echo('river_activity_3C:blog')."</h3>"; 
    echo '<div class="admin_settings">'.elgg_echo('river_activity_3C:show_blog').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[show_blog]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->show_blog,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:pos').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[blog_pos]',
            'options_values' => array(
                    'right' => elgg_echo('river_activity_3C:right'),
                    'left' => elgg_echo('river_activity_3C:left')
            ),
            'value' => $vars['entity']->blog_pos,
            ));
   echo "<br />".elgg_echo('river_activity_3C:pir')." : ";
   echo elgg_view('input/text', array(
            'name' => "params[blog_pir]",
            'value' => $vars['entity']->blog_pir,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:number').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => "params[num_blog]",
            'options_values' => array('1' =>'1','2' => '2','3' => '3','4' => '4','5' => '5'),
            'value' => $vars['entity']->num_blog,
            ));
    echo "</div>";
    }  else {
    echo '<div class="admin_settings"><font color="red"><b>'.elgg_echo('river_activity_3C:blog_active').'</b></font></div>';
    }
    
    
//Events
    
    if (elgg_is_active_plugin('event_manager')){
    echo "<h3>".elgg_echo('river_activity_3C:event')."</h3>"; 
    echo '<div class="admin_settings">'.elgg_echo('river_activity_3C:show_event').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[show_event]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->show_event,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:pos').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[event_pos]',
            'options_values' => array(
                    'right' => elgg_echo('river_activity_3C:right'),
                    'left' => elgg_echo('river_activity_3C:left')
            ),
            'value' => $vars['entity']->event_pos,
            ));
   echo "<br />".elgg_echo('river_activity_3C:pir')." : ";
   echo elgg_view('input/text', array(
            'name' => "params[event_pir]",
            'value' => $vars['entity']->event_pir,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:number').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => "params[num_event]",
            'options_values' => array('1' =>'1','2' => '2','3' => '3','4' => '4','5' => '5'),
            'value' => $vars['entity']->num_event,
            ));
    echo "</div>";
    }  else {
    echo '<div class="admin_settings"><font color="red"><b>'.elgg_echo('river_activity_3C:event_active').'</b></font></div>';
    }
    
    
    
//Pages
    
    if (elgg_is_active_plugin('pages')){
    echo "<h3>".elgg_echo('river_activity_3C:page')."</h3>";
    echo '<div class="admin_settings">'.elgg_echo('river_activity_3C:show_page').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[show_page]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->show_page,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:pos').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[page_pos]',
            'options_values' => array(
                    'right' => elgg_echo('river_activity_3C:right'),
                    'left' => elgg_echo('river_activity_3C:left')
            ),
            'value' => $vars['entity']->page_pos,
            ));
    echo "<br />".elgg_echo('river_activity_3C:pir')." : ";
    echo elgg_view('input/text', array(
            'name' => "params[page_pir]",
            'value' => $vars['entity']->page_pir,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:number').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => "params[num_page]",
            'options_values' => array('1' =>'1','2' => '2','3' => '3','4' => '4','5' => '5'),
            'value' => $vars['entity']->num_page,
            ));
    echo "</div>";
    }  else {
    echo '<div class="admin_settings"><font color="red"><b>'.elgg_echo('river_activity_3C:page_active').'</b></font></div>';
    }

//Groups
    
    if (elgg_is_active_plugin('groups')){
    echo "<h3>".elgg_echo('river_activity_3C:featured-groups')."</h3>";
    echo '<div class="admin_settings">'.elgg_echo('river_activity_3C:show_featured_group').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[show_featured_group]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->show_featured_group,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:pos').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[featured_group_pos]',
            'options_values' => array(
                    'right' => elgg_echo('river_activity_3C:right'),
                    'left' => elgg_echo('river_activity_3C:left')
            ),
            'value' => $vars['entity']->featured_group_pos,
            ));
    echo "<br />".elgg_echo('river_activity_3C:pir')." : ";
    echo elgg_view('input/text', array(
            'name' => "params[featured_group_pir]",
            'value' => $vars['entity']->featured_group_pir,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:number').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => "params[num_featured]",
            'options_values' => array('1' =>'1','2' => '2','3' => '3','4' => '4','5' => '5'),
            'value' => $vars['entity']->num_featured,
            ));
    echo "</div>";

    echo "<h3>".elgg_echo('river_activity_3C:newgroups')."</h3>";
    echo '<div class="admin_settings">'.elgg_echo('river_activity_3C:show_latest_group').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[show_latest_group]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->show_latest_group,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:pos').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[latest_group_pos]',
            'options_values' => array(
                    'right' => elgg_echo('river_activity_3C:right'),
                    'left' => elgg_echo('river_activity_3C:left')
            ),
            'value' => $vars['entity']->latest_group_pos,
            ));
    echo "<br />".elgg_echo('river_activity_3C:pir')." : ";
    echo elgg_view('input/text', array(
            'name' => "params[latest_group_pir]",
            'value' => $vars['entity']->latest_group_pir,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:number').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => "params[num_newgroup]",
            'options_values' => array('1' =>'1','2' => '2','3' => '3','4' => '4','5' => '5'),
            'value' => $vars['entity']->num_newgroup,
            ));
    echo "</div>";

    echo "<h3>".elgg_echo('river_activity_3C:groupsmember')."</h3>";
    echo '<div class="admin_settings">'.elgg_echo('river_activity_3C:show_group_membership').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[show_group_membership]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->show_group_membership,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:pos').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[group_membership_pos]',
            'options_values' => array(
                    'right' => elgg_echo('river_activity_3C:right'),
                    'left' => elgg_echo('river_activity_3C:left')
            ),
            'value' => $vars['entity']->group_membership_pos,
            ));
    echo "<br />".elgg_echo('river_activity_3C:pir')." : ";
    echo elgg_view('input/text', array(
            'name' => "params[group_membership_pir]",
            'value' => $vars['entity']->group_membership_pir,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:number').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => "params[num_membership]",
            'options_values' => array('1' =>'1','2' => '2','3' => '3','4' => '4','5' => '5'),
            'value' => $vars['entity']->num_membership,
            ));
    echo "</div>";

    }else {
    echo '<div class="admin_settings"><font color="red"><b>'.elgg_echo('river_activity_3C:groups_active').'</b></font></div>';
    }

//Tidypics
    
    if (elgg_is_active_plugin('tidypics')){
    echo "<h3>".elgg_echo('river_activity_3C:photo')."</h3>";
    echo '<div class="admin_settings">'.elgg_echo('river_activity_3C:show_photo').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[show_photo]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->show_photo,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:pos').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[photo_pos]',
            'options_values' => array(
                    'right' => elgg_echo('river_activity_3C:right'),
                    'left' => elgg_echo('river_activity_3C:left')
            ),
            'value' => $vars['entity']->photo_pos,
            ));
    echo "<br />".elgg_echo('river_activity_3C:pir')." : ";
    echo elgg_view('input/text', array(
            'name' => "params[photo_pir]",
            'value' => $vars['entity']->photo_pir,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:number').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => "params[num_photo]",
            'options_values' => array('1' =>'1','2' => '2','3' => '3','4' => '4','5' => '5'),
            'value' => $vars['entity']->num_photo,
            ));
    echo "</div>";

    }  else {
    echo '<div class="admin_settings"><font color="red"><b>'.elgg_echo('river_activity_3C:photo_active').'</b></font></div>';
    }

//Videos
    
    if (elgg_is_active_plugin('videos')){
    echo "<h3>".elgg_echo('river_activity_3C:video')."</h3>";
    echo '<div class="admin_settings">'.elgg_echo('river_activity_3C:show_video').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[show_video]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->show_video,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:pos').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[video_pos]',
            'options_values' => array(
                    'right' => elgg_echo('river_activity_3C:right'),
                    'left' => elgg_echo('river_activity_3C:left')
            ),
            'value' => $vars['entity']->video_pos,
            ));
    echo "<br />".elgg_echo('river_activity_3C:pir')." : ";
    echo elgg_view('input/text', array(
            'name' => "params[video_pir]",
            'value' => $vars['entity']->video_pir,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:number').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => "params[num_video]",
            'options_values' => array('1' =>'1','2' => '2','3' => '3','4' => '4','5' => '5'),
            'value' => $vars['entity']->num_video,
            ));
    echo "</div>";
    }  else {
    echo '<div class="admin_settings"><font color="red"><b>'.elgg_echo('river_activity_3C:video_active').'</b></font></div>';
    }

//Recent Members
    
    if (elgg_is_active_plugin('members')){
    echo "<h3>".elgg_echo('river_activity_3C:newestmembers')."</h3>";
    echo '<div class="admin_settings">'.elgg_echo('river_activity_3C:show_recent_members').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[show_recent_members]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->show_recent_members,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:photo_recent_members').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[view_avatar]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->view_avatar,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:pos').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[recent_members_pos]',
            'options_values' => array(
                    'right' => elgg_echo('river_activity_3C:right'),
                    'left' => elgg_echo('river_activity_3C:left')
            ),
            'value' => $vars['entity']->recent_members_pos,
            ));
    echo "<br />".elgg_echo('river_activity_3C:pir')." : ";
    echo elgg_view('input/text', array(
            'name' => "params[recent_members_pir]",
            'value' => $vars['entity']->recent_members_pir,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:number').'  :  ';
    echo elgg_view('input/text', array(
            'name' => "params[num_new]",
            'value' => $vars['entity']->num_new,
            ));
    echo "</div>";
    }else{
    echo '<div class="admin_settings"><font color="red"><b>'.elgg_echo('river_activity_3C:members_active').'</b></font></div>';
    }

//Friends  
    
    echo "<h3>".elgg_echo('river_activity_3C:friends')."</h3>";
    echo '<div class="admin_settings">'.elgg_echo('river_activity_3C:show_friends').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[show_friends]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->show_friends,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:pos').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[friends_pos]',
            'options_values' => array(
                    'right' => elgg_echo('river_activity_3C:right'),
                    'left' => elgg_echo('river_activity_3C:left')
            ),
            'value' => $vars['entity']->friends_pos,
            ));
    echo "<br />".elgg_echo('river_activity_3C:pir')." : ";
    echo elgg_view('input/text', array(
            'name' => "params[friends_pir]",
            'value' => $vars['entity']->friends_pir,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:number').'  :  ';
    echo elgg_view('input/text', array(
            'name' => "params[num_friends]",
            'value' => $vars['entity']->num_friends,
            ));
    echo "</div>";

//Online Friends
    
    echo "<h3>".elgg_echo('river_activity_3C:online')."</h3>";
    echo '<div class="admin_settings">'.elgg_echo('river_activity_3C:show_online_members').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[show_online_members]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->show_online_members,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:pos').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[online_members_pos]',
            'options_values' => array(
                    'right' => elgg_echo('river_activity_3C:right'),
                    'left' => elgg_echo('river_activity_3C:left')
            ),
            'value' => $vars['entity']->online_members_pos,
            ));
    echo "<br />".elgg_echo('river_activity_3C:pir')." : ";
    echo elgg_view('input/text', array(
            'name' => "params[online_members_pir]",
            'value' => $vars['entity']->online_members_pir,
            ));
    echo "</div>";

//Friends Online
    
    echo "<h3>".elgg_echo('river_activity_3C:friendsonline')."</h3>";
    echo '<div class="admin_settings">'.elgg_echo('river_activity_3C:show_friends_online').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[show_friends_online]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->show_friends_online,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:pos').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[friends_online_pos]',
            'options_values' => array(
                    'right' => elgg_echo('river_activity_3C:right'),
                    'left' => elgg_echo('river_activity_3C:left')
            ),
            'value' => $vars['entity']->friends_online_pos,
            ));
    echo "<br />".elgg_echo('river_activity_3C:pir')." : ";
    echo elgg_view('input/text', array(
            'name' => "params[friends_online_pir]",
            'value' => $vars['entity']->friends_online_pir,
            ));
    echo "</div>";

//Birthdays

    if ((elgg_is_active_plugin('profile_manager')) && (elgg_is_active_plugin('members'))){
    echo "<h3>".elgg_echo('river_activity_3C:birthdays')."</h3>";
    echo '<div class="admin_settings">'.elgg_echo('river_activity_3C:show_birthday').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[show_birthday]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->show_birthday,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:pos').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[birthday_pos]',
            'options_values' => array(
                    'right' => elgg_echo('river_activity_3C:right'),
                    'left' => elgg_echo('river_activity_3C:left')
            ),
            'value' => $vars['entity']->birthday_pos,
            ));
    echo "<br />".elgg_echo('river_activity_3C:pir')." : ";
    echo elgg_view('input/text', array(
            'name' => "params[birthday_pir]",
            'value' => $vars['entity']->birthday_pir,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:bdaypar').' [<a href="'.elgg_get_site_url().'mod/river_activity_3C/graphics/profilemanager.jpg" class="elgg-lightbox">'.elgg_echo('river_activity_3C:help').'</a>] :  ';
    echo elgg_view('input/text', array(
            'name' => "params[birth_day]",
            'value' => $vars['entity']->birth_day,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:view_birthday').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[view_birthday]',
            'options_values' => array(
                    'icon' => elgg_echo('river_activity_3C:icon'),
                    'list' => elgg_echo('river_activity_3C:list')
            ),
            'value' => $vars['entity']->view_birthday,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:send_wishes').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[send_wishes]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->send_wishes,
            ));
    echo '<br />[<a href="'.elgg_get_site_url().'admin/users/birthday" >'.elgg_echo('river_activity_3C:convert').'</a>]';
    echo "</div>";
    }else {
    echo '<div class="admin_settings"><font color="red"><b>'.elgg_echo('river_activity_3C:profile_manager_active').'</b></font></div>';
    }

//HTML Box
    
    echo "<h3>".elgg_echo('river_activity_3C:html')."</h3>";
    echo '<div class="admin_settings">'.elgg_echo('river_activity_3C:show_html').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[show_html]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->show_html,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:show_html_popup').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[show_html_popup]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->show_html_popup,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:pos').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[html_pos]',
            'options_values' => array(
                    'right' => elgg_echo('river_activity_3C:right'),
                    'left' => elgg_echo('river_activity_3C:left')
            ),
            'value' => $vars['entity']->html_pos,
            ));
    echo "<br />".elgg_echo('river_activity_3C:pir')." : ";
    echo elgg_view('input/text', array(
            'name' => "params[html_pir]",
            'value' => $vars['entity']->html_pir,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:html_msg').'  :  <br />';
    echo elgg_view('input/longtext', array(
            'name' => "params[html_msg]",
            'value' => $vars['entity']->html_msg,
            ));
    echo "</div>";
    
//Any Entity River Box Creator

    echo "<h3>".elgg_echo('river_activity_3C:anyentity')."</h3>";
    echo '<div class="admin_settings">'.elgg_echo('river_activity_3C:show_anyentity').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[show_anyentity]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->show_anyentity,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:pos').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[anyentity_pos]',
            'options_values' => array(
                    'right' => elgg_echo('river_activity_3C:right'),
                    'left' => elgg_echo('river_activity_3C:left')
            ),
            'value' => $vars['entity']->anyentity_pos,
            ));
    echo "<br />".elgg_echo('river_activity_3C:pir')." : ";
    echo elgg_view('input/text', array(
            'name' => "params[anyentity_pir]",
            'value' => $vars['entity']->anyentity_pir,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:number').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => "params[num_anyentity]",
            'options_values' => array('1' =>'1','2' => '2','3' => '3','4' => '4','5' => '5'),
            'value' => $vars['entity']->num_anyentity,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:enteranyentity').'  :  ';
    echo elgg_view('input/text', array(
            'name' => "params[anyentity]",
            'value' => $vars['entity']->anyentity ? $vars['entity']->anyentity : "blog,album,news",

            ));
    echo '<br />'.elgg_echo('river_activity_3C:anyentitylang');
    echo "</div>";

//Wire
    
    if (elgg_is_active_plugin('thewire')){
    echo "<h3>".elgg_echo('river_activity_3C:wireform')."</h3>";
    echo '<div class="admin_settings">'.elgg_echo('river_activity_3C:show_wire').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[show_wire]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->show_wire,
            ));
    echo "<br />".elgg_echo('river_activity_3C:riverboxwire')." : ";
    echo elgg_view('input/dropdown', array(
            'name' => 'params[view_riverbox_wire]',
            'options_values' => array(
                    'featured' => elgg_echo('river_activity_3C:featured'),
                    'info' => elgg_echo('river_activity_3C:info'),
                    'popup' => elgg_echo('river_activity_3C:popup'),
                    'aside' => elgg_echo('river_activity_3C:aside'),
            ),
            'value' => $vars['entity']->view_riverbox_wire,
            ));
    echo "</div>";
    }else{
    echo '<div class="admin_settings"><font color="red"><b>'.elgg_echo('river_activity_3C:wire_active').'</b></font></div>';
    }    
    

//System Message
    
    echo "<h3>".elgg_echo('river_activity_3C:system_message')."</h3>";
    echo '<div class="admin_settings">'.elgg_echo('river_activity_3C:show_system_messages').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[show_system_messages]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->show_system_messages,
            ));
    echo "<br />".elgg_echo('river_activity_3C:riverboxsitemsg')." : ";
    echo elgg_view('input/dropdown', array(
            'name' => 'params[view_riverbox_sitemsg]',
            'options_values' => array(
                    'featured' => elgg_echo('river_activity_3C:featured'),
                    'info' => elgg_echo('river_activity_3C:info'),
                    'popup' => elgg_echo('river_activity_3C:popup'),
                    'aside' => elgg_echo('river_activity_3C:aside'),
            ),
            'value' => $vars['entity']->view_riverbox_sitemsg,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:extend_sitemsg').'  :  ';
    echo elgg_view('input/dropdown', array(
            'name' => 'params[extend_sitemsg]',
            'options_values' => array(
                    'no' => elgg_echo('river_activity_3C:no'),
                    'yes' => elgg_echo('river_activity_3C:yes')
            ),
            'value' => $vars['entity']->extend_sitemsg,
            ));
    echo '<br />'.elgg_echo('river_activity_3C:system_messages_info');
    echo '<br />'.elgg_echo('river_activity_3C:system_messages').'  :  <br />';
    echo elgg_view('input/plaintext', array(
            'name' => "params[system_messages]",
            'value' => $vars['entity']->system_messages,
            ));
    echo "</div>";

//Support
    echo "<div class='admin_settings'>".elgg_echo('river_activity_3C:3C_support')."</div>";


