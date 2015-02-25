<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerStat extends Model {
	protected $table = 'player_stats';
	public $timestamps = false;

	public function player() 
    {
    	return $this->belongsTo('App\Player');
    }
}
