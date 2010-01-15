<?php

  namespace Locus;
  
  const root_dir = __DIR__;
  
  require 'conf/init.php';  
  require 'conf/routes.php';
  
  $routes->path();
