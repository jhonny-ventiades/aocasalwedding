<?php namespace App;

use Iluminate\Database\Eloquent\Model as Model;

class Contribution extends Model{
	protectec $table = 'account';
	public $timestamps =  false;

	public function account(){
		return $this->belongsTo('App\Account');
	}

	public function wish(){
		return $this->belongsTo('App\Wish');
	}
	
	public function delete(){
		return parent::delete();
	}
}