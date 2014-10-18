define(['underscore', 'backbone'], function(_, Backbone) {
	var PostModel = Backbone.Model.extend({
		defaults: {
			text: null,
			created_at: Date.now()
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