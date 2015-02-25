<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model {
	protected $table = 'cities';
	public $timestamps = false;

	public function player()
    {
        return $this->belongsTo('App\Player');
    }

    public function island() 
    {
    	return $this->belongsTo('App\Island');
    }
}
