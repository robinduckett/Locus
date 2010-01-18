<?php

  namespace app;
  use \lib\Configure as Configure;
  
  Configure::getInstance();
  
  Configure::write(
    'database', 
    array(
      'type' => 'mongo',
      'connect' => 'mongodb://localhost:27017'
    )
  );
  
  Configure::write('template_engine', 'dwoo');
