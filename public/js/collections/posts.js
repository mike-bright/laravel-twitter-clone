define([
	'underscore',
	'backbone', 
	'models/post'
	], function(_, Backbone, Post) {
		var PostsCollection = Backbone.Collection.extend({
			model: Post,
			url: 'api/post'
		});
		return PostsCollection;
});