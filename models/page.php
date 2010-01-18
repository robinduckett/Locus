<?php

  namespace models;
  use app\Model as Model;
  
  class Page extends Model {
    public $struct = array(
      'id' => array(
        'type' => 'integer',
        'length' => 11,
      ),
      'title' => array(
        'type' => 'string',
        'length' => 40,
      ),
      'body' => array(
        'type' => 'string',
        'length' => '1024'
      ),
      'author' => array(
        'type' => 'object',
        'struct' => array(
          'id' => array(
            'type' => 'integer',
            'length' => 11
          ),
          'name' => array(
            'type' => 'string',
            'length' => 40
          )
        )
      ),
    );
  }
