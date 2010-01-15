<?php

  namespace lib;
  
  class View {
    private $_template;
    private $_controller;
  
    function __construct($ctrl) {
      $te = \Locus\template_engine;
      $te = "views\\" . $te;
      $this->_template = new $te();
      $this->_controller = $ctrl;
    }
    
    function set($var, $val) {
      $this->_template->set($var, $val);
    }
    
    function layout($content) {
      $this->set('content', $content);
      return $this->_template->render(\Locus\root_dir . '/views/layout/' . $this->_controller->layout . '.tpl');
    }
    
    function render($template) {
      if (isset($this->_controller->title)) $this->set('title', $this->_controller->title);
    
      $controller = strtolower(str_replace('controllers\\', '', get_class($this->_controller)));
      
      if ($this->_controller->auto_render == true) {
        return $this->_template->render(\Locus\root_dir . '/views/' . $controller . '/' . $template . '.tpl');
      } else {
        print $this->_template->render(\Locus\root_dir . '/views/' . $controller . '/' . $template . '.tpl');
      }
    }
  }
