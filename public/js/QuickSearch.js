$(document).ready(function() {
	// Activate typeahead
	searchSuggestion.init('#quicksearch', '/player/search', 'name', handleSelectedItem);

	// Set the submit event of the quicksearch form
	$('#quicksearch-form').submit(function(e) {
		// Disable default behavior
		e.preventDefault();

		// Show the player
		var player = $('#quicksearch').val();

		if (player.length > 0) {
			showPlayerDetails(player);
		};
	})
});


/**
 * Handles the selected player item.
 * Displays the details of the player.
 * @param  {object} item The clicked item.
 * @return {void}
 */
function handleSelectedItem(item) {
	showPlayerDetails(item.value);
}

/**
 * Shows the player details by navigating to the proper URL.
 * @param  {string} player Name of the player.
 * @return {void}
 */
function showPlayerDetails(player) {
	window.location.href = '/player/' + player;
}

