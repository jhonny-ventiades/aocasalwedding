<?php namespace App;

use Iluminate\Database\Eloquent\Model as Model;

class Event extends Model{
	protectec $table = 'event';
	public $timestamps =  false;

	public function wedding()
    {
        return $this->hasMany('App\Wedding');
    }

    public function wish()
    {
        return $this->hasMany('App\Wish');
    }

	public function delete(){
		return parent::delete();
	}
}