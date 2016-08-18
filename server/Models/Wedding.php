<?php namespace App;

use Iluminate\Database\Eloquent\Model as Model;

class Wedding extends Model{
	protectec $table = 'wedding';
	public $timestamps =  false;

	public function person(){
		return $this->belongsTo('App\Person');
	}

	public function event(){
		return $this->belongsTo('App\Event');
	}
	
	public function delete(){
		return parent::delete();
	}
}