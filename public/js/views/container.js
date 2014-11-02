define([
	'underscore',
	'jquery',
	'backbone',
	'views/main',
	'views/user'
	], function(_, $, Backbone, MainView, UserView) {
		var ContainerView = Backbone.View.extend({
			el: 'div.container-view',
			initialize: function(options) {
				this.router = options.router;
				this.currentUser = options.currentUser;
				this.views = [];
			},
			cleanupViews: function(current) {
				_.each(this.views, function(view, name) {
					if (name !== current) {
						view.remove();
						delete this.views[name];
					}
				}, this);
			},
			showMain: function() {
				this.cleanupViews();
				this.views['main'] = new MainView({
					'user': this.currentUser
					});
				this.views['main'].render();
			},
			showUser: function(userName) {
				this.cleanupViews();
				this.views['user'] = new UserView({
					'currentUser': this.currentUser,
					'userName': userName
				});
			}
		});

		return ContainerView;
	});