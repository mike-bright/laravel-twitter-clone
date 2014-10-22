define([
	'underscore',
	'backbone', 
	'paginator',
	'models/post'
	], function(_, Backbone, Paginator, Post) {
		var PostsCollection = Backbone.PageableCollection.extend({
			model: Post,
			url: 'api/post',
        	mode: "infinite",
			state: {
				pageSize: 5,
				currentPage: 0,
				firstPage: 0,
				done: false
			},
			queryParams: {
			    pageSize: "limit",
			    // Setting a parameter mapping value to null removes it from the query string
			    currentPage: null,
			    userName: null,
			    userId: null,
			    offset: function () {
			    	return this.state.currentPage * this.state.pageSize; 
			    }
			  },
			parseState: function (resp, queryParams, state, options) {
				return {
					totalRecords: resp.count
				};
			},
			parseRecords: function (resp, options) {
				if (!resp.posts.length)
					this.state.done = true;
				return resp.posts;
			},
			parseLinks: function(resp, options) {
				return {
					next: this.url + '?limit=' + this.state.pageSize + '&offset=' 
						  + this.state.currentPage*this.state.pageSize
				};
			},
			hasNextPage: function() {
				return !this.state.done;
			}
		});
		return PostsCollection;
});