<?php

  namespace models;
  use app\Model as Model;
  
  class Author extends Model {
  	public $username;
  	public $user_id;
  	
  	function __construct() {
			$this->belongsTo(array('Page', 'Comment'));
		}
  }