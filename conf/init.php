<?php

  namespace app;

  date_default_timezone_set('Europe/London');
  
  function locus_autoload($class) {
    global $locus_dir, $root_dir;
    
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $include_me = $locus_dir . DIRECTORY_SEPARATOR . strtolower($class) . '.php';
    
    try_include:
    if (file_exists($include_me)) {
      $inc = (include $include_me);
    } else {
      $include_me_old = $include_me;
      $include_me = $root_dir . DIRECTORY_SEPARATOR . strtolower($class) . '.php';
      
      if ($include_me_old !== $include_me) {
        goto try_include;
      }
    }
  }
  
  spl_autoload_register('\app\locus_autoload');
