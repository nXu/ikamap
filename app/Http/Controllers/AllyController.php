<?php namespace App\Http\Controllers;

use DB, Response;
use App\Player;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AllyController extends Controller {

		/**
	 * Displays the form for searching allies.
	 * @return Response The response view.
	 */
	public function getIndex() {
		return Response::view('general.search', ['singular' => 'ally', 'plural' => 'allies']);
	}

	/**
	 * Gets the list of allies those tag contains the given part.
	 * @param  string $part Partial name to search for.
	 * @return json         Array of allies containing the given part in their tags.
	 */
	public function getSearch(Request $request) 
	{
		$part = $request->input('query');

		$allies = DB::select("SELECT DISTINCT ally_tag AS name FROM players WHERE ally_tag LIKE '%" . $part . "%'");

		return response()->json($allies);
	}

	/**
	 * Displays the list of players who are members of the given ally.
	 * @param  string $ally Ally tag to display members of.
	 * @return Response
	 */
	public function getShow($ally)
	{
		// Get players
		$players = Player::with('cities')->where('ally_tag', '=', $ally)->orderBy('name', 'asc')->get();

		if (is_null($players) || $players->count() < 1) {
			// No such ally found
			abort(404);
		}

		return Response::view('allies.show', [
				'ally'	  => $ally,
				'players' => $players
			]);
	}
}
