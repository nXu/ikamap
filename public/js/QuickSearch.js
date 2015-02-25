$(document).ready(function() {
	// Activate typeahead
	searchSuggestion.init('#quicksearch', '/players/search', 'name', '#quicksearch-form', '/player/');
});

