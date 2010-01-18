<?php

  namespace lib;
  
  class Configure {
  
    protected static $_instance;
    private $__configs = array();
  
    function write($var, $value = null) {
      $_this =& Configure::getInstance();
      $_this->__configs[$var] = $value;
    }
    
    function read($var) {
      $_this =& Configure::getInstance();
      return $_this->__configs[$var];
    }  
  
    function &getInstance() {
      if (self::$_instance == null) {
        self::$_instance = new Configure();
      }
      
      return self::$_instance;
    }
  }
