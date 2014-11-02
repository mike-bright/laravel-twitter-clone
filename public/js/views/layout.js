define([
		'jquery',
		'underscore',
		'backbone',
		'views/container'
		// 'views/nav',
		// 'views/settings'
		], function($, _, Backbone, ContainerView) {
	var LayoutView = Backbone.View.extend({
		el: 'body',
		initialize: function(options) {
			this.currentUser = options.currentUser;
			this.router = options.router;

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