<?php

  namespace lib\views;
  
  class Dwoo {
    protected static $instance;
  
    var $_vars;
    var $_dwoo;
    
    function __construct() {
      spl_autoload_unregister('\App\locus_autoload');
        include_once \lib\Configure::read('locus_dir') . DIRECTORY_SEPARATOR . 'lib/external/dwoo/dwooAutoload.php';
        $this->_dwoo = new \Dwoo();
        $locus = \lib\Configure::read('locus_dir').'/app/dwoo/plugins';
        $root = \lib\Configure::read('root_dir').'/app/dwoo/plugins';
        if(file_exists($locus)) $this->_dwoo->getLoader()->addDirectory($locus);
        if(file_exists($root)) $this->_dwoo->getLoader()->addDirectory($root);
      spl_autoload_register('\App\locus_autoload');
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
    
    function &getInstance() {
      if (self::$_instance == null) {
        self::$_instance = new Dwoo();
      }
      
      return self::$_instance;
    }
  }
