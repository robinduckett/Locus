<?php

  namespace models;
  use app\Model as Model;
  
  class Comment extends Model {
  	public $body;
  	public $created;
  	
		function __construct() {
			$this->belongsTo(array('Page'));
			$this->hasOne(array('Author'));
		}
  }