<?php namespace App\Http\Controllers;

use DB, Response;
use App\Player;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlayerController extends Controller {

	/**
	 * Displays the form for searching players.
	 * @return Response The response view.
	 */
	public function getIndex() {
		return Response::view('general.search', ['singular' => 'player', 'plural' => 'players']);
	}

	/**
	 * Gets the list of players that containt the given part.
	 * @param  string $part Partial name to search for.
	 * @return json         Array of players containing the given part in their names.
	 */
	public function getSearch(Request $request) 
	{
		$part = $request->input('query');

		$names = Player::where('name', 'like', '%' . $part . '%')->take(10)->get(array('name'))->toArray();

		return response()->json($names);
	}

	/**
	 * Shows the details of a player.
	 * @param  string $player The name of the player to display.
	 * @return Response       The response view.
	 */
	public function getShow($player) {
		// Get the player from the database
		$player = Player::where('name', '=', $player)->with('cities', 'cities.island')->first();

		// Check if the player exists
		if (is_null($player)) {
			// No such player
			abort(404);
			return;
		}

		// The following two could be executed within one query but let's use two for cleaner code and better maintainability
		// Get the alliance history of the player
		$allies = DB::select('SELECT DISTINCT ally_tag FROM player_stats WHERE ally_tag IS NOT null AND player_id = ' . $player->id);

		// Get the name history of the player
		$names = DB::select('SELECT DISTINCT name FROM player_stats WHERE player_id = ' . $player->id);

		return Response::view('player.show', [
				"player" => $player,
				"allies" => $allies,
				"names"  => $names
			]);
	}
}
