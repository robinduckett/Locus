<?php

  namespace App;
  
  use \lib\Configure as Configure;

  chdir('..');
  $root_dir = getcwd();
  
  require 'conf/init.php';
  require 'conf/conf.php';
  require 'conf/routes.php';
  
  Configure::write('root_dir', $root_dir);
  
  $routes->path();
