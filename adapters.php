<?php
abstract class FakeAbstrackAdapter {
	abstract public function select($class_name, $name, $args);
}

class FakeAdapter extends FakeAbstrackAdapter {
	public function select($class_name, $name, $args) {
		puts("Trying to find/select in/from ".$class_name." table by field:".$name." with value:".$args -> first());
	}
}
?>
