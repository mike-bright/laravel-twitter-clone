define([
	'underscore',
	'backbone',
	'views/post',
	'views/userbadge',
	'models/post',
	'models/user',
	'collections/posts',
	'text!templates/user.html'
	], function(_, Backbone, PostView, UserBadgeView, Post, User, PostsCollection, userTemplate){
		var UserView = Backbone.View.extend({
			el: 'div.container',
			template: _.template(userTemplate),
			events: {
				'click #loadMore': 'fetchPosts'
			},
			initialize: function(options) {
				this.$el.html(this.template());
				this.userName = options.userName || '';
				this.model = new User({
					'view': this
				});

				this.collection = new PostsCollection();
				this.collection.queryParams.userName = this.model.get('userName');

				var self = this;
				this.model.getUser(this.userName).done(function() {
					self.render();
				});
			},
			render: function() {
				this.renderUser();
				this.renderPosts();
			},
			renderUser: function() {
				badgeView = new UserBadgeView({
					model: this.model
				});
				this.$el.find('#user').append(badgeView.render().el);
			},
			renderPosts: function() {
				this.listenTo(this.collection.fullCollection, 'add', this.renderPost);
				var self = this;
				this.collection.getFirstPage().done(function() {
					self.checkNextPage();
				});;
			},
			renderPost: function(item) {
				item.attributes.userName = this.model.get('userName');
				postView = new PostView({
					model: item
				});
				if (item.isNew())
					this.$el.find('#posts').prepend(postView.render().el);
				else
					this.$el.find('#posts').append(postView.render().el);
			},
			fetchPosts: function() {
				if (this.collection.hasNextPage()) {
					var self = this;
    				this.collection.getNextPage().done(function() {
    					self.checkNextPage();
    				});
				}
			},
			checkNextPage: function() {
				if (this.collection.hasNextPage()) {
					$('#loadMore').removeClass('hidden');
				} else {
					$('#loadMore').addClass('hidden');
				}
			}
		});
		return UserView;
	});