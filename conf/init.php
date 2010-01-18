<?php

  namespace app;

  date_default_timezone_set('Europe/London');
  
  function locus_autoload($class) {
    global $root_dir;
    
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $inc = (include $root_dir . DIRECTORY_SEPARATOR . strtolower($class) . '.php');
  }
  
  //spl_autoload_extensions('.php');
  spl_autoload_register('\App\locus_autoload');
