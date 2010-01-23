<?php

  namespace app;
  
  use \lib\Configure as Configure;
  
  Configure::getInstance();
  
  Configure::write('version', '0.1.2');
  
  Configure::write(
    'database', 
    array(
	    'connect' => 'mongodb://localhost:27017',
	    'database' => 'timesheet'
    )
  );
  
  Configure::write('template_engine', 'dwoo');
  
  use \lib\db\Mongo as Mongo;
  
  Mongo::getInstance();
  Mongo::init(Configure::read('database'));
