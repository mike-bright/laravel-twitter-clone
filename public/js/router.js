define([
	'jquery',
	'underscore',
	'backbone',
	'views/main',
	'collections/posts',
	'models/user',
	'views/user'
	], function($, _, Backbone, MainView, PostCollection, User, UserView) {
		var AppRouter = Backbone.Router.extend({
		    routes: {
		      '': 'showMain',
		      'user/:username': 'showUser',
		      '*actions': 'defaultAction'
		    }
	  	});

	  	var checkContainer = function(){
	    	if(!$('div.container').length)
	    		$('body').append("<div class='container'></div>");
	  	}

		var initialize = function(){
		    var app_router = new AppRouter,
		    	main_view,
		    	app_view;

		    app_router.on('route:showMain', function(){
		    	checkContainer();
				main_view = new MainView({
					collection: PostCollection
				});
		    });

		    app_router.on('route:showUser', function(username){
		    	if (typeof main_view !== "undefined")
		    	checkContainer();
		    	var user = new User;
		    	user.getUser(username).done(function() {
			    	user_view = new UserView({
			    		model: user
			    	});
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