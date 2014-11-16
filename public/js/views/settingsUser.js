define(['underscore',
		'jquery',
		'backbone',
		'models/currentUser',
		'text!templates/settingsUser.html'
], function(_, $, Backbone, currentUserModel, userSettingsTemplate) {
	var SettingsUserView = Backbone.View.extend({
		id: 'settings-user-view',
		model: currentUserModel,
		template: _.template(userSettingsTemplate),
		events: {
		},
		initialize: function() {
		},
		render: function() {
			var self = this;
			this.model.dfd.done(function() {
				self.$el.html(self.template(self.model.attributes));
			});
			return this;
		}
	});

	return SettingsUserView;
});