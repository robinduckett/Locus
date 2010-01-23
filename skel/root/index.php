<?php

  namespace app;
  
  use \lib\Configure as Configure;

  chdir('..');
  $root_dir = getcwd();
  $locus_dir = 'C:/var/www/vhosts/locus';
  
  require $locus_dir . '/conf/init.php';
  
  require $root_dir . '/conf/conf.php';
  require $root_dir . '/conf/routes.php';
  
  Configure::write('root_dir', $root_dir);
  Configure::write('locus_dir', $locus_dir);
  
  try {
    $routes->path();
  } catch (Exception $e) {
    include('errors/fatal_error.php');
  }
