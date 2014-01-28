<?php
/*
 * Satheesh PM, BARC Mumbai
 * www.satheesh.anushaktinagar.net
*/
?>

elgg.provide('elgg.river_activity_3C');

elgg.river_activity_3C.init = function() {
	var form = $('form[name=river_activity_3C_wire]');
	form.find('input[type=submit]').live('click', elgg.river_activity_3C.submit);
};

elgg.river_activity_3C.submit = function(e) {
	var form = $(this).parents('form');
	var data = form.serialize();

	elgg.action('river_activity_3C/add', {
		data: data,
		success: function(json) {

			var river = $('.elgg-list-river');
						
			if (river.length < 1) {
				river.append(json.output);
			} else {				
				$(json.output).find('li:first').hide().prependTo(river).slideDown(500);
			};
			
			form.find('textarea').val('');
			$("#thewire-characters-remaining span").html("140");
		}
	});
	e.preventDefault();
};
elgg.register_hook_handler('init', 'system', elgg.river_activity_3C.init);
