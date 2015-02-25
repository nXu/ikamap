<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Island extends Model {
	protected $table = 'islands';
	public $timestamps = false;

    public function cities()
    {
        return $this->hasMany('App\City');
    }
}
