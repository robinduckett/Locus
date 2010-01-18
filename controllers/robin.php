<?php

  namespace controllers;
  use \app\Controller as Controller;

  class Robin extends Controller {
    public function isit() {
      $this->view->set('var', 123);
    }
    
    function index() {
      $this->auto_render = false;
      $this->set('test', 'this is one');
      $this->render('welcome');
    }
    
    public function before_render() {
      parent::before_render();
      $this->set('var', 123);
    }
  }
