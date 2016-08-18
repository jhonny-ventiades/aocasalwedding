<?php namespace App;

use Iluminate\Database\Eloquent\Model as Model;

class Account extends Model{
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