
elgg.provide('elgg.auto_river_activity');

elgg.auto_river_activity.init = function() {

	var riverList = $('.elgg-sync.elgg-list-river');
	var time = 10000;
	if (!window.rivertimer) {
		window.rivertimer = true;
		var refresh_river = window.setTimeout(function(){
			elgg.auto_river_activity.timedRefresh(riverList);
		}, time);
	}
};

elgg.auto_river_activity.timedRefresh = function(object) {
	var first = $('li.elgg-item:first', object);
	if (!first.length) {
		first = object;
	}
	var time = first.data('timestamp');

	elgg.getJSON('activity', {
		data : {
			sync : 'new',
			time : time,
			options : object.data('options')
		},
		success : function(output) {
			if (output) {
				$.each(output, function(key, val) {
					var new_item = $(val).hide();
					object.prepend(new_item.fadeIn(1000));
				});
			}
			window.rivertimer = false;
			elgg.trigger_hook('success', 'elgg:river:ajax');
		}
	});
}
elgg.register_hook_handler('init', 'system', elgg.auto_river_activity.init);
elgg.register_hook_handler('success', 'elgg:river:ajax', elgg.auto_river_activity.init, 500);
