define(['underscore', 'backbone'], function(_, Backbone) {
	var UserModel = Backbone.Model.extend({
		url: '/api/user',
		getUser: function(username) {
			this.url = this.url + '/' + username;
			return this.fetch();
		}
	});

	return UserModel;
});