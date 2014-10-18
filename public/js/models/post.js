define(['underscore', 'backbone'], function(_, Backbone) {
	var PostModel = Backbone.Model.extend({
		defaults: {
			text: null,
			created_at: Date.now()
		},
		parse: function(response) {
			response.id = response._id;
			return response;
		},
		initialize: function() {

		},
		delete: function() {
			this.destroy();
			this.view.remove();
		}
	});
	return PostModel;
});