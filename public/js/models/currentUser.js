define(['underscore', 'backbone', 'models/user'], function(_, Backbone, UserModel) {
	var CurrentUser = new UserModel();
	CurrentUser.dfd = CurrentUser.fetch();
	return CurrentUser;
});