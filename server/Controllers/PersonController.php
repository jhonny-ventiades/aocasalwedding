<?php namespace App\Controllers;

use App\Person;
use App\Wedding;
use App\Account;

class PersonController {

	public function savePerson(){
		 
		$app = \Slim\Slim::getInstance();
        $body = json_decode($app->request->getBody(), true);
		$res = $app->response();
		$res['Content-Type'] = 'application/json';
		if($body['name']== "" || $body['name'] == null){
			$res->setStatus(412);
			$res->body(json_encode(array("status"=>412,
										"description"=>"Name field is empty.")));
			return $res;
		}
		else
			if($body['lastName']== "" || $body['lastName'] == null){
				$res->setStatus(412);
				$res->body(json_encode(array("status"=>412, "description"=>"Last Name field is empty.")));
				return $res;
			}
			else
				if($body['email']== "" || $body['email'] == null){
					$res->setStatus(412);
					$res->body(json_encode(array("status"=>412, "description"=>"Email field is empty.")));
					return $res;
				}
				else 
					if($body['birthDate']== "" || $body['birthDate'] == null){
						$res->setStatus(412);
						$res->body(json_encode(array("status"=>412, "description"=>"BirthDate field is empty.")));
						return $res;
					}
					else
						if($body['phone']== "" || $body['phone'] == null){
							$res->setStatus(412);
							$res->body(json_encode(array("status"=>412, "description"=>"Phone field is empty.")));
							return $res;		
						}
						else
							if($body['user']== "" || $body['user'] == null){
							$res->setStatus(412);
							$res->body(json_encode(array("status"=>412, "description"=>"User field is empty.")));
							return $res;		
							}
							else
								if($body['password']== "" || $body['password'] == null){
									$res->setStatus(412);
									$res->body(json_encode(array("status"=>412, "description"=>"Password field is empty.")));
									return $res;
								}
								else{
									$body['password'] = $encryptPassword = hash('sha256', $body['password']);
									$person = new Person;
									$person->name = $body['name'];
									$person->lastName = $body['lastName'];
									$person->email = $body['email'];
									$person->birthDate = $body['birthDate'];
									$person->phone = $body['phone'];
									$person->photoPath = $body['photoPath'];
									$person->user = $body['user'];
									$person->password = $body['password'];
									$person->token = $body['token'];
								    $person->save();
								    $res->setStatus(200);
									$res->body(json_encode(array("status"=>200,"description"=>"Save Corrected")));
									return $res;
								}
	}

	public function updatePerson($id){
		$app = \Slim\Slim::getInstance();
        $body = json_decode($app->request->getBody(), true);
		$res = $app->response();
		$res['Content-Type'] = 'application/json';
		if($body['name']== "" || $body['name'] == null){
			$res->setStatus(412);
			$res->body(json_encode(array("status"=>412,
										"description"=>"Name field is empty.")));
			return $res;
		}
		else
			if($body['lastName']== "" || $body['lastName'] == null){
				$res->setStatus(412);
				$res->body(json_encode(array("status"=>412, "description"=>"Last Name field is empty.")));
				return $res;
			}
			else
				if($body['email']== "" || $body['email'] == null){
					$res->setStatus(412);
					$res->body(json_encode(array("status"=>412, "description"=>"Email field is empty.")));
					return $res;
				}
				else 
					if($body['birthDate']== "" || $body['birthDate'] == null){
						$res->setStatus(412);
						$res->body(json_encode(array("status"=>412, "description"=>"BirthDate field is empty.")));
						return $res;
					}
					else
						if($body['phone']== "" || $body['phone'] == null){
							$res->setStatus(412);
							$res->body(json_encode(array("status"=>412, "description"=>"Phone field is empty.")));
							return $res;		
						}
						else{
							$person = Person::find($id);
							$person->name = $body['name'];
							$person->lastName = $body['lastName'];
							$person->email = $body['email'];
							$person->birthDate = $body['birthDate'];
							$person->phone = $body['phone'];
							$person->photoPath = $body['photoPath'];
						    $person->save();
						    $res->setStatus(200);
							$res->body(json_encode(array("status"=>200,"description"=>"Update Corrected")));
							return $res;
						}
	}

	public function updateUser($id){
		$app = \Slim\Slim::getInstance();
        $body = json_decode($app->request->getBody(), true);
		$res = $app->response();
		$res['Content-Type'] = 'application/json';
		if($body['user']== "" || $body['user'] == null){
			$res->setStatus(412);
			$res->body(json_encode(array("status"=>412,"description"=>"User field is empty.")));
			return $res;
		}
		else
			if($body['password']== "" || $body['password'] == null){
				$res->setStatus(412);
				$res->body(json_encode(array("status"=>412,"description"=>"Password field is empty.")));
				return $res;
			}
			else{
				$body['password'] = $encryptPassword = hash('sha256', $body['password']);
				$user = Person::find($id);
				$user->user = $body['user'];
				$user->password = $body['password'];
				$user->save();
				$res->setStatus(200);
				$res->body(json_encode(array("status"=>200,"description"=>"User Update Corrected")));
				return $res;
			}
	}

	public function logIn(){
		$app = \Slim\Slim::getInstance();
        $body = json_decode($app->request->getBody(), true);
		$res = $app->response();
		$res['Content-Type'] = 'application/json';
		if($body['user']== "" || $body['user'] == null){
			$res->setStatus(412);
			$res->body(json_encode(array("status"=>412,"description"=>"User field is empty.")));
			return $res;
		}
		else
			if($body['password']== "" || $body['password'] == null){
				$res->setStatus(412);
				$res->body(json_encode(array("status"=>412,"description"=>"Password field is empty.")));
				return $res;
			}
			else{
				$body['password'] = $encryptPassword = hash('sha256', $body['password']);
				$conditions = ['user'=>$body['user'], 'password'=> $body['password']];
				$user = Person::where($conditions)->count();
				if($user > 0){
					$res->setStatus(200);
					$res->body(json_encode(array("status"=>200)));
					return $res;
				}
				else{
					$res->setStatus(404);
					$res->body(json_encode(array("status"=>404, "description"=>"User Incorrect.")));
					return $res;
				}
			}
	}
}

?>