<?php namespace App;

use Iluminate\Database\Eloquent\Model as Model;

class Account extends Model{
	protectec $table = 'account';
	public $timestamps =  false;

	public function contribution()
    {
        return $this->hasMany('App\Contribution');
    }

	public function person(){
		return $this->belongsTo('App\Person');
	}
	
	public function delete(){
		return parent::delete();
	}
}