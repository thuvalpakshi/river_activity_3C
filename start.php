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

elgg_register_event_handler('init', 'system', 'river_activity_3C_init');

function river_activity_3C_init() {

    elgg_extend_view('css/elgg', 'river_activity_3C/css');
    elgg_extend_view('css/admin', 'river_activity_3C/admin');
    elgg_register_page_handler('river_activity_3C','river_activity_3C_page_handler');
    elgg_register_event_handler('login', 'user', 'river_activity_3C_login_check');
    elgg_register_menu_item('site', new ElggMenuItem('river_activity_3C', elgg_echo('river_activity_3C:birthdays'), 'river_activity_3C'));
    elgg_register_admin_menu_item('administer', 'birthday', 'users');
    
    //Register the lib and load it
    elgg_register_library('3C_RA_funcs', elgg_get_plugins_path() . 'river_activity_3C/lib/river_activity_3C.php');
    elgg_load_library('3C_RA_funcs');
  
//Register Plugin Hook to Send Birthday Message.
if (elgg_get_plugin_setting('send_wishes','river_activity_3C') == 'yes'){    
    elgg_register_plugin_hook_handler('cron', 'daily', 'river_activity_3C_bday_mailer');
}

//Register the java scripts for Message Rotation
    $msg_rotate = elgg_get_simplecache_url('js', 'site_messages');
    elgg_register_simplecache_view('js/site_messages');
    elgg_register_js('site_messages', $msg_rotate, 'head');
    elgg_load_js('site_messages');
    
//Register action for Ajax post of wire
    $action_path = elgg_get_plugins_path().'river_activity_3C/actions';
    elgg_register_action("river_activity_3C/add", $action_path."/add.php");
    elgg_extend_view('js/elgg', 'js/wire_add');
    
//Register Ajax view for loading forms

    elgg_register_ajax_view('thewire/add', array('name' => 'ann_wire'));
    elgg_register_ajax_view('blog/save');
    elgg_register_ajax_view('file/upload');
    elgg_register_ajax_view('photos/album/save');
    elgg_register_ajax_view('videos/save');
    elgg_register_ajax_view('bookmarks/save');
    elgg_register_ajax_view('invitefriends/invite');

//Extend the views in sidebar and sidebar_alt
if ((elgg_is_logged_in()) && (elgg_get_context() == 'activity')){
    
    $default = '700';
   
    //Showing Site Status
    if (elgg_get_plugin_setting('show_status','river_activity_3C') == 'yes'){
    if (elgg_get_plugin_setting('status_pos','river_activity_3C') == 'left'){
        elgg_extend_view('page/elements/sidebar_alt', 'page/elements/site_status',$default + (int)elgg_get_plugin_setting('status_pir','river_activity_3C'));
    }else{
        elgg_extend_view('page/elements/sidebar', 'page/elements/site_status',$default + (int)elgg_get_plugin_setting('status_pir','river_activity_3C'));
    }}

    //Showing Events
    if (elgg_get_plugin_setting('show_event','river_activity_3C') == 'yes'){
    if (elgg_get_plugin_setting('event_pos','river_activity_3C') == 'left'){
        elgg_extend_view('page/elements/sidebar_alt', 'page/elements/events', $default + (int)elgg_get_plugin_setting('events_pir','river_activity_3C'));
    }else {
        elgg_extend_view('page/elements/sidebar', 'page/elements/events', $default + (int)elgg_get_plugin_setting('events_pir','river_activity_3C'));
    }}
    
    //Showing Horoscope
    if (elgg_get_plugin_setting('show_horoscope','river_activity_3C') == 'yes'){
    if (elgg_get_plugin_setting('horoscope_pos','river_activity_3C') == 'left'){
        elgg_extend_view('page/elements/sidebar_alt', 'page/elements/horoscope',$default + (int)elgg_get_plugin_setting('horoscope_pir','river_activity_3C'));
    }else {
        elgg_extend_view('page/elements/sidebar', 'page/elements/horoscope',$default + (int)elgg_get_plugin_setting('horoscope_pir','river_activity_3C'));
    }}

    //Shows New Groups
    if (elgg_get_plugin_setting('show_latest_group','river_activity_3C') == 'yes'){
    if (elgg_get_plugin_setting('latest_group_pos','river_activity_3C') == 'left'){
        elgg_extend_view('page/elements/sidebar_alt', 'page/elements/newgroups',$default + (int)elgg_get_plugin_setting('latest_group_pir','river_activity_3C'));
    }else{
        elgg_extend_view('page/elements/sidebar', 'page/elements/newgroups',$default + (int)elgg_get_plugin_setting('latest_group_pir','river_activity_3C'));
    }}

    //Shows Featured Groups
    if (elgg_get_plugin_setting('show_featured_group','river_activity_3C') == 'yes'){
    if (elgg_get_plugin_setting('featured_group_pos','river_activity_3C') == 'left') {
        elgg_extend_view('page/elements/sidebar_alt', 'page/elements/featuredgroup',$default + (int)elgg_get_plugin_setting('featured_group_pir','river_activity_3C'));
    }else{
        elgg_extend_view('page/elements/sidebar', 'page/elements/featuredgroup',$default + (int)elgg_get_plugin_setting('featured_group_pir','river_activity_3C'));
    }}

    //Shows Group Memberships
    if (elgg_get_plugin_setting('show_group_membership','river_activity_3C') == 'yes'){
    if (elgg_get_plugin_setting('group_membership_pos','river_activity_3C') == 'left'){
        elgg_extend_view('page/elements/sidebar_alt', 'page/elements/groupmembership',$default + (int)elgg_get_plugin_setting('group_membership_pir','river_activity_3C'));
    }else{
        elgg_extend_view('page/elements/sidebar', 'page/elements/groupmembership',$default + (int)elgg_get_plugin_setting('group_membership_pir','river_activity_3C'));
    }}

    //Shows Bookmarks
    if (elgg_get_plugin_setting('show_bookmark','river_activity_3C') == 'yes'){
    if (elgg_get_plugin_setting('bookmark_pos','river_activity_3C') == 'left'){
        elgg_extend_view('page/elements/sidebar_alt', 'page/elements/bookmark',$default + (int)elgg_get_plugin_setting('bookmark_pir','river_activity_3C'));
    }else{
        elgg_extend_view('page/elements/sidebar', 'page/elements/bookmark',$default + (int)elgg_get_plugin_setting('bookmark_pir','river_activity_3C'));
    }}
    
    //Shows Blogs
    if (elgg_get_plugin_setting('show_blog','river_activity_3C') == 'yes'){
    if (elgg_get_plugin_setting('blog_pos','river_activity_3C') == 'left'){
        elgg_extend_view('page/elements/sidebar_alt', 'page/elements/blogs',$default + (int)elgg_get_plugin_setting('blog_pir','river_activity_3C'));
    }else{
        elgg_extend_view('page/elements/sidebar', 'page/elements/blogs',$default + (int)elgg_get_plugin_setting('blog_pir','river_activity_3C'));
    }}

    //Shows Files
    if (elgg_get_plugin_setting('show_file','river_activity_3C') == 'yes'){
    if (elgg_get_plugin_setting('file_pos','river_activity_3C') == 'left'){
        elgg_extend_view('page/elements/sidebar_alt', 'page/elements/files',$default + (int)elgg_get_plugin_setting('file_pir','river_activity_3C'));
    }else{
        elgg_extend_view('page/elements/sidebar', 'page/elements/files',$default + (int)elgg_get_plugin_setting('file_pir','river_activity_3C'));
    }}

    //Shows Top Pages
    if (elgg_get_plugin_setting('show_page','river_activity_3C') == 'yes'){
    if (elgg_get_plugin_setting('page_pos','river_activity_3C') == 'left'){
        elgg_extend_view('page/elements/sidebar_alt', 'page/elements/pages',$default + (int)elgg_get_plugin_setting('page_pir','river_activity_3C'));
    }else{
        elgg_extend_view('page/elements/sidebar', 'page/elements/pages',$default + (int)elgg_get_plugin_setting('page_pir','river_activity_3C'));
    }}
    
    
    //Shows photo
    if (elgg_get_plugin_setting('show_photo','river_activity_3C') == 'yes'){
    if (elgg_get_plugin_setting('photo_pos','river_activity_3C') == 'left'){
        elgg_extend_view('page/elements/sidebar_alt', 'page/elements/photo',$default + (int)elgg_get_plugin_setting('photo_pir','river_activity_3C'));
    }else{
        elgg_extend_view('page/elements/sidebar', 'page/elements/photo',$default + (int)elgg_get_plugin_setting('photo_pir','river_activity_3C'));
    }}
    
    //Shows Videos
    if (elgg_get_plugin_setting('show_video','river_activity_3C') == 'yes'){
    if (elgg_get_plugin_setting('video_pos','river_activity_3C') == 'left'){
        elgg_extend_view('page/elements/sidebar_alt', 'page/elements/video',$default + (int)elgg_get_plugin_setting('video_pir','river_activity_3C'));
    }else{
        elgg_extend_view('page/elements/sidebar', 'page/elements/video',$default + (int)elgg_get_plugin_setting('video_pir','river_activity_3C'));
    }}
    
    //Shows HTML Box
    if (elgg_get_plugin_setting('show_html','river_activity_3C') == 'yes'){
    if (elgg_get_plugin_setting('html_pos','river_activity_3C') == 'left'){
        elgg_extend_view('page/elements/sidebar_alt', 'page/elements/htmlbox',$default + (int)elgg_get_plugin_setting('html_pir','river_activity_3C'));
    }else{
        elgg_extend_view('page/elements/sidebar', 'page/elements/htmlbox',$default + (int)elgg_get_plugin_setting('html_pir','river_activity_3C'));
    }
    if (elgg_get_plugin_setting('show_html_popup','river_activity_3C') == 'yes'){
       elgg_extend_view('page/elements/footer', 'page/elements/popup');
    }
    }
    
    //Any Entitys River Box
    if (elgg_get_plugin_setting('show_anyentity','river_activity_3C') == 'yes'){
    if (elgg_get_plugin_setting('anyentity_pos','river_activity_3C') == 'left'){
        elgg_extend_view('page/elements/sidebar_alt', 'page/elements/anyentitys',$default + (int)elgg_get_plugin_setting('anyentity_pir','river_activity_3C'));
    }else{
        elgg_extend_view('page/elements/sidebar', 'page/elements/anyentitys',$default + (int)elgg_get_plugin_setting('anyentity_pir','river_activity_3C'));
    }}
    
    //Shows Avatar and Some Links
    if (elgg_get_plugin_setting('show_profile','river_activity_3C') == 'yes'){
    if (elgg_get_plugin_setting('profile_pos','river_activity_3C') == 'left'){   
        elgg_extend_view('page/elements/sidebar_alt', 'page/elements/profile',$default + (int)elgg_get_plugin_setting('profile_pir','river_activity_3C'));
    }else{
        elgg_extend_view('page/elements/sidebar', 'page/elements/profile',$default + (int)elgg_get_plugin_setting('profile_pir','river_activity_3C'));
    }}

    //Shows Online Members
    if (elgg_get_plugin_setting('show_online_members','river_activity_3C') == 'yes'){
    if (elgg_get_plugin_setting('online_members_pos','river_activity_3C') == 'left'){
        elgg_extend_view('page/elements/sidebar_alt', 'page/elements/online',$default + (int)elgg_get_plugin_setting('online_members_pir','river_activity_3C'));
    }else{
        elgg_extend_view('page/elements/sidebar', 'page/elements/online',$default + (int)elgg_get_plugin_setting('online_members_pir','river_activity_3C'));
    }}
    
    //Shows Online Friends
    if (elgg_get_plugin_setting('show_friends_online','river_activity_3C') == 'yes'){
    if (elgg_get_plugin_setting('friends_online_pos','river_activity_3C') == 'left'){
        elgg_extend_view('page/elements/sidebar_alt', 'page/elements/friends_online',$default + (int)elgg_get_plugin_setting('friends_online_pir','river_activity_3C'));
    }else{
        elgg_extend_view('page/elements/sidebar', 'page/elements/friends_online',$default + (int)elgg_get_plugin_setting('friends_online_pir','river_activity_3C'));
    }}
    
    //Shows Friends
    if (elgg_get_plugin_setting('show_friends','river_activity_3C') == 'yes'){
    if (elgg_get_plugin_setting('friends_pos','river_activity_3C') == 'left'){
        elgg_extend_view('page/elements/sidebar_alt', 'page/elements/friends',$default + (int)elgg_get_plugin_setting('friends_pir','river_activity_3C'));
    }else{
        elgg_extend_view('page/elements/sidebar', 'page/elements/friends',$default + (int)elgg_get_plugin_setting('friends_pir','river_activity_3C'));
    }}
    
    //Shows newest Members
    if (elgg_get_plugin_setting('show_recent_members','river_activity_3C') == 'yes'){
    if (elgg_get_plugin_setting('recent_members_pos','river_activity_3C') == 'left'){
        elgg_extend_view('page/elements/sidebar_alt', 'page/elements/newestmembers',$default + (int)elgg_get_plugin_setting('recent_members_pir','river_activity_3C'));
    }else{
        elgg_extend_view('page/elements/sidebar', 'page/elements/newestmembers',$default + (int)elgg_get_plugin_setting('recent_members_pir','river_activity_3C'));
    }}

    //Shows Birthdays 
    if (elgg_get_plugin_setting('show_birthday','river_activity_3C') == 'yes'){
    if (elgg_get_plugin_setting('birthday_pos','river_activity_3C') == 'left'){
        elgg_extend_view('page/elements/sidebar_alt', 'page/elements/birthdays',$default + (int)elgg_get_plugin_setting('birthday_pir','river_activity_3C'));
    }else{
        elgg_extend_view('page/elements/sidebar', 'page/elements/birthdays',$default + (int)elgg_get_plugin_setting('birthday_pir','river_activity_3C'));
    }}
           

//Middle Column
    //Shows System Messages
    if (elgg_get_plugin_setting('show_system_messages', 'river_activity_3C') == 'yes'){
    elgg_extend_view('page/layouts/content/header', 'page/elements/site_message','100');
    }
    
    //Shows Wire
    if (elgg_get_plugin_setting('show_wire', 'river_activity_3C') == 'yes'){
    elgg_extend_view('page/layouts/content/header', 'page/elements/wire','110');
    }
    
    }

//Other settings if site layout is set to 3-Column
else if (elgg_is_logged_in() && (elgg_get_plugin_setting('view_site', 'river_activity_3C') == "3C")){
    if (elgg_get_plugin_setting('extend_sitemsg','river_activity_3C') == 'yes'){
    elgg_extend_view('page/elements/sidebar_alt', 'page/elements/site_message','700');
    }
    elgg_extend_view('page/elements/sidebar_alt', 'page/elements/online',$default + (int)elgg_get_plugin_setting('online_members_pir','river_activity_3C'));
    elgg_extend_view('page/elements/sidebar_alt', 'page/elements/friends_online',$default + (int)elgg_get_plugin_setting('friends_online_pir','river_activity_3C'));
}

//Extending site messages to right sidebar if site layout is set to 2-Column
else if (elgg_is_logged_in() && (elgg_get_plugin_setting('view_site', 'river_activity_3C') == "2C")){
    if (elgg_get_plugin_setting('extend_sitemsg','river_activity_3C') == 'yes'){
    elgg_extend_view('page/elements/sidebar', 'page/elements/site_message','700');
    }
}

}




