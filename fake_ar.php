<?php
include 'tools.php';

class FakeActiveModel {
	protected $properties;
	
	public function __construct() {
		$this -> $properties = new SmartArray(array());
	}

	public function __get($field) {
		return $this -> properties -> get_array[$field];
	}
	
	public function __set($field, $value) {
		$this -> properties -> get_array[$field] = $value;
	}

	static public function __callStatic($name, $args) {
		$class_name = get_called_class();
		finder($class_name, str_replace('find_by_', '', $name), new SmartArray($args));
	}	
}

function finder($class_name, $name, $args) {
	print("Trying to find in table ".$class_name." by field:".$name." with value: ".$args -> first()."\n");
}


class User extends FakeActiveModel {
}


$user = new User;
User::find_by_email('sample@example.com or kazek@example.com');

$user -> email = 'sample@example.com';
puts($user -> email);

$user -> dog = "have no dog";
puts($user -> dog);
?>
