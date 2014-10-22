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
			},
			initialize: function() {
				this.$el.html(this.template());
				this.model.view = this;
				this.render();
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
				this.collection = new PostsCollection(this.model.attributes.posts);
				this.collection.each(function(item){
					item.attributes.currentUser = this.model.attributes.isCurrent;
					item.attributes.userName = this.model.attributes.userName;
					this.renderPost(item);
				}, this);
				// this.collection.getFirstPage();
				console.log(this.collection);
			},
			renderPost: function(item) {
				postView = new PostView({
					model: item
				});
				if (item.isNew())
					this.$el.find('#posts').prepend(postView.render().el);
				else
					this.$el.find('#posts').append(postView.render().el);
			}
		});
		return UserView;
	});