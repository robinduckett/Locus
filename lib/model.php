<?php

  namespace lib;
  use lib\db\Mongo as Mongo;
  
  class Model {
  	private $__collection;
  	private $__db;
  	
  	private $_struct;
  	private $_hasOne = array();
  	private $_hasMany = array();
  	private $_belongsTo = array();
  	
  	private $_c_has_one = array();
  	private $_c_has_many = array();
  	private $_c_belongs_to = array();
  	
    function can_connect() {
    	$this->__db = Mongo::getInstance();
      return $this->__db->connected();
    }
    
    function __con_struct() {
    	$this->__db = Mongo::getInstance();
    	
    	$db = Configure::read('database');
    	$model = str_replace('models\\', '', strtolower(get_class($this)));
    	
    	$this->__db->db($db['database']);
    	$this->__collection = $this->__db->get_collection($model);
    }
    
    function hasOne($classes) {
    	foreach ($classes as $assoc) {
    		$this->_hasOne[] = $assoc;
    		$this->_struct[] = $assoc;
    	}
    }
    
    function hasMany($classes) {
    	foreach ($classes as $assoc) {
    		$this->_hasMany[] = $assoc;
    		$this->_struct[] = $assoc;
    	}
    }
    
    function belongsTo($classes) {
    	foreach ($classes as $assoc) {
    		$this->_belongsTo[] = $assoc;
    		$this->_struct[] = $assoc;
    	}
    }
    
    function add($prop) {
      $model = "\models\\$prop";
      
      if (!isset($this->_c_has_many[$prop])) {
        $this->_c_has_many[$prop] = array();
      }
      
      $this->_c_has_many[$prop][] = new $model();
      return count($this->_c_has_many[$prop])-1;
    }
    
    function objectify() {
      $object = new \stdClass;
      
      foreach (get_object_vars($this) as $name => $var) {
        if (substr($name, 0, 1) !== "_") {
          if ($name == 'created' and $var == '') $var = strtotime('now');
          if ($name == 'modified') $var = strtotime('now');
          $object->$name = $var;
        }
      }
      
      foreach ($this->_c_has_many as $type => $model) {
        if (!isset($object->$type)) $object->$type = array();
        foreach ($model as $index => $class) {
          $object->{$type}[$index] = $class->objectify();
        }
      }
      
      foreach (array_merge($this->_c_has_one, $this->_c_belongs_to) as $type => $model) {
        $object->$type = $model->objectify();
      }
      
      return $object;
    }
    
    function __set($prop, $value) {
      $this->$prop = $value;
    }
    
    function __get($prop) {
      if (in_array($prop, $this->_struct)) {
        $model = "\models\\$prop";
        
        
        if (in_array($prop, $this->_hasMany)) {
          if (!isset($this->_c_has_many[$prop])) {
            $this->_c_has_many[$prop] = array();
          }
                    
          return $this->_c_has_many[$prop];
        } elseif (in_array($prop, $this->_hasOne)) {
          if (!isset($this->_c_has_one[$prop])) $this->_c_has_one[$prop] = new $model();
          return $this->_c_has_one[$prop];
        } elseif (in_array($prop, $this->_belongsTo)) {
          if (!isset($this->_c_belongs_to[$prop])) $this->_c_belongs_to[$prop] = new $model();
          return $this->_c_has_one[$prop];
        }
      } else {
        return null;
      }
    }
    
    function commit() {
    }
  }
