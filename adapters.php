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
}

class FakeAdapterMySQL extends FakeAbstrackAdapter {
	public function connect() {
		puts('Connecting to MySQL...');
	}
}

class FakeAdapterPosgrsql extends FakeAbstrackAdapter {
	public function connect() {
		puts('Connecting to Posgresql...');
	}

}

class FakeAdapterFactory {
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
