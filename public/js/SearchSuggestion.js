/**
 * The 'object' for creating search suggestions.
 * @type {Object}
 */
var searchSuggestion = {
	/**
	 * Initializes a search suggestion.
	 * @param  {string}   selector     A selector specifying object(s) to initialize the search suggestion on.
	 * @param  {string}   url          The search URI. ?query=text will be added to it.
	 * @param  {string}   field        The name of the property of the returned objects to display.
	 * @param  {string}   formSelector The selector of the whole search form.
	 * @param  {string}   detailsUri   The function to be called when a suggested element is selected.
	 * @return {void}
	 */
	init: 			function(selector, url, field, formSelector, detailsUri) {
						// Save details uri
						this.detailsUri = detailsUri;

						// Initialize Bootstrap Ajax Typeahead
						$(selector).typeahead({
							ajax 			: {
								url				: uri,
								triggerLength	: 3,
								method			: 'get',
								displayField	: field,
								valueField		: field
							},
							onSelect		: handleSelect
						});
					}, 

	/**
	 * Handles the onSelect event of the suggested search items.
	 * @param  {object} item The clicked object.
	 * @return {void}
	 */
	handleSelect: 	function(item) {
		this.showItem(item.value);
	},

	showItem: 		function(item) {
		window.location.href = detailsUri + item;
	}
};

