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
      try {
        $mongo = new \Mongo($db['connect']);
        if ($mongo) $this->set('database', true);
      } catch (\Exception $e) {
        
      }
      
      $this->set(compact('page', 'death', 'version'));
    }
    
    public function show_404() {
      // placeholder
    }
  }
