<?php

interface ISuperUser{
	public function getInfo();
}

class User{

	public $name;
	public $login;
	public $password;

	public function __construct($name, $login, $password){
		$this->name = $name;
		$this->login = $login;
		$this->password = $password;
	}

	public function showInfo(){
		echo "Name: $this->name\n";
		echo "Login: $this->login\n";
		echo "Password: $this->password\n\n";
	}

}

class SuperUser extends User implements ISuperUser{
	public $role;

	public function __construct($name, $login, $password, $role){
		parent::__construct($name, $login, $password);
		$this->role = $role;
	}

    public function showInfo(){
		parent::showInfo();
		echo "Role: $this->role\n\n";
	}

	public function getInfo(){
		$arr = [];
		$arr = [
			"Name"     => $this->name,
			"Login"    => $this->login,
			"Password" => $this->password
		];

		return $arr;
	}

}

class SuperPuperAdmin extends SuperUser{

	public function __construct($name, $login, $password, $role){
		parent::__construct($name, $login, $password, $role);
	}

	public function showInfo(){
        parent::showInfo();
	}
}

$user1 = new User("John Smith", "john@example.com", 123);
$user2 = new User("Mike Dow", "mike@example.com", 456);
$user3 = new User("Ivan Petrov", "ivan@example.com", 789);

$user1->showInfo();
$user2->showInfo();
$user3->showInfo();

$superUser = new SuperUser("Vasya Pupkin", "vasya@example.com", 100, "admin");
$superUser->showInfo();
print_r($superUser->getInfo());

$superPuperAdmin = new SuperPuperAdmin("Evgeniy Andreev", "e.andreev@example.com", 555, "superAdmin");
$superPuperAdmin->showInfo();
