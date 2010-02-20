<?php

  namespace lib;

  class Controller {
    var $view;
    var $uses;
    var $auto_render = true;
    var $use_layout = 'default';
    var $parent;
    var $data = array();
    
    function __construct() {
      $this->view = new View($this);
    }
    
    function __call($func, $params) {
      if (method_exists($this->view, $func)) {
        return call_user_func_array(array($this->view, $func), $params);
      }
    }
    
    function redirect($url) {
      header("Location: $url");
      exit();
    }
  }
