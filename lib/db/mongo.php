<?php

  namespace lib\db;
  
  class Mongo {
    private static $_instance;
    
    function __construct() {
      
    }    
  
    function &getInstance() {
      if (self::$_instance == null) {
        $db = Configure::read('database');
        self::$_instance = new \Mongo($db['connect']);
      }
      
      return self::$_instance;
    }
  }
