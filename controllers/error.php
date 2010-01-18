<?php

  namespace controllers;
  use \app\Controller as Controller;

  class Error extends Controller {
    public function fourohfour($err_str) {
      $this->set('error', $err_str);
    }
  }
