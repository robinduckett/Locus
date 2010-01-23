<?php

  namespace lib\db;
  use lib\Configure as Configure;
  
  class Mongo {
    protected static $_instance;
    protected static $mongo;
    protected static $db;
    
    function init($db) {
      $_this =& Mongo::getInstance();
      try {
        $_this->mongo = new \Mongo($db['connect']);
        $_this->db = $_this->mongo->{$db['database']};
      } catch (\MongoConnectionException $e) {
        $_this->mongo = null;
        $_this->db = null;
        return false;
      }
    }
    function connected() {
      $_this =& Mongo::getInstance();
    	return $_this->mongo == null ? false : true;
    }
    
    function db() {
      $_this =& Mongo::getInstance();
      if ($_this->mongo == null or $_this->db == null) return null;
      return $_this->mongo->{$_this->db};
    }
    
    function &getInstance() {
      if (self::$_instance == null) {
        self::$_instance = new Mongo();
      }
      
      return self::$_instance;
    }
  }
