<?php

  namespace app;
  
  use \lib\Configure as Configure;
  
  Configure::getInstance();
  
  Configure::write('version', '0.1.2');
  
  Configure::write(
    'database', 
    array(
      'type' => 'mongo',
      'connect' => 'mongodb://localhost:27017'
    )
  );
  
  Configure::write('template_engine', 'dwoo');
