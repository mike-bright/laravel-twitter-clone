define([
	'jquery',
	'underscore',
	'backbone',
	'text!templates/post.html'
	], function($, _, Backbone, postTemplate){
		var PostView = Backbone.View.extend({
			tagName: 'div',
			className: 'postContainer',
			template: _.template(postTemplate),
			events: {
				'click .repost': 'repost',
				'click .star': 'star',
				'click .delete': 'delete',
				'keypress .todo-input': 'updateOnEnter'
			},
			initialize: function() {
				this.model.view = this;
			},
			render: function() {
				this.$el.html(this.template(this.model.attributes));
				return this;
			},
			delete: function() {
				this.model.destroy();
				this.remove();
			}
		});
		return PostView;
	});