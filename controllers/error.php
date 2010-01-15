<?php

  namespace controllers;
  use \lib\Controller as Controller;

  class Error extends Controller {
    public function fourohfour($err_str) {
      $this->view->set('error', $err_str);
    }
  }
