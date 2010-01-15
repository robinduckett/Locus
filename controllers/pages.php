<?php

  namespace controllers;
  use \lib\Controller as Controller;

  class Pages extends Controller {
    public function index() {
      $this->title = 'Homepage';
    }
    
    public function show_404() {
      // placeholder
    }
  }
