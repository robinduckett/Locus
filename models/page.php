<?php

  namespace models;
  use app\Model as Model;
  
  class Page extends Model {
    public $title = '';
    public $body = '';
    
    public $author = array(
      'username' => '',
      'userid' => 0
    );
    
    public $comments = array(
      'body' => '',
      'name' => '',
      'created' => 0,
    );
    
    public $created;
  }
