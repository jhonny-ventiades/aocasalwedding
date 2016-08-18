<?php namespace App;

use Iluminate\Database\Eloquent\Model as Model;

class Wish extends Model{
	protectec $table = 'wish';
	public $timestamps =  false;

	public function event(){
		return $this->belongsTo('App\Event');
	}

	public function contribution(){
		return $this-> hasMany('App\Contribution');
	}

	public function delete(){
		return parent::delete();
	}
}