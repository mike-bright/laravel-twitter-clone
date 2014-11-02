require.config({
	paths: {
		'jquery': 'lib/jquery/dist/jquery',
		'underscore': 'lib/underscore/underscore',
		'backbone': 'lib/backbone/backbone',
		'marionette': 'lib/marionette/lib/backbone.marionette',
		'paginator': 'lib/backbone.paginator/lib/backbone.paginator',
		'text': 'lib/text'
	},
	shim: {
		underscore: {
			exports: '_'
		},
		backbone: {
			deps: ['underscore', 'jquery'],
			exports: 'Backbone'
		}
	}
});

require(['router', 'views/layout', 'models/user'], function(Router, LayoutView, UserModel) {
	var user = new UserModel();
	user.fetch();

	var app = new LayoutView({
		'router': Router,
		'currentUser': user
	});
});