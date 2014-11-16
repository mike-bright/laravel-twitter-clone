define(['underscore', 'backbone'], function(_, Backbone) {
	var SettingsModel = Backbone.Model.extend({
		url: '/api/settings'
	});

	return new SettingsModel();
});