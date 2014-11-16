define(['underscore',
		'jquery',
		'backbone',
		'models/settings',
		'models/currentUser',
		'text!templates/settingsBasic.html'
], function(_, $, Backbone, settingsModel, CurrentUser, basicSettingsTemplate) {
	var SettingsBasicView = Backbone.View.extend({
		id: 'settings-basic-view',
		template: _.template(basicSettingsTemplate),
		model: settingsModel,
		events: {
			'click .save': 'saveClicked'
		},
		initialize: function() {
			this.dfd = this.model.fetch();
		},
		render: function() {
			var self = this;
			this.dfd.done(function() {
				self.$el.html(self.template(self.model.attributes));
				var input = self.$('#location')[0];
				self.autocomplete = new google.maps.places.Autocomplete(input);
			});
			return this;
		},
		saveClicked: function(e) {
			self = this;
			e.preventDefault();
			this.model.save({
				location: this.$('#location').val(),
				url: this.$('#url').val(),
				color: this.$('#color').val(),
				bio: this.$('#bio').val()
			}, {
				wait: true,
				success: function(model, response) {
					self.$('.save').html('Saved!')
								.addClass('btn-success');
					setTimeout(function() {
						self.$('.save').removeClass('btn-success')
									.html('Save');
					}, 3000);
					CurrentUser.fetch();
				},
				error: function(model, response) {
					console.error(response);
					self.$('.save').html('Save Failed!')
								.addClass('btn-danger');
					setTimeout(function() {
						self.$('.save').removeClass('btn-danger')
									.html('Save');
					}, 3000);
				}
			});
		}
	});

	return SettingsBasicView;
});