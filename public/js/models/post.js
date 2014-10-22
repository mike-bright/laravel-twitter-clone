define(['underscore', 'backbone'], function(_, Backbone) {
	var PostModel = Backbone.Model.extend({
		defaults: {
			text: null,
			created_at: Date.now()
		},
		url: 'api/post',
		initialize: function() {

		},
		delete: function() {
			this.url = 'api/post/' + this.id;
			this.destroy();
			this.view.remove();
		}
	});
	return PostModel;
});