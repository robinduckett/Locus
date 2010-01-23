<?php

  namespace controllers;
  
  use \app\Controller as Controller;
  use \lib\Configure as Configure;

  class Pages extends Controller {
    var $uses = array('Page');
  
    public function index() {    
      $this->title = 'Homepage';
      
      $version = Configure::read('version');
      if ($this->Page->can_connect()) $this->set('database', true);
      
      $this->Page->title = "Homepage";
      $this->Page->body = 'This is the homepage body';
      $this->Page->Author->username = 'robinduckett';
      $this->Page->Author->user_id = '1';
      $this->Page->commit();
      
      $comment = $this->Page->add('Comment');
      $first_comment = $this->Page->Comment[$comment];
      
      $first_comment->Author->username = 'andrewthomas';
      $first_comment->Author->user_id = '2';
      $first_comment->body = 'Probably still lives with his mum';
      $first_comment->commit();
      
      $comment = $this->Page->Comment[$comment]->add('Comment');
      $second_comment = $first_comment->Comment[$comment];
      $second_comment->Author->username = 'robinduckett';
      $second_comment->Author->user_id = '2';
      $second_comment->body = 'Shut up, asshole!';
      $second_comment->commit();
      
      $page = $this->Page->objectify();
      
      $this->set(compact('page', 'version'));
    }
    
    public function show_404() {
      // placeholder
    }
  }
