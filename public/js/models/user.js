define(['underscore', 'backbone'], function(_, Backbone) {
	var UserModel = Backbone.Model.extend({
		url: '/api/user'
	});

	return UserModel;
});