<?php
abstract class FakeAbstrackAdapter {
	public function select($class_name, $name, $args)
	{
		$this -> connect();
		puts("Trying to find/select in/from ".$class_name." table by field:".$name." with value:".$args -> first());
	}

	abstract public function connect();
}

class FakeAdapterAbstract extends FakeAbstrackAdapter {
	public function connect() {
		puts('Connecting to nothing...');
	}
//	public function select($class_name, $name, $args) {
//		puts("Trying to find/select in/from ".$class_name." table by field:".$name." with value:".$args -> first());
//	}
}
class FakeAdapterMySQL extends FakeAbstrackAdapter {
	public function connect() {
		puts('Connecting to MySQL...');
	}

//	public function select($class_name, $name, $args) {
//		puts("Trying to find/select in/from ".$class_name." table by field:".$name." with value:".$args -> first());
//	}
}

class FakeAdapterPosgrsql extends FakeAbstrackAdapter {
	public function connect() {
		puts('Connecting to Posgresql...');
	}

//	public function select($class_name, $name, $args) {
//		puts("Trying to find/select in/from ".$class_name." table by field:".$name." with value:".$args -> first());
//	}
}

class FakeAdapterFactory {
	private $adapter;

	static public function create($config) {
		puts($config['adapter']);

		switch($config['adapter']) {
			case 'abstract':
				$adapter = new FakeAdapterAbstract();
			break;
			
			case 'mysql':
				$adapter = new FakeAdapterMySQL();
			break;
	
			case 'postresql':
				$adapter = new FakeAdapterPosgrsql();
			break;

			default:
				throw new Exception('Unknown adapter.');
			break;
		}
		return $adapter; 	
	}
}
?>
