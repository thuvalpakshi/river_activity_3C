<?php

$siteurl = elgg_get_site_url(); 
$box_view = elgg_get_plugin_setting('view_riverbox_wire', 'river_activity_3C');

?>
<ul class="tabs"> 
    <li rel="tab1" class="active"><img src="<?php echo $siteurl; ?>mod/river_activity_3C/graphics/icons/wire.png" alt="Wire" title = "Wire" />Status</li>
    <li rel="tab2"><img src="<?php echo $siteurl; ?>mod/river_activity_3C/graphics/icons/blogs.png" alt="Blogs" title = "Blogs" />Blog</li>
        <li rel="tab3"><img src="<?php echo $siteurl; ?>mod/river_activity_3C/graphics/icons/files.png" alt="Files" title = "Files" />File</li>
        <li rel="tab4"><img src="<?php echo $siteurl; ?>mod/river_activity_3C/graphics/icons/photos.png" alt="Photos" title = "Photos" />Photo</li>
        <li rel="tab5"><img src="<?php echo $siteurl; ?>mod/river_activity_3C/graphics/icons/videos.png" alt="Videos" title = "Videos" />Video</li>
        <li rel="tab6"><img src="<?php echo $siteurl; ?>mod/river_activity_3C/graphics/icons/favorites.png" alt="Bookmark" title = "Bookmark" />Bookmark</li>
        <li rel="tab7"><img src="<?php echo $siteurl; ?>mod/river_activity_3C/graphics/icons/mail.png" alt="Invite" title = "Invite" />Invite</li>
</ul>

<div class="tab_container">
    <div id="tab1" class="tab_content">
<?php
if (elgg_is_active_plugin('thewire')){
echo elgg_view_form('thewire/add', array('name' => 'river_activity_3C_wire'));
}else{
    echo elgg_echo('Not Active');
}
?>
    </div>
    
    <div id="tab2" class="tab_content"> 
<?php
if (elgg_is_active_plugin('blog')){
echo elgg_view_form('blog/save');
}else{
    echo elgg_echo('Not Active');
}
?>
    </div>
    
    <div id="tab3" class="tab_content">
<?php
if (elgg_is_active_plugin('file')){
echo elgg_view_form('file/upload');
}else{
    echo elgg_echo('Not Active');
}
?>
    </div>
    
    <div id="tab4" class="tab_content">
<?php
if (elgg_is_active_plugin('tidypics')){
echo elgg_view_form('photos/album/save');
}else{
    echo elgg_echo('Not Active');
}
?>
    </div>
    
    <div id="tab5" class="tab_content"> 
<?php
if (elgg_is_active_plugin('videos')){
echo elgg_view_form('videos/save');
}else{
    echo elgg_echo('Not Active');
}
?>
    </div>

    <div id="tab6" class="tab_content"> 
<?php
if (elgg_is_active_plugin('bookmarks')){
echo elgg_view_form('bookmarks/save');
}else{
    echo elgg_echo('Not Active');
}
?>
    </div>
    
    <div id="tab7" class="tab_content"> 
<?php
if (elgg_is_active_plugin('invitefriends')){
echo elgg_view_form('invitefriends/invite');
}else{
    echo elgg_echo('Not Active');
}
?>
    </div>

 </div>
