require.config({
	paths: {
		'jquery': 'lib/jquery/dist/jquery',
		'underscore': 'lib/underscore/underscore',
		'backbone': 'lib/backbone/backbone',
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

require(['views/app', 'collections/posts'], function(AppView, AppCollection) {
	var app_view = new AppView({
		collection: AppCollection
	});
});