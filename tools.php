<?php
interface Enumerable {
	public function each($fnc);
}

function puts($str) {
		print $str."\n";
}

class SmartArray implements Enumerable, ArrayAccess{
    protected $inner_array;
	     
    public function __construct($array) {
    	$this -> inner_array = $array;
    }
   
    public function first() {
			return $this -> inner_array[0];
    }
    
    public function count() {  
			return count($this -> inner_array);
    }
  
    public function each($fnc) {
      foreach($this -> inner_array as &$el) {
        $fnc(&$el);
      }
    }

		/* ArrayAccess methods */ 
		public function offsetExists($index) {
			return isset($this -> inner_array[$index]);
		}
		
		public function offsetGet($index) {
			return	$this -> inner_array[$index];		
		}
	
		public function offsetSet($index, $value) {
			if ( is_null($index) ) {
				$this -> inner_array[] = $value;
			}
			else {
				$this -> inner_array[$index] = $value;
			}
		}
	
		public function offsetUnset($index) {
			unset($this -> inner_array[$index]);
		}

    public function &get_array() {
      return $this -> inner_array;
    }
  
    /* Pass by references
    public function each($fnc) {
      foreach($this -> inner_array as &$el) {
        $fnc(&$el);
      }
    }
    */
  }
?>
