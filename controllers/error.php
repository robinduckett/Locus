<?php

  namespace controllers;
  use \app\Controller as AppController;

  class Error extends AppController {
    public function fourohfour($err_str) {
      $this->set('error', $err_str);
    }
  }
