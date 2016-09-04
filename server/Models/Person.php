<?php namespace App;

use Illuminate\Database\Eloquent\Model as Model;

class Person extends Model{
	protected $table = 'person';
	public $timestamps =  false;

	public function wedding()
    {
        return $this->hasOne('App\Wedding');
    }

    public function account()
    {
        return $this->hasMany('App\Account');
    }

	public function delete(){
		return parent::delete();
	}
}