<?php

  namespace lib;
  use \app\Controller as AppController;

  class Route {
    private $_url;
    public  $_routes;
    public  $extension;
  
    public function __construct($url) {
      $this->_url = $url;
      $this->_routes = array();
    }
  
    public function add($route) {
      $this->_routes[$route['name']] = $route;
    }
    
    public function path() {
      foreach ($this->_routes as $route => $routable) {
        preg_match($routable['route'], $this->_url, $matches);
        
        switch($routable['type']) {
          case 'auto':
            if (count($matches) > 0) {
              $this->route($routable, $matches);
              exit;
            }
          break;
          
          case 'manual':
          default:
            if (count($matches) > 0) {
              // found a route
              $this->route($routable);
              exit;
            }
          break;
        }
      }
      
      // didn't find a route
      $this->error('0x9 (Couldn\'t load a routable method)');
    }
    
    function route($routable, $data = array()) {
      $data = array_merge($routable, $data);
          
      if (count($data) == 0) {
        $controller = 'controllers\\' . ucfirst($routable['controller']);
        $action = isset($routable['action']) ? strlen($routable['action']) > 0 ? $routable['action'] : 'index' : 'index';
        $params = explode('/', $routable['params']);
      } else {
        $controller = isset($data['controller']) ? 'controllers\\' . ucfirst($data['controller']) : 'lib\\Controller';
        $action = isset($data['action']) ? strlen($data['action']) > 0 ? $data['action'] : 'index' : 'index';
        
        if (!isset($data['retainParams'])) {
          $params = explode('/', $data['params']);
        } else {
          $params = array($data['params']);
        }
          
        $this->extension = isset($data['ext']) ? $data['ext'] : $data['ext'] = '';
      }
      try {
        $test = class_exists($controller);
      } catch (\Exception $e) {
        $this->error("0xA (Can't load controller $controller)");
        exit;
      }
      
      if (!method_exists($controller, $action)) {
        $this->error('0xB (Can\'t load action)');
        exit;
      }
      
      $ctrl = new $controller;
      $appctrl = new AppController;
      $uses = $appctrl->uses;
      unset($appctrl);
      
      if (isset($ctrl->uses)) {      
        $ctrl->uses = array_merge($uses, $ctrl->uses);
      } else {
        $ctrl->uses = $uses;
      }
      
      $ctrl->title = ucfirst($data['controller']) . " - " . ucfirst($action);
              
      $ctrl->before_render();
      
      if (isset($ctrl->uses))
        $uses = $ctrl->uses;
      else
        $uses = array();
             
      foreach ($uses as $model) {
        if (!class_exists('models\\' . $model)) {
          $this->error("0xA (Can't load model $model)");
          exit;
        } else {
          $tmodel = ucfirst($model);
          $model = 'models\\' . ucfirst($model);
          $ctrl->$tmodel = new $model;
        }
      }
     
      try {
        call_user_func_array(array($ctrl, $action), $params);
        
        if ($ctrl->auto_render == true) {
          if (strlen($ctrl->use_layout) > 0) {
            print $ctrl->layout($ctrl->render($action));
          } else {
            print $ctrl->render($action);
          }
        }
      } catch (\Exception $e) {
        $this->error($e->getMessage());
      }
      $ctrl->after_render();
    }
    
    private function error($err_str) {
      if (isset($this->_routes['404'])) {
        $this->route($this->_routes['404'], array('retainParams' => true, 'params' => $err_str));
      } else {
        throw new \Exception('Something bad happened. [Error '.$err_str.']. Failing.');
      }
    }
  }
