<?php

  namespace controllers;
  
  use \app\Controller as Controller;
  use \lib\Configure as Configure;

  class Pages extends Controller {
    var $uses = array('Page');
  
    public function index() {    
      $this->title = 'Homepage';
      $page = new \stdClass();
      $page->body = "I wear my trousers baggy";
      $death = 'what\'s up noob';
      
      $version = Configure::read('version');
      
      $db = Configure::read('database');
      
      if ($this->Page->can_connect()) $this->set('database', true);
      
      $this->Page->title = "Homepage";
      $this->Page->body = 'This is the homepage body';
      $this->Page->Author->username = 'robinduckett';
      $this->Page->Author->user_id = '1';
      $this->Page->commit();
      
      $this->set(compact('page', 'death', 'version'));
    }
    
    public function show_404() {
      // placeholder
    }
  }
