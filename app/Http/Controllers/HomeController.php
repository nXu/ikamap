<?php namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller {

    /**
     * Show the home page.
     *
     * @return Response
     */
    public function getIndex()
    {
    	$lastUpdate = DB::select('SELECT max(updated_at) as max FROM player_stats');

        return view('home.home', array('update' => $lastUpdate[0]->max));
    }
}
