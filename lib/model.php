<?php

  namespace lib;
  use lib\db\Mongo as Mongo;
  
  class Model {
  	private $__collection;
  	private $__db;
  	
  	private $__struct;
  	private $__has_one = array();
  	private $__has_many = array();
  	private $__belongs_to = array();
  	
    function can_connect() {
    	$this->__db = Mongo::getInstance();
      return $this->__db->connected();
    }
    
    function __construct() {
    	$this->__db = Mongo::getInstance();
    	
    	$db = Configure::read('database');
    	$model = str_replace('models\\', '', strtolower(get_class($this)));
    	
    	$this->__db->db($db['database']);
    	$this->__collection = $this->__db->get_collection($model);
    }
    
    function hasOne($classes) {
    	foreach ($classes as $assoc) {
    		ModelRegistry::init($assoc);
    	}
    	
    	// print_r($model_registry[4]->getVar());
    	// 
    	// foreach ($classes as $assoc) {
    	// 	$model = "models\\$assoc";
    	// 	if (!isset($this->{$assoc})) {}
    	// 		//$this->{$assoc} = ModelRegistry::init($model);
  		//}
    }
    
    function hasMany($classes) {
    	foreach ($classes as $assoc) {
    		ModelRegistry::init($assoc);
    	}
	  	//     	$model_registry = ModelRegistry::getInstance();
	  	//     	foreach ($classes as $assoc) {
	  	//     		$model = "models\\$assoc";
	  	//     		if (!isset($this->{$assoc}))
	  	//     			$this->{$assoc} = $assoc;
	  	// }
    }
    
    function belongsTo($classes) {
    	foreach ($classes as $assoc) {
    		ModelRegistry::init($assoc);
    	}
    	// $model_registry = ModelRegistry::getInstance();
    	//     	foreach ($classes as $assoc) {
    	//     		$model = "models\\$assoc";
    	//     		if (!isset($this->{$assoc}))
    	//     			$this->{$assoc} = $assoc;
    	//   		}
    }
    
    // function __get($name) {
    //     	$relations = array('__has_one', '__belongs_to', '__has_many');
    //     	
    //     	foreach ($relations as $relation) {
    //     		if (array_key_exists($name, $this->$relation)) {
    //     			return $this->$relation[$name];
    //     		}
    //     	}
    //     }
    
    function commit() {
    	foreach ($this as $var => $val) {
    		if (substr($var, 0, 2) !== "__")
    			print_r($var . "(".get_class($this)."):" . print_r($val, true) . "<br />");
    	}
    }
  }
