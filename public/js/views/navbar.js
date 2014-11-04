define([
	'underscore',
	'jquery',
	'backbone',
	'views/user',
	'text!templates/navbar.html'
	], function(_, $, Backbone, UserView, navbarTemplate) {
		var NavbarView = Backbone.View.extend({
			el: 'nav.navbar-view',
			template: _.template(navbarTemplate),
			initialize: function(options) {
				this.$el.html(this.template());
			}
		});
		return NavbarView;
	});