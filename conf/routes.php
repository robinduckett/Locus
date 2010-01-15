<?php

  // Routes Config
  //
  // Routes are based on simple regular expressions
  //
  // - Two types, manual routing and auto routing
  //
  // - These are in order of adding so put catch-alls last
  //   and specific routes first.

  namespace lib;
  
  $routes = new Route(isset($_GET['url']) ? $_GET['url'] : 'index');

  $routes->add(array(
    'name' => 'home page',
    'type' => 'manual',
    'route' => '/^index$/',
    'controller' => 'pages',
    'action' => 'index',
    'params' => isset($_GET['url']) ? $_GET['url'] : 'index'
  ));
  
  $routes->add(array(
    'name' => 'controlled pages',
    'type' => 'auto',
    'route' => '/^(?<controller>[0-9A-Za-z-_]+)?\/?(?<action>[0-9A-Za-z-_]+)?\/?(?<params>[0-9A-Za-z-_]+)?\.?(?<ext>.*)?\/?/',
  ));
  
  // add the 404 route last
  $routes->add(array(
    'name' => '404',
    'type' => 'manual',
    'route' => '/.*/', // catch anything
    'controller' => 'error',
    'action' => 'fourohfour'
  ));
