<?php

  namespace models;
  use app\Model as Model;
  
  class Page extends Model {  	
    public $title;
    public $body;
    public $created;
  	
		function __construct() {
			$this->hasOne(array('Author'));
			$this->hasMany(array('Comment'));
		}
  }