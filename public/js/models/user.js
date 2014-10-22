define(['underscore', 'backbone'], function(_, Backbone) {
	var UserModel = Backbone.Model.extend({
		url: '/api/user',
		load: function(id) {
			this.url = this.url + '?id=' + id;
			this.fetch();
		}
	});

	return UserModel;
});