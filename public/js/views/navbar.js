define([
	'underscore',
	'jquery',
	'backbone',
	'views/settings',
	'text!templates/navbar.html'
	], function(_, $, Backbone, SettingsView, navbarTemplate) {
		var NavbarView = Backbone.View.extend({
			el: 'nav.navbar-view',
			template: _.template(navbarTemplate),
			events: {
				'click .settings': 'settingsClicked',
				'click .settings-close': 'settingsCloseClicked'
			},
			initialize: function(options) {
				this.$el.html(this.template());
				this.settingsButton = this.$el.find('.settings');
				this.settingsCloseButton = this.$el.find('.settings-close');
				this.settingsView = new SettingsView();
				this.settingsView.render();
			},
			settingsClicked: function() {
				this.settingsView.$el.slideDown();
				this.settingsButton.hide();
				this.settingsCloseButton.show();
				$('#backdrop').show();
				//http://stackoverflow.com/questions/9280258/prevent-body-scrolling-but-allow-overlay-scrolling
				$('body').css('overflow', 'hidden');
			},
			settingsCloseClicked: function() {
				var self = this;
				this.settingsView.$el.slideUp(function() {
					self.settingsCloseButton.hide();
					self.settingsButton.show();
					$('#backdrop').hide();
					$('body').css('overflow', '');
				});	
			}
		});
		return NavbarView;
	});