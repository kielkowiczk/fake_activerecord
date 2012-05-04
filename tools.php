<?php
interface Enumerable {
	public function each($fnc);
}

function puts($str) {
		print $str."\n";
}

class SmartArray implements Enumerable{
     protected $inner_array;
     
     public function __construct($array) {
       $this -> inner_array = $array;
     }
   
     public  function first() {
     return $this -> inner_array[0];
    }
    
    public function count() {  return count($this -> inner_array);
    }
  
    public function each($fnc) {
      foreach($this -> inner_array as &$el) {
        $fnc(&$el);
      }
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
