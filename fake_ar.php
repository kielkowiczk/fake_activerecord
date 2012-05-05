<?php
include 'tools.php';
include 'adapters.php';

class FakeActiveModel {
	protected $properties;
	
	public function __construct() {
		$this -> $properties = new SmartArray(array());
	}

	public function __get($field) {
		return $this -> properties -> get_array[$field];
		//return $this -> properties[$field];
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
