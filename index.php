<?php

  namespace App;
  
  const root_dir = __DIR__;
  
  require 'conf/init.php';
  require 'conf/conf.php';
  require 'conf/routes.php';
  
  $routes->path();
