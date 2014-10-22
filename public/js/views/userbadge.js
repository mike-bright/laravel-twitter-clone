define([
	'jquery',
	'underscore',
	'backbone',
	'text!templates/userBadge.html'
	], function($, _, Backbone, userBadgeTemplate){
		var UserBadgeView = Backbone.View.extend({
			tagName: 'div',
			className: 'userBadgeContainer',
			template: _.template(userBadgeTemplate),
			events: {
			},
			initialize: function() {
			},
			render: function() {
				this.$el.html(this.template(this.model.attributes));
				return this;
			}
		});
		return UserBadgeView;
	});