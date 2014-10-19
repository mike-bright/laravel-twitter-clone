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
		var AppView = Backbone.View.extend({
			el: 'div.container',
			paginator: _.template(paginatorTemplate),
			events: {
				'click #add': 'createPost'
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
				self.listenTo(self.collection.fullCollection, 'add', self.renderPost);
				this.collection.getFirstPage();

			    _.bindAll(this, 'fetchPosts');
			    // bind to window
			    // TO DO: add a more link at the bottom or detect scrolling to the bottom
			    $(window).scroll(this.fetchPosts);
			},
			renderPost: function(item) {
				postView = new PostView({
					model: item
				});
				this.$el.find('#posts').prepend(postView.render().el);
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
    				$(window).unbind('scroll');
			},
			createPost: function(e) {
				e.preventDefault();

				this.collection.create(new Post({
					'text': $('#text').val()
				}));
				$('#text').val('');
			}
		});
		return AppView;
	});