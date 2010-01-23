<?php

  namespace lib\db;
  use lib\Configure as Configure;
  
  class Mongo {
    protected static $_instance;
    protected static $mongo;
    protected static $db;
    
    function connected() {
    	return self::$mongo == null ? false : true;
    }
    
    function db($db) {
    	self::$db = $db;
    	return self::$mongo->$db;
    }
    
    function get_collection($collection) {
    	return self::$mongo->{self::$db}->$collection;
    }
  
    function &getInstance() {
      if (self::$_instance == null) {
        self::$_instance = new Mongo();
        
        $db = Configure::read('database');
      	self::$mongo = new \Mongo($db['connect']);
      }
      
      return self::$_instance;
    }
  }
