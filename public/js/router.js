define([
	'jquery',
	'underscore',
	'backbone',
	], function($, _, Backbone) {
		var AppRouter = Backbone.Router.extend({
		    routes: {
		      '': 'showMain',
		      'user/:userName': 'showUser',
		      '*actions': 'defaultAction'
		    }
	  	});

	    var app_router = new AppRouter;

		var initialize = function(){
			var self = this;

			if (!this.containerView)
				console.error('Missing containerView.');

		    app_router.on('route:showMain', function(){
		    	self.containerView.showMain();
		    });

		    app_router.on('route:showUser', function(userName){
		    	self.containerView.showUser(userName);
		    });

		    app_router.on('route:defaultAction', function(actions){
		      console.log('No route:', actions);
		    });

		    Backbone.history.start();
	  	};

		return {
			initialize: initialize,
			router: app_router
		};
});