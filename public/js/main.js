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

require(['router'], function(Router) {
	Router.initialize();
});