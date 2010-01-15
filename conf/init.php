<?php

  namespace Locus;

  date_default_timezone_set('Europe/London');
  
  spl_autoload_extensions('.php');
  spl_autoload_register();
  
  const template_engine = 'DwooTemplate';
