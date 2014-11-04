define([
		'jquery',
		'underscore',
		'backbone',
		'views/container',
		'views/navbar'
		// 'views/settings'
		], function($, _, Backbone, ContainerView, NavbarView) {
	var LayoutView = Backbone.View.extend({
		el: 'body',
		initialize: function(options) {
			this.currentUser = options.currentUser;
			this.router = options.router;

			this.navbarView = new NavbarView({
				currentUser: this.currentUser
			});
			this.navbarView.render();
						
			this.containerView = new ContainerView({
				'currentUser': this.currentUser,
				'router': this.router.router
			});

			this.router.containerView = this.containerView;
			this.router.initialize();
		}
	});

	return LayoutView;
});