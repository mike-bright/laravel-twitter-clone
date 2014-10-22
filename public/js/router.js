define([
	'underscore',
	'backbone',
	'views/main',
	'collections/posts',
	], function(_, Backbone, MainView, PostCollection) {
		var AppRouter = Backbone.Router.extend({
		    routes: {
		      '': 'showMain',
		      'user/:username'
		      '*actions': 'defaultAction'
		    }
	  	});

		var initialize = function(){
		    var app_router = new AppRouter;

		    app_router.on('route:showMain', function(){
				app_view = new MainView({
					collection: PostCollection
				});
		    });

		    app_router.on('route:defaultAction', function(actions){
		      console.log('No route:', actions);
		    });

		    Backbone.history.start();
	  	};

		return {
			initialize: initialize
		};
});