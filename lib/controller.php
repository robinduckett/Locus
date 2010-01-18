<?php

  namespace lib;

  class Controller {
    var $view;
    var $auto_render = true;
    var $use_layout = 'default';
    
    function __construct() {
      $this->view = new View($this);
    }
      
    function before_render() {
      
    }
       
    function after_render() {
      
    }
    
    function __call($func, $params) {
      if (method_exists($this->view, $func)) {
        return call_user_func_array(array($this->view, $func), $params);
      }
    }
  }
