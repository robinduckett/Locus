<?php

  namespace app;

  date_default_timezone_set('Europe/London');
  
  function locus_autoload($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $inc = (include \App\root_dir . DIRECTORY_SEPARATOR . strtolower($class) . '.php');
    //print_r(\App\root_dir . DIRECTORY_SEPARATOR . strtolower($class) . ".php: ($inc)<br />");
  }
  
  //spl_autoload_extensions('.php');
  spl_autoload_register('\App\locus_autoload');
