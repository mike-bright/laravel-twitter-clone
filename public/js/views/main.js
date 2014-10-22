define([
	'underscore',
	'backbone',
	'views/post',
	'views/userbadge',
	'models/post',
	'models/user',
	'collections/posts',
	'text!templates/main.html'
	], function(_, Backbone, PostView, UserBadgeView, Post, User, PostsCollection, mainTemplate) {
		var MainView = Backbone.View.extend({
			el: 'div.container',
			template: _.template(mainTemplate),
			events: {
				'click #add': 'createPost',
				'click #loadMore': 'fetchPosts'
			},
			initialize: function() {
				this.$el.html(this.template());

				//get current user
				this.currentUser = new User();
				var self = this;
				this.currentUser.fetch().done(function() {
					self.renderUser(self.currentUser);
				});

				//get posts
				this.collection = new PostsCollection();
				this.listenTo(this.collection.fullCollection, 'add', this.renderPost);
				this.collection.getFirstPage().done(function() {
					self.checkNextPage();
				});
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
				userView = new UserBadgeView({
					model: user
				});
				this.$el.find('#user').append(userView.render().el);
			},
			fetchPosts: function() {
				if (this.collection.hasNextPage()) {
					var self = this;
    				this.collection.getNextPage().done(function() {
    					self.checkNextPage();
    				});
				}
			},
			createPost: function(e) {
				e.preventDefault();

				this.collection.create(new Post({
					'text': $('#text').val(),
					'userName': this.currentUser.attributes.userName,
					'currentUser': 1
				}));
				$('#text').val('');
			},
			checkNextPage: function() {
				if (this.collection.hasNextPage()) {
					$('#loadMore').removeClass('hidden');
				} else {
					$('#loadMore').addClass('hidden');
				}
			}
		});
		return MainView;
	});