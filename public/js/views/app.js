define([
	'underscore',
	'backbone',
	'views/post',
	'models/post',
	'collections/posts'
	], function(_, Backbone, PostView, Post, PostsCollection) {
		var AppView = Backbone.View.extend({
			el: 'div.container',
			events: {
				'click #add': 'createPost'
			},
			initialize: function() {
				var self = this;
				this.collection = new PostsCollection();
				this.collection.fetch().done(function() {
					self.render();
					self.listenTo(self.collection, 'add', self.renderPost);
				});

				// this.listenTo(this.collection, 'reset', this.render);	
			},
			renderPost: function(item) {
				postView = new PostView({
					model: item
				});
				this.$el.find('#posts').prepend(postView.render().el)
			},
			render: function() {
				this.collection.each(function(item){
					this.renderPost(item);
				}, this);
			},
			createPost: function(e) {
				e.preventDefault();

				this.collection.create(new Post({
					'content': $('#content').val()
				}));
				$('#content').val('');
			}
		});
		return AppView;
	});