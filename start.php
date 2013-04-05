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

//Register Plugin Hook to Send Birthday Message.
if (elgg_get_plugin_setting('send_wishes','river_activity_3C') == 'yes'){    
    elgg_register_plugin_hook_handler('cron', 'daily', 'river_activity_3C_bday_mailer');
}

//Register the java scripts for Message Rotation

    $msg_rotate = elgg_get_simplecache_url('js', 'site_messages');
    elgg_register_simplecache_view('js/site_messages');
    elgg_register_js('elgg.message_rotation', $msg_rotate);
    elgg_load_js('elgg.message_rotation');


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
    if(!isset(elgg_get_logged_in_user_entity()->show_popup)){
    	elgg_get_logged_in_user_entity()->show_popup = 'yes';
    }else{
        elgg_get_logged_in_user_entity()->show_popup = 'yes';
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
    
        $options = array(
                'metadata_names' => $bday,
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
            $message = sprintf(elgg_echo('river_activity_3C:bday_message'), $bd_name, $bd_day, $sitename, $siteaddress);
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


