<?php
include 'tools.php';

abstract class FakeAbstrackAdapter {
	abstract public function select($class_name, $name, $args);
}

class FakeAdapter extends FakeAbstrackAdapter {
	public function select($class_name, $name, $args) {
		puts("Trying to find/select in/from ".$class_name." table by field:".$name." with value:".$args -> first());
	}
}

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
		$adapter = new FakeAdapter();
		$adapter -> select($class_name, str_replace('find_by_', '', $name), new SmartArray($args));
	}	
}

?>
