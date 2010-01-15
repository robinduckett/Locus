<?php

  namespace controllers;
  use \lib\Controller as Controller;

  class Robin extends Controller {
    public function isit() {
      $this->view->set('var', 123);
    }
    
    function index() {
      $this->auto_render = false;
      $this->view->set('test', 'this is one');
      $this->view->render('welcome');
    }
    
    public function before_render() {
      parent::before_render();
      $this->view->set('var', 123);
    }
  }
