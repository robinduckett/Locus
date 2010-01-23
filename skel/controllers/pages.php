<?php

  namespace controllers;
  
  use \app\Controller as Controller;
  use \lib\Configure as Configure;

  class Pages extends Controller {
    var $uses = array('Page');
  
    public function index() {    
      $version = Configure::read('version');
      $this->set('database', $this->Page->can_connect());
      $this->set(compact('version'));
    }
    
    public function show_404() {
      // placeholder
    }
  }
