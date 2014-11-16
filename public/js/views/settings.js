define(['underscore',
		'jquery',
		'backbone',
		'views/settingsUser',
		'views/settingsBasic',
		'text!templates/settings.html'
], function(_, $, Backbone, settingsUser, settingsBasic, settingsTemplate) {
	var SettingsView = Backbone.View.extend({
		el: '#settings-view',
		template: _.template(settingsTemplate),
		events: {
		},
		initialize: function(options) {
			this._views = [];
			this._views['basic'] = new settingsBasic();
			this._views['user'] = new settingsUser();
		},
		render: function() {
			this.$el.html(this.template());
			this.$('.settings-basic-container').html(this._views['basic'].render().el);
			this.$('.settings-user-container').html(this._views['user'].render().el);
			return this;
		}
	});

	return SettingsView;
});