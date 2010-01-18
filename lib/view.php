<?php

  namespace lib;
  
  class View {
    private $_template;
    private $_controller;
  
    function __construct($ctrl) {
      $te = "lib\\views\\" . Configure::read('template_engine');
      $this->_template = new $te();
      $this->_controller = $ctrl;
    }
    
    function set() {
      $args = func_get_args();
      if (count($args) > 0) {
        if (is_string($args[0])) {
          $this->_template->set($args[0], $args[1]);
        } elseif (is_array($args[0])) {
          foreach($args as $arg) {
            foreach ($arg as $var => $val) {
              $this->_template->set($var, $val);
            }
          }
        }
        
        return true;
      } else {
        return false;
      }
    }
    
    function layout($content) {
      $this->set('content', $content);
      return $this->_template->render(\lib\Configure::read('root_dir') . '/views/layout/' . $this->_controller->use_layout . '.tpl');
    }
    
    function render($template) {
      if (isset($this->_controller->title)) $this->set('title', $this->_controller->title);
    
      $controller = strtolower(str_replace('controllers\\', '', get_class($this->_controller)));
      
      if ($this->_controller->auto_render == true) {
        return $this->_template->render(\lib\Configure::read('root_dir') . '/views/' . $controller . '/' . $template . '.tpl');
      } else {
        print $this->_template->render(\lib\Configure::read('root_dir') . '/views/' . $controller . '/' . $template . '.tpl');
      }
    }
  }
