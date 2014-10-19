define([
	'jquery',
	'underscore',
	'backbone',
	'text!templates/userBadge.html'
	], function($, _, Backbone, postTemplate){
		var PostView = Backbone.View.extend({
			tagName: 'div',
			className: 'userBadgeContainer',
			template: _.template(postTemplate),
			events: {
			},
			initialize: function() {
				this.model.view = this;
			},
			render: function() {
				this.$el.html(this.template(this.model.attributes));
				return this;
			}
		});
		return PostView;
	});