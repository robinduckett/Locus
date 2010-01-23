<?php

	namespace lib;
	
	class ModelRegistry {
		var $var;
		
		function &getInstance() {			
			static $instance = array();
			
			if (!$instance) {
				$instance[0] = new ModelRegistry();
			}
			return $instance[0];
		}
		
		function getVar() {
			$_this =& ModelRegistry::getInstance();
			return 'getVar: ' . $_this->var;
		}
		
		function &init($model) {
			$_this =& ModelRegistry::getInstance();
			$class = 'models\\' . $model;
			if (!isset($this->{$model})) {
				$this->{$model} = new $class;
			}
			return $_this;
		}
	}