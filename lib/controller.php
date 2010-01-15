<?php

  namespace lib;

  class Controller {
    var $view;
    var $auto_render = true;
    var $layout = 'default';
    
    function __construct() {
      $this->view = new View($this);
    }
    
    function before_render() {
      
    }
       
    function after_render() {
      //probably clean up db connections here
    }
  }
