require.config({
	paths: {
		'jquery': 'lib/jquery/dist/jquery',
		'underscore': 'lib/underscore/underscore',
		'backbone': 'lib/backbone/backbone',
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
var app_view;
require(['views/main', 'collections/posts'], function(MainView, PostCollection) {
	app_view = new MainView({
		collection: PostCollection
	});
});