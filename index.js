apiFetch({
	path: '/theme-text-domain/v2/custom_function',
	method: 'POST',  // method 
	data: {
	search: 'hello',  // search keyword
	pageNo: 1,  // current page no
	postPerPage: 5,  // no of posts per page
	search_cat_id: 3 // category id if you want to search by cat
		},
}).then((response) => {
	console.log(response);
}).catch( function() {
	errorResponseMessage( 'Request failed to fetch posts.' );
} );