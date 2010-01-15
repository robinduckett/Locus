<?php

  namespace views;
  
  class DwooTemplate {
    var $_vars;
    var $_dwoo;
    
    function __construct() {
      include_once 'external/dwoo/dwooAutoload.php';
      $this->_dwoo = new \Dwoo();
      $this->set('Locus', true);
    }
    
    public function set($var, $val) {
      $this->_vars[$var] = $val;
    }
    
    public function render($template) {
      try {
        return $this->_dwoo->get($template, $this->_vars);
      } catch (Exception $e) {
        global $routes;
        $routes($routes->_route['404'], array('params' => $err_str));
      }
    }
  }
