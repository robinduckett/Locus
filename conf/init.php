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
  
  function rebase($numstring, $frombase, $tobase) {
    $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $tostring = substr($chars, 0, $tobase);

    $length = strlen($numstring);
    $result = '';
    
    for ($i = 0; $i < $length; $i++) {
      $number[$i] = strpos($chars, $numstring{$i});
    }
    
    do {
      $divide = 0;
      $newlen = 0;
      for ($i = 0; $i < $length; $i++) {
        $divide = $divide * $frombase + $number[$i];
        if ($divide >= $tobase) {
          $number[$newlen++] = (int)($divide / $tobase);
          $divide = $divide % $tobase;
        } elseif ($newlen > 0) {
          $number[$newlen++] = 0;
        }
      }
      $length = $newlen;
      $result = $tostring{$divide} . $result;
    } while ($newlen != 0);
    return $result;
  }
  
  spl_autoload_register('\app\locus_autoload');
