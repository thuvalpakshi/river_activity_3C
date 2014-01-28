<?php
/*
    Satheesh PM, BARC Mumbai
    www.satheesh.anushaktinagar.net
*/

/*

Title:		jShowOff: a jQuery Content Rotator Plugin
Author:		Erik Kallevig
Version:	0.1.2
License: 	Dual licensed under the MIT and GPL licenses.

*/


/* ============================================ */
/* Controlling the Animation of Rotated Content */
/* ============================================ */


/*


changeSpeed:800,      //Speed of transition in milliseconds.
speed:5000,           //Time each slide is shown in milliseconds.
animatePause:true,    //Whether to use 'Pause' animation text when pausing.
autoPlay:true,        //Whether to start playing immediately.
controls:false,       //Whether to create & display controls (Play/Pause, Previous, Next).
links:false,          //Whether to create & display numeric links to each slide.
hoverPause:true,      //Whether to pause on hover.
effect:'fade',        //Type of transition effect: 'fade', 'slideLeft' or 'none'.
controlText:{ play:'Play', pause:'Pause', previous:'Previous', next:'Next' } 	//Text to use for controls (Play/Pause, Previous, Next).


*/


echo elgg_view('js/jquery.jshowoff');

?>

elgg.provide('elgg.message_rotation');
elgg.message_rotation.init = function(){$(document).ready(function(){

    	$('#site_messages_activity').jshowoff({

        changeSpeed:800,        //Speed of transition in milliseconds.
        speed:5000,             //Time each slide is shown in milliseconds.
        //animatePause:true,    //Whether to use 'Pause' animation text when pausing.
        //autoPlay:true,        //Whether to start playing immediately.
        controls:false,         //Whether to create & display controls (Play/Pause, Previous, Next).
        links:false,            //Whether to create & display numeric links to each slide.
        //hoverPause:true,      //Whether to pause on hover.
        //effect:'fade',        //Type of transition effect: 'fade', 'slideLeft' or 'none'.
        //controlText:{ play:'Play', pause:'Pause', previous:'Previous', next:'Next' } 	//Text to use for controls (Play/Pause, Previous, Next).

        });
        
        $('#site_messages').jshowoff({

        changeSpeed:800,        //Speed of transition in milliseconds.
        speed:5000,             //Time each slide is shown in milliseconds.
        //animatePause:true,    //Whether to use 'Pause' animation text when pausing.
        //autoPlay:true,        //Whether to start playing immediately.
        controls:false,         //Whether to create & display controls (Play/Pause, Previous, Next).
        links:false,            //Whether to create & display numeric links to each slide.
        //hoverPause:true,      //Whether to pause on hover.
        //effect:'fade',        //Type of transition effect: 'fade', 'slideLeft' or 'none'.
        //controlText:{ play:'Play', pause:'Pause', previous:'Previous', next:'Next' } 	//Text to use for controls (Play/Pause, Previous, Next).

        });
        
        $('#horoscope').jshowoff({

        changeSpeed:1200,       //Speed of transition in milliseconds.
        speed:3000,             //Time each slide is shown in milliseconds.
        //animatePause:true,    //Whether to use 'Pause' animation text when pausing.
        //autoPlay:true,        //Whether to start playing immediately.
        controls:false,         //Whether to create & display controls (Play/Pause, Previous, Next).
        links:false,             //Whether to create & display numeric links to each slide.
        //hoverPause:true,      //Whether to pause on hover.
        effect:'slideLeft',     //Type of transition effect: 'fade', 'slideLeft' or 'none'.
        //controlText:{ play:'Play', pause:'Pause', previous:'Previous', next:'Next' } 	//Text to use for controls (Play/Pause, Previous, Next).
        
        });
        
        $('#popup').trigger("click");

});
}

elgg.register_hook_handler('init', 'system', elgg.message_rotation.init);

/* Rotation and Contents */

elgg.provide('elgg.tabs_river_activity_3C');
elgg.tabs_river_activity_3C.init = function() {$(document).ready(function() {

$(".tab_content").hide();
	$(".tab_content:first").show(); 

	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active");
		$(this).addClass("active");
		$(".tab_content").hide();
		var activeTab = $(this).attr("rel"); 
		$("#"+activeTab).fadeIn(); 
	});

});
}
elgg.register_hook_handler('init', 'system', elgg.tabs_river_activity_3C.init);
