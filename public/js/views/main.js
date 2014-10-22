define([
	'underscore',
	'backbone',
	'views/post',
	'views/user',
	'models/post',
	'models/user',
	'collections/posts',
	'text!templates/paginator.html'
	], function(_, Backbone, PostView, UserView, Post, User, PostsCollection, paginatorTemplate) {
		var MainView = Backbone.View.extend({
			el: 'div.container',
			paginator: _.template(paginatorTemplate),
			events: {
				'click #add': 'createPost',
				'click #loadMore': 'fetchPosts'
			},
			initialize: function() {
				//get current user
				this.currentUser = new User();
				var self = this;
				this.currentUser.fetch().done(function() {
					self.renderUser(self.currentUser);
				});

				//get posts
				this.collection = new PostsCollection();
				this.listenTo(this.collection.fullCollection, 'add', this.renderPost);
				this.collection.getFirstPage();
			},
			renderPost: function(item) {
				postView = new PostView({
					model: item
				});
				if (item.isNew())
					this.$el.find('#posts').prepend(postView.render().el);
				else
					this.$el.find('#posts').append(postView.render().el);
			},
			renderUser: function(user) {
				userView = new UserView({
					model: user
				});
				this.$el.find('#user').append(userView.render().el);
			},
			fetchPosts: function() {
				if (this.collection.hasNextPage())
    				this.collection.getNextPage();
    			else
    				$('#loadMore').remove();
			},
			createPost: function(e) {
				e.preventDefault();

				this.collection.create(new Post({
					'text': $('#text').val(),
					'currentUser': 1
				}));
				$('#text').val('');
			}
		});
		return MainView;
	});