<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model {
	protected $table = 'players';
	public $timestamps = false;

    public function cities()
    {
        return $this->hasMany('App\City');
    }

    public function stats() 
    {
    	return $this->hasMany('App\PlayerStat');
    }

}
